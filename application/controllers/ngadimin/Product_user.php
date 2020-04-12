<?php

class Product_user extends CI_Controller {
    
    public function __construct()
    {
		parent::__construct();
                if($this->session->userdata('logged_in') !== TRUE){
                redirect('ngadimin/login','refresh');
                }
                $this->load->model("Product_model");
                $this->load->model("Master_model");
	}

	public function index()
	{
            $data["productaktif"]=$this->Product_model->getAllProduct_aktif();
            $data["product"]=$this->Product_model->getAllProduct2();
            $data["manufacturer"]=$this->Master_model->getAllManufacturer();
            $data["category"]=$this->Master_model->getAllCategory();
            $data["subcategory"]=$this->Master_model->getAllSubCategory();
            $data["condition"] = $this->Product_model->getProductCondition();
//            $data["grafik"] = $this->Product_model->getGrafikCategory();
            $this->load->view("ngadimin/product_user",$data);
        }
        
//    public function update_status($product_code){
//
//    $status_id = array('product_code' => $product_code);
//    $this->Product_model->update_status_id($status_id,'ac_product');
//    redirect('ngadimin/product_aktif');
//    }
//         
}

