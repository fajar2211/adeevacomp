<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Subcategory extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('ngadimin/login', 'refresh');
        }
        $this->load->model("Master_model");
        $this->load->model("Product_model");
    }

    public function index() {
        $data["subcategory"] = $this->Master_model->getAllSubCategory();
        $data["product"] = $this->Product_model->getAllProduct2();
        $data["productaktif"] = $this->Product_model->getAllProduct_aktif();
        $data["manufacturer"] = $this->Master_model->getAllManufacturer();
        $data["category"] = $this->Master_model->getAllCategory();
        $data["condition"] = $this->Product_model->getProductCondition();
        $this->load->view("ngadimin/master/subcategory", $data);
    }

    public function getSubCategory() {
        $id_category = $this->input->post('id_category');
        $data = $this->Master_model->getAllSubCategoryByID($id_category);
//        $data=$this->Master_model->getAllSubCategory($category_id);
        echo json_encode($data);
    }

    public function simpan_subcategory() {
        $subcategory = $this->Master_model;
        $subcategory->simpan_subcategory1();
        redirect('ngadimin/master/subcategory');
    }
    
    public function edit_subcategory($sub_category_id = null){
            $subcategory = $this->Master_model;
//            $data["category"] = $this->Master_model->getAllCategory();
            $data["subcategory"] = $this->Master_model->getAllSubCategory();
//            $data["subcategory"] = $this->Master_model->getAllCategoryByID($id_subcategory);
            $subcategory->edit_subcategory1($sub_category_id);
            redirect('ngadimin/master/subcategory', $data);
        }

}
