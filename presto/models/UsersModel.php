<?php
class usersModel extends CI_Model
{

   /* function tableHeading($sensetive = '')
    {

        $query = $this->db->list_fields('presto_users');
        if(is_array($sensetive)){
            $query = array_diff($query, $sensetive);
        }
        $query = str_replace('_',' ',$query);
        $return = array_map('ucwords',$query);

        return $return;

    }
*/
    function getUsers($where = null, $request = null, $limit = null, $offset = null)
    {

        $this->db->select('*');
        $this->db->limit($limit, $offset);
        if( $where == null ) {
            $query = $this->db->get('presto_users');
            $count = $this->db->from('presto_users')->count_all_results();
        } else {
            $query = $this->db->get_where('presto_users', $where);
            $count = $this->db->from('presto_users')->where($where)->count_all_results();
        }
        return array('data' => $query->result(), 'count' => $count);

    }

    function getUser($id)
    {

        $query = $this->db->get_where('presto_users', 'id = ' . $id);
        return $query->row();

    }


    function updateUser($data, $id){

        $this->db->trans_start();
        $this->db->where('id', $id);
        $this->db->update('users', $data);
        $this->db->trans_complete();
        return $this->db->trans_status();


    }

    function updatePassword($data, $id){
        $this->db->trans_start();
        $this->db->set('password',$data);
        $this->db->where('id',$id);
        $this->db->update('presto_users' );
        $this->db->trans_complete();
        return $this->db->trans_status();


    }


}