<?php 

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model("Product_model");
        
        if($this->session->userdata('logged_in') !== TRUE){
            redirect('ngadimin/login','refresh');

        }
    }

    public function index() {
        if($this->session->userdata('ngadimin_role_id')==='1'){
            
        
        $this->load->library("User_agent");
        $data["browser"] = $this->agent->browser();
        $data["browser_version"] = $this->agent->version();
        $data["os"] = $this->agent->platform();
        $data["ip_address"] = $this->input->ip_address();
        $data["grafik"] = $this->Product_model->getGrafikCategory();
        $data["grafiksub"] = $this->Product_model->getGrafikSubCategory();
        $this->load->view('ngadimin/dashboard2',$data);
        }else{
          echo "Access Denied";
        }
    }
    
    public function admin(){
    //Allowing akses to staff only
    if($this->session->userdata('ngadimin_role_id')==='2'){
        
        $this->load->library("User_agent");
        $data["browser"] = $this->agent->browser();
        $data["browser_version"] = $this->agent->version();
        $data["os"] = $this->agent->platform();
        $data["ip_address"] = $this->input->ip_address();
//        //tambahan sementara
//        $data["product"]=$this->Product_model->getAllProduct_aktif();
//        //--
//        $this->load->view('ngadimin/product_aktif',$data);
      $this->load->view('ngadimin/dashboard',$data);
    }else{
        echo "Access Denied";
    }
  }
// 
  public function user (){
    //Allowing akses to author only
    if($this->session->userdata('ngadimin_role_id')==='3'){
        
        $this->load->library("User_agent");
        $data["browser"] = $this->agent->browser();
        $data["browser_version"] = $this->agent->version();
        $data["os"] = $this->agent->platform();
        $data["ip_address"] = $this->input->ip_address();
//        //tambahan sementara
//        $data["product"]=$this->Product_model->getAllProduct_aktif();
//        //--
//        $this->load->view('ngadimin/product_aktif',$data);
      $this->load->view('ngadimin/dashboard',$data);
    }else{
        echo "Access Denied";
    }
  }
  
}