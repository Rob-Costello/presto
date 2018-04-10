<?php
class finderModel extends CI_Model{

    function addFinder( $first_name, $last_name, $email, $mobile, $tag ){
        
        $this->db->insert('rt_finders', 
            array( 
                'first_name' => $first_name, 
                'last_name' => $last_name,
                'email' => $email, 
                'mobile' => $mobile,
                'tag' => $tag,
                ) 
            ); 

        return $this->db->insert_id();
    
    }

    function updateFinder( $finderID, $data ){

        $this->db->set($data);
        $this->db->where('id', $finderID);
        $this->db->update('rt_finders');      

    }

    function getFinders( $tag ) {

        $this->db->order_by("datetime", "desc");
        $query = $this->db->get_where( 'rt_finders', 'tag = "' . $tag . '"' );

        return $query->result();

    }

    function getFinder( $id ) {

        $query = $this->db->get_where( 'rt_finders', 'id = "' . $id . '"' );

        return $query->row();

    }

    function getFindersList( $where = null, $request = null,  $limit = null, $offset = null ){

        $this->db->start_cache();

        if( $request['Tag'] != null ){
            $this->db->like('code', $request['Tag']);
        }

        $this->db->stop_cache();
        
        $this->db->limit($limit, $offset);
        

        if( $where != null ){
            $query = $this->db->get_where('rt_finders', $where);
            //echo $this->db->last_query();
            $count = $this->db->from('rt_finders')->where($where)->count_all_results();
        } else {
            $query = $this->db->get('rt_finders');
            //echo $this->db->last_query();
            $count = $this->db->from('rt_finders')->count_all_results();
        }

        $this->db->flush_cache();

        return array('data' => $query, 'count' => $count);

    }


    function getFinderChoice( $id ){
        
        $this->db->select('value');
        $this->db->order_by('rt_tagz_events_log.datetime', 'DESC');
        $this->db->limit( 1 );
        $this->db->join('rt_finders', 'rt_finders.tag = rt_tagz_events_log.tag', 'LEFT');
        $query = $this->db->get_where( 'rt_tagz_events_log', 'rt_finders.id = "' . $id . '" AND event_id = 5' );

        return $query->row();

    }

    function setCollection( $id ){

        $this->db->set('collection', 1);
        $this->db->set('collection_request', date("Y-m-d h:i:sa"));
        $this->db->where('id', $id);
        $this->db->update('rt_finders');

    }

    function unsetCollection( $id, $tracking_code = null ){

        $this->db->set('collection', 0);
        $this->db->set('collection_date', date("Y-m-d h:i:sa"));
        $this->db->set('tracking_code', $tracking_code); 
        $this->db->where('id', $id);
        $this->db->update('rt_finders');

    }

    function setPayment( $id ){

        $this->db->set('payment', 1);
        $this->db->set('payment_request', date("Y-m-d h:i:sa"));
        $this->db->where('id', $id);
        $this->db->update('rt_finders');

    }

    function unsetPayment( $id ){

        $this->db->set('payment', 0);
        $this->db->set('payment_made', date("Y-m-d h:i:sa")); 
        $this->db->where('id', $id);
        $this->db->update('rt_finders');

    }

    function setItemNotRecieved( $id ){

        $this->db->set('not_received', 1);
        $this->db->where('id', $id);
        $this->db->update('rt_finders');

    }

    function setItemRecieved( $id ){

        if( $this->getFinderChoice( $id )->value != 'Good Karma'  ){
            $this->db->set('payment', 1);
        }

        $this->db->set('not_received', 0);
        $this->db->set('received_date', date("Y-m-d h:i:sa")); 
        $this->db->where('id', $id);
        $this->db->update('rt_finders');

    }


    function getCollectionOverDays( $days ){

        $query = $this->db->get_where( 'rt_finders', 'not_received = 0 AND received_date IS NULL AND (collection_date > DATE_SUB(now(), INTERVAL ' . $days . ' DAY))' );

        return $query->result();

    }

}