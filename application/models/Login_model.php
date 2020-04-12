<?php

class Login_model extends CI_Model{
 
    public function __construct() {
        parent::__construct();
        $this->db = $this->load->database('default', true);
    }
    
//    public function validate1($username,$password){
//     $sql_query=$this->db->query('call userLogin (".$username.",".$password.")');
////     $data=array('username'=>$username,'password'=>$password);
////        mysqli_next_result( $this->db->conn_id);
////            if($sql_query->num_rows()>0){
//                $result=$this->db->query($sql_query);
//                return $result;
////     return $sql_query->result_array();
//            }
    
    function validate1($username,$password){
    $this->db->where('username',$username);
    $this->db->where('password',$password);
    $result = $this->db->get('ac_ngadimin',1);
    return $result;
  }
  
  
}
