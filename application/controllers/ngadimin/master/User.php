<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User extends CI_Controller {
    
    public function __construct()
    {
		parent::__construct();
                if($this->session->userdata('logged_in') !== TRUE){
                redirect('ngadimin/login','refresh');
                }
                $this->load->model("Master_model");
                $this->load->model("Product_model");
                $this->load->model("User_model");
                
	}

	public function index()
	{
            $data["user"]=$this->User_model->getAllUser();
            $data["category"]=$this->Master_model->getAllCategory();
            $data["product"]=$this->Product_model->getAllProduct2();
            $data["productaktif"]=$this->Product_model->getAllProduct_aktif();
            $data["subcategory"]=$this->Master_model->getAllSubCategory();
            $data["manufacturer"]=$this->Master_model->getAllManufacturer();
            $data["condition"] = $this->Product_model->getProductCondition();
            $data['role'] = $this->User_model->getRoleUser();
            $this->load->view("ngadimin/master/user",$data);
           
        }
        
        public function simpan_user(){
            $user = $this->User_model;
//            $data['role'] = $this->User_model->getRoleUser();
            $user->simpan_user1();
            redirect('ngadimin/master/user');
        }
        
        public function edit_user($ngadimin_id = null){
            $user = $this->User_model;
            $data['user']=$this->User_model->getAllUser();
            $user->edit_user1($ngadimin_id);
            redirect('ngadimin/master/user',$data);
        }
}
