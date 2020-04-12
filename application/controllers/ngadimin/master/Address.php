<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Address extends CI_Controller {
    
    public function __construct()
    {
		parent::__construct();
                if($this->session->userdata('logged_in') !== TRUE){
                redirect('ngadimin/login','refresh');
                }
                $this->load->model("Master_model");
                $this->load->model("Product_model");
                
	}

	public function index()
	{
            $data["address"]=$this->Master_model->getAddress();
//            $data["product"]=$this->Product_model->getAllProduct2();
//            $data["productaktif"]=$this->Product_model->getAllProduct_aktif();
//            $data["subcategory"]=$this->Master_model->getAllSubCategory();
//            $data["manufacturer"]=$this->Master_model->getAllManufacturer();
//            $data["condition"] = $this->Product_model->getProductCondition();
            $this->load->view("ngadimin/master/address",$data);
           
        }
        
        public function simpan_address(){
            $address = $this->Master_model;
//            $data['role'] = $this->User_model->getRoleUser();
            $address->simpan_address1();
            redirect('ngadimin/master/address');
        }
        
        public function edit_address($address_id = null){
            $address = $this->Master_model;
            $data["address"]=$this->Master_model->getAddress();
            $address->edit_address1($address_id);
            redirect('ngadimin/master/address', $data);
        }
}
