<?php

class User_model extends CI_Model{
 
    public function __construct() {
        parent::__construct();
        $this->db = $this->load->database('default', true);
    }
    
    //backend
    public function getAllUser() {
//        return $this->db->get('ac_manufacturer')->result_array();
        $sql_query=$this->db->query('call getAllUser ()');
//        mysqli_next_result( $this->db->conn_id);
//            if($sql_query->num_rows()>0){
                return $sql_query->result_array();
    }
    
    //backend
    public function getRoleUser(){
//        return $this->db->get('ac_ngadimin_role')->result_array();
        $sql_query=$this->db->query('call getRoleUser ()');
        return $sql_query->result_array();
    }
    
    public function simpan_user1(){
        $post = $this->input->post();
        $data = new stdClass();
        $data->ngadimin_role_id = $post['ngadimin_role_id'];
        $data->username = $post['username'];
        $data->password = md5($post['password']);
        $data->name = $post['name'];
        $data->email = $post['email'];
        $this->db->insert('ac_ngadimin', $data);
    }
    
    public function edit_user1($ngadimin_id){
        $post = $this->input->post();
        $data = new stdClass();
        $data->ngadimin_role_id = $post['ngadimin_role_id'];
        $data->username = $post['username'];
//        $data->password = md5($post['password']);
        $data->name = $post['name'];
        $data->email = $post['email'];
//        var_dump($data);exit;
        $this->db->update('ac_ngadimin', $data, array('ngadimin_id' => $post['ngadimin_id']));
//        var_dump($data);exit;
    }

}
