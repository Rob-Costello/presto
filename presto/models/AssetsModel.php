<?php
class assetsModel extends CI_Model{

    function getAssets( $where = null, $request = null,  $limit = null, $offset = null ){

        $this->db->start_cache();

        if( $request['Tag'] != null ){
            $this->db->like('code', $request['Tag']);
        }

        $this->db->stop_cache();
        $this->db->select( 'code, id, description, reward' );
        $this->db->limit($limit, $offset);
        $this->db->order_by("created", "desc");

        if( $where != null ){
            $query = $this->db->get_where('rt_assets', $where);
            $count = $this->db->from('rt_assets')->where($where)->count_all_results();
        } else {
            $query = $this->db->get('rt_assets');
            $count = $this->db->from('rt_assets')->count_all_results();
        }

        $this->db->flush_cache();

        return array('data' => $query, 'count' => $count);

    }

}