<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Master_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->db = $this->load->database('default', true);
    }
    
    //backend
    public function getAllManufacturer() {
//        return $this->db->get('ac_manufacturer')->result_array();
        $sql_query = $this->db->query('call getAllManufacturer ()');
//        mysqli_next_result( $this->db->conn_id);
//            if($sql_query->num_rows()>0){
        return $sql_query->result_array();
    }
    
    public function simpan_manufacturer1(){
        $post = $this->input->post();
        $data = new stdClass();
        $data->manufacturer_name = $post['manufacturer_name'];
        $this->db->insert('ac_manufacturer', $data);
    }
    
    public function edit_manufacturer1($manufacturer_id){
        $post = $this->input->post();
        $data = new stdClass();
        $data->manufacturer_name = $post['manufacturer_name'];
        $this->db->update('ac_manufacturer', $data, array('manufacturer_id' => $post['manufacturer_id']));
    }
    
    //backend and frontend
    public function getAllCategory() {
//        return $this->db->get('ac_manufacturer')->result_array();
        $query = $this->db->query('call getAllCategory ()');
        $query1 = $query->result_array();
//        mysqli_next_result( $this->db->conn_id);
//            if($sql_query->num_rows()>0){
//        $query->next_result();
//        $query->free_result();
        return $query1;
    }
    
    public function simpan_category1(){
        $post = $this->input->post();
        $data = new stdClass();
        $data->category_name = $post['category_name'];
        $this->db->insert('ac_category', $data);
    }
    
    public function edit_category1($category_id){
        $post = $this->input->post();
        $data = new stdClass();
        $data->category_name = $post['category_name'];
        $this->db->update('ac_category', $data, array('category_id' => $post['category_id']));
    }
    
    //backend
    public function getAllSubCategory() {
//        return $this->db->get('ac_manufacturer')->result_array();
        $sql_query = $this->db->query('call getAllSubCategory ()');
//        mysqli_next_result( $this->db->conn_id);
//            if($sql_query->num_rows()>0){
        return $sql_query->result_array();
//        $hasil=$this->db->query("SELECT * FROM ac_sub_category WHERE category_id='$category_id'");
//        return $hasil->result();
    }
    
    public function simpan_subcategory1(){
        $post = $this->input->post();
        $data = new stdClass();
        $data->category_id = $post['category_id'];
        $data->sub_category_name = $post['sub_category_name'];
        $this->db->insert('ac_sub_category', $data);
    }
    
    public function edit_subcategory1($sub_category_id){
        $post = $this->input->post();
        $data = new stdClass();
        $data->category_id = $post['category_id'];
        $data->sub_category_name = $post['sub_category_name'];
        $this->db->update('ac_sub_category', $data, array('sub_category_id' => $post['sub_category_id']));
    }
    
    //backend
    public function getAllSubCategoryByID($id_category) {
//        return $this->db->get('ac_manufacturer')->result_array();
//        $sql_query=$this->db->query('call getAllSubCategory ()');
//        mysqli_next_result( $this->db->conn_id);
//            if($sql_query->num_rows()>0){
//                return $sql_query->result_array();
        $hasil = $this->db->query("SELECT * FROM ac_sub_category WHERE category_id='$id_category'");
        return $hasil->result();
    }
    
//    public function getAllCategoryByID($id_subcategory) {
//        $hasil = $this->db->query("SELECT * FROM ac_sub_category WHERE sub_category_id='$id_subcategory'");
//        return $hasil->result();
//    }
    
    //backend
    public function getAllCarousel() {
        $sql_query = $this->db->query('call getAllCarousel ()');
        return $sql_query->result_array();
    }
    
    public function simpan_carousel1(){
        $post = $this->input->post();
        $data = new stdClass();
//        $data->carousel_id = $post['carousel_id'];
        $data->carousel_name = $this->_uploadCarousel();
        $data->aktif = $post['aktif'];
        $this->db->insert('ac_carousel', $data);
    }
    
    public function edit_carousel1($carousel_id){
        $post = $this->input->post();
        $data = new stdClass();
//        $data->carousel_id = $post['carousel_id'];
        
        if (!empty($_FILES["carousel_name"]["name"])) {
            $data->carousel_name = $this->_uploadCarousel();
        } else {
            $data->carousel_name = $post["old_carousel"];
        }
        
        $data->aktif = $post['aktif'];
        $this->db->update('ac_carousel', $data, array('carousel_id' => $post['carousel_id']));
    }
    
    private function _uploadCarousel() {
//        $data_product = new stdClass();
        $config['upload_path'] = './upload/carousel/';
        $config['allowed_types'] = 'gif|jpg|png';
//        $config['file_name']            = $data_product->product_code;
        $config['overwrite'] = true;
        $config['max_size'] = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('carousel_name')) {
            return $this->upload->data("file_name");
        }
        print_r($this->upload->display_errors());
//        return "default.jpg";
    }
    
    //frontend
    public function getCarouselSliders_active(){
//        $data = new stdClass();
//        $hasil = $this->db->get('ac_carousel');
        $hasil=$this->db->query("SELECT * FROM ac_carousel WHERE carousel_id=1 and aktif=1 order by carousel_id ASC");
        if($hasil->num_rows() > 0){
            return $hasil->result();
        } else {
            return array();
        }
    }
    
    //frontend
    public function getCarouselSliders_item(){
//        $data = new stdClass();
//        $hasil = $this->db->get('ac_carousel');
        $hasil=$this->db->query("SELECT * FROM ac_carousel WHERE carousel_id not in ('1') and aktif=1 order by carousel_id ASC");
        if($hasil->num_rows() > 0){
            return $hasil->result();
        } else {
            return array();
        }
    }
    
    public function getAddress() {
        $sql_query = $this->db->query('call getAddress ()');
        return $sql_query->result_array();
    }
    
    public function simpan_address1(){
        $post = $this->input->post();
        $data = new stdClass();
        $data->shopname = $post['shopname'];
        $data->address = $post['address'];
        $data->contact = $post['contact'];
        $data->url_tokopedia = $post['url_tokopedia'];
        $data->url_bukalapak = $post['url_bukalapak'];
        $data->url_shopee = $post['url_shopee'];
        $data->koordinat_x = $post['koordinat_x'];
        $data->koordinat_y = $post['koordinat_y'];
        $this->db->insert('ac_address', $data);
    }
    
    public function edit_address1($address_id){
        $post = $this->input->post();
        $data = new stdClass();
        $data->shopname = $post['shopname'];
        $data->address = $post['address'];
        $data->contact = $post['contact'];
        $data->url_tokopedia = $post['url_tokopedia'];
        $data->url_bukalapak = $post['url_bukalapak'];
        $data->url_shopee = $post['url_shopee'];
        $data->koordinat_x = $post['koordinat_x'];
        $data->koordinat_y = $post['koordinat_y'];
        $this->db->update('ac_address', $data, array('address_id' => $post['address_id']));
    }

}
