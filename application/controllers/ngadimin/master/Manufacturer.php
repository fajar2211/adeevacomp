<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Manufacturer extends CI_Controller {
    
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
            $data["manufacturer"]=$this->Master_model->getAllManufacturer();
            $data["product"]=$this->Product_model->getAllProduct2();
            $data["productaktif"]=$this->Product_model->getAllProduct_aktif();
            $data["category"]=$this->Master_model->getAllCategory();
            $data["subcategory"]=$this->Master_model->getAllSubCategory();
            $data["condition"] = $this->Product_model->getProductCondition();
            $this->load->view("ngadimin/master/manufacturer",$data);
           
        }
        
        public function simpan_manufacturer(){
            $manufacturer = $this->Master_model;
//            $data['role'] = $this->User_model->getRoleUser();
            $manufacturer->simpan_manufacturer1();
            redirect('ngadimin/master/manufacturer');
        }
        
        public function edit_manufacturer($manufacturer_id = null){
            $manufacturer = $this->Master_model;
            $data["manufacturer"]=$this->Master_model->getAllManufacturer();
            $manufacturer->edit_manufacturer1($manufacturer_id);
            redirect('ngadimin/master/manufacturer', $data);
        }
}