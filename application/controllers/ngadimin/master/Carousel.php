<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Carousel extends CI_Controller {
    
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
            $data["carousel"]=$this->Master_model->getAllCarousel();
            $data["condition"] = $this->Product_model->getProductCondition();
            $this->load->view("ngadimin/master/carousel",$data);
           
        }
        
        public function simpan_carousel(){
            $carousel = $this->Master_model;
//            $data['role'] = $this->User_model->getRoleUser();
            $carousel->simpan_carousel1();
            redirect('ngadimin/master/carousel');
        }
        
        public function edit_carousel($carousel_id = null){
            $carousel = $this->Master_model;
            $data["carousel"]=$this->Master_model->getAllCarousel();
            $carousel->edit_carousel1($carousel_id);
            redirect('ngadimin/master/carousel', $data);
        }
       
}