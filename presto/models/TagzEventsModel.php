<?php
class tagzEventsModel extends CI_Model{

    function getEvents( $where = null, $request = null,  $limit = null, $offset = null ){

        $this->db->start_cache();

        if( $request['Tag'] != null ){
            $this->db->like('tag', $request['Tag']);
        }

        $this->db->stop_cache();
        $this->db->limit($limit, $offset);
        $this->db->order_by("datetime", "desc");
        $this->db->join( 'rt_tagz_events', 'rt_tagz_events.id = rt_tagz_events_log.event_id' );

        if( $where != null ){
            $query = $this->db->get_where('rt_tagz_events_log', $where);
            $count = $this->db->from('rt_tagz_events_log')->where($where)->count_all_results();
        } else {
            $query = $this->db->get('rt_tagz_events_log');
            $count = $this->db->from('rt_tagz_events_log')->count_all_results();
        }

        $this->db->flush_cache();

        return array('data' => $query, 'count' => $count);

    }

    function getEventByEventID( $tag, $id ){

        $query = $this->db->order_by('datetime', 'DESC')
            ->limit( 1 )
            ->get_where( 'rt_tagz_events_log', 'tag = "'. $tag . '" AND event_id = ' . $id );
        
        return $query->row();

    }

    function addEvent( $eventID, $tag, $value, $notes = null ) {

        $this->load->library('user_agent');

        $this->db->insert('rt_tagz_events_log', 
            array( 
                'event_id' => $eventID, 
                'tag' => $tag,
                'value' => $value, 
                'notes' => $notes,
                'ip_address' => $this->input->ip_address(), 
                'info' => $this->agent->agent_string(),
                ) 
            );

    }

    function checkRewardAvailable( $tag ) {

        $query = $this->db->select('event_id')
            ->order_by('datetime', 'ASC')
            ->get_where( 'rt_tagz_events_log', 'tag = "'. $tag . '" AND (event_id = 12 OR event_id = 13)' );
        
        if( $query->row() !== null && $query->row()->event_id == 12 ){

            return true;

        } else {

            return false;

        }

    }

    function getTagCurrentStatusID( $tag ){ 

        $query = $this->db->select('event_id')
            ->join( 'rt_tagz_events', 'rt_tagz_events.id = rt_tagz_events_log.event_id', 'LEFT' )
            ->order_by('datetime', 'DESC')
            ->limit( 1 )
            ->get_where( 'rt_tagz_events_log', 'tag = "' . $tag . '" AND main = 1' );

        if( isset($query->row()->event_id) )
            return $query->row()->event_id;
        else
            return '0';

    }

    function getTagCurrentStatusName( $tag ){ 

        $query = $this->db->select('name')
            ->join( 'rt_tagz_events', 'rt_tagz_events.id = rt_tagz_events_log.event_id', 'LEFT' )
            ->order_by('datetime', 'DESC')
            ->limit( 1 )
            ->get_where( 'rt_tagz_events_log', 'tag = "' . $tag . '" AND main = 1' );

        if( isset($query->row()->name) )
            return $query->row()->name;
        else
            return 'Inactive';

    }


}