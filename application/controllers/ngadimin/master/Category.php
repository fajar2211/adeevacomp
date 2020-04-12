<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Category extends CI_Controller {
    
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
            $data["category"]=$this->Master_model->getAllCategory();
            $data["product"]=$this->Product_model->getAllProduct2();
            $data["productaktif"]=$this->Product_model->getAllProduct_aktif();
            $data["subcategory"]=$this->Master_model->getAllSubCategory();
            $data["manufacturer"]=$this->Master_model->getAllManufacturer();
            $data["condition"] = $this->Product_model->getProductCondition();
            $this->load->view("ngadimin/master/category",$data);
           
        }
        
        public function simpan_category(){
            $category = $this->Master_model;
//            $data['role'] = $this->User_model->getRoleUser();
            $category->simpan_category1();
            redirect('ngadimin/master/category');
        }
        
        public function edit_category($category_id = null){
            $category = $this->Master_model;
            $data["category"]=$this->Master_model->getAllCategory();
            $category->edit_category1($category_id);
            redirect('ngadimin/master/category', $data);
        }
}
