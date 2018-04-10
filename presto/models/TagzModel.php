<?php
class tagzModel extends CI_Model{

    function generateTag(){

        $micro_date = microtime();
        $date_array = explode(" ",$micro_date);
        $date = date("Y-m-d H:i:s",$date_array[1]);
        return str_replace('O', '0',str_replace('I', '1',strtoupper(dechex(str_replace('.', '', $date_array[0])))));

    }

    function batchInsertTagz( $tagz ){
        
        $this->db->insert_batch('rt_tagz', $tagz); 
    
    }

    function batchExportTagz( $tagz, $keyring ){

        require_once dirname(dirname(dirname(__FILE__))) . '/vendor/phpoffice/phpexcel/Classes/PHPExcel/IOFactory.php';
        $excel = new PHPExcel();

        if( $keyring ){
            $filename = 'tagz_' . date('Y-m-d_H:i:s') . '_keyring.xls';
        } else {
            $filename = 'tagz_' . date('Y-m-d_H:i:s') . '_stickers.xls';
        }

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename .'"');
        header('Cache-Control: max-age=0');

        // Do your stuff here
        $stripped = array();
        foreach( $tagz as $t ){
            $stripped[] = array($t['code']);
            $urls[] = array( WP_HOME . '/rt/'. $t['code'] . '/');
        }
        $excel->getActiveSheet()->fromArray($stripped, NULL, 'A1');
        $excel->getActiveSheet()->fromArray($urls, NULL, 'B1');
        $writer = PHPExcel_IOFactory::createWriter($excel, 'Excel5');

        // This line will force the file to download
        $writer->save('php://output');
    
    }

    function getTagz( $where = null, $request = null,  $limit = null, $offset = null ){

        $this->db->start_cache();

        $this->db->select('t.*, log.*');

        if( isset($request['Tag']) && $request['Tag'] != null ){
            $this->db->like('code', $request['Tag']);
        }

        if( $request['Status'] != null ){
            if( $request['Status'] == 0 ){
                $this->db->where('log.event_id IS NULL');
            } else {
                $this->db->where('log.event_id', $request['Status']);
            }
        }

        // $this->db->join( 'rt_tagz_events_log' , 'code = (SELECT tag FROM rt_tagz_events_log WHERE tag = rt_tagz.code AND (event_id = 1 OR event_id = 9) ORDER BY datetime DESC LIMIT 1)', 'LEFT' );
        //$this->db->join( 'rt_tagz_events_log' , ' code = tag', 'LEFT' );
        $this->db->join( '(SELECT max(id) AS max_id, tag FROM rt_tagz_events_log WHERE event_id=1 OR event_id=9 GROUP BY tag) AS log2', 't.code = log2.tag', 'left' );
        $this->db->join( 'rt_tagz_events_log AS log', 'log.id = log2.max_id', 'left' );

        // $this->db->join( 'rt_tagz_events_log l2' , '(code = l2.tag AND l2.tag = rt_tagz.code AND (l2.event_id = 1 OR l2.event_id = 9) ORDER BY datetime DESC LIMIT 1)', 'LEFT OUTER' );

        $this->db->order_by("created", "desc");
        $this->db->group_by("code");

        $this->db->stop_cache();

        $this->db->limit($limit, $offset);
        

        if( $where != null ){
            $query = $this->db->get_where('rt_tagz as t', $where);
            //echo $this->db->last_query();
            $count = $this->db->from('rt_tagz as t')->where($where)->count_all_results();
        } else {
            $query = $this->db->get('rt_tagz as t');
            //echo $this->db->last_query();
            $count = $this->db->from('rt_tagz as t')->count_all_results();
        }

        $this->db->flush_cache();

        foreach( $query->result() as &$q ) {

            $q->status = $this->getTagCurrentStatusID( $q->code );

        }

        return array('data' => $query, 'count' => $count);

    }

    function getTagCurrentStatusID( $tag ){

        $CI =& get_instance();
        $CI->load->model('TagzEventsModel');
        return $CI->TagzEventsModel->getTagCurrentStatusID( $tag );

    }

    function validateTag( $tag ){

        $this->db->where('code', $tag);
        $query = $this->db->get('rt_tagz');
        if ($query->num_rows() > 0){
            return true;
        } else{
            return false;
        }

    }

    function assignedTag( $tag ){

        $this->db->where('code', $tag);
        $this->db->where('user_id IS NOT NULL');
        $query = $this->db->get('rt_tagz');
        if ($query->num_rows() > 0){
            return true;
        } else{
            return false;
        }

    }

    function activateTag( $tag, $userid, $description, $reward ){

        $this->db->set('user_id', $userid);
        $this->db->set('description', $description);
        $this->db->set('reward', $reward);
        $this->db->where('code', $tag);
        $this->db->update('rt_tagz');

    }

    function updateDescription( $tag, $description ){

        $this->db->set('description', $description);
        $this->db->where('code', $tag);
        $this->db->update('rt_tagz');

    }

    function getReward( $tag ){

        $this->db->select( 'reward' )
            ->where('code', $tag);
        $query = $this->db->get('rt_tagz');

        return $query->row()->reward;

    }

    function getTagUserID( $tag ){

        $this->db->select( 'user_id' )
            ->where('code', $tag);
        $query = $this->db->get('rt_tagz');

        return $query->row()->user_id;

    }

    function getTagzByUserID( $id ){

        $this->db->where('user_id', $id)
            ->order_by("created", "desc");

        $query = $this->db->get('rt_tagz');
        
        return $query;

    }

    function getTagInfo( $id ){

        $this->db->where('code', $id);

        $query = $this->db->get('rt_tagz');
        
        return $query->row();

    }

    function getTagStatus( $id ){

        $this->db->select('name')
            ->join( 'rt_tagz_events' , 'rt_tagz_events.id = event_id' )
            ->where('tag', $id)
            ->where('main', '1')
            ->order_by("datetime", "desc")
            ->limit(1);

        $query = $this->db->get('rt_tagz_events_log');
        
        return $query->row()->name;

    }

    function getTagUserInfo( $user_id ) {

        $user = get_userdata( $user_id );
        $user->billing_address = null;
        $user->shipping_address = null;

        if(get_user_meta( $user_id, 'billing_address_1' )){
            $user->billing_address = 
            get_user_meta( $user_id, 'billing_address_1' )[0] . ', ' . 
            get_user_meta( $user_id, 'billing_address_2' )[0] . ' ' .
            get_user_meta( $user_id, 'billing_city' )[0]      . ', ' .
            get_user_meta( $user_id, 'billing_state' )[0]     . ' ' .
            get_user_meta( $user_id, 'billing_postcode' )[0];
        }

        if(get_user_meta( $user_id, 'shipping_address_1' )){
            $user->shipping_address = 
                get_user_meta( $user_id, 'shipping_address_1' )[0] . ', ' . 
                get_user_meta( $user_id, 'shipping_address_2' )[0] . ' ' .
                get_user_meta( $user_id, 'shipping_city' )[0]      . ', ' .
                get_user_meta( $user_id, 'shipping_state' )[0]     . ' ' .
                get_user_meta( $user_id, 'shipping_postcode' )[0];
        } else {

            $user->shipping_address = $user->billing_address;

        }

        return $user;

    }

}