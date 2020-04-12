<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Product_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->db = $this->load->database('default', true);
    }

//    public function getAllProduct() {
//        $sql_query=$this->db->query('call getAllProduct ()');
////        mysqli_next_result( $this->db->conn_id);
////            if($sql_query->num_rows()>0){
//                return $sql_query->result_array();
//            }
           
    //backend
    public function getAllProduct2() {
        $sql_query = $this->db->query('call getAllProduct2 ()');
//        mysqli_next_result( $this->db->conn_id);
//            if($sql_query->num_rows()>0){
        return $sql_query->result_array();
    }
    
    //frontend
    public function getAllProduct3($limit, $start) {
//        $sql_query=$this->db->query('call getAllProduct3 ()');
//        mysqli_next_result( $this->db->conn_id);
//            if($sql_query->num_rows()>0){
//                return $sql_query->result();
        return $query = $this->db->order_by('product_code', 'ASC')->get_where('ac_product', array('aktif' => '1'), $limit, $start)->result();
    }
    
    //backend
    public function getAllProduct_aktif() {
        $sql_query = $this->db->query('call getAllProduct_aktif ()');
//        mysqli_next_result( $this->db->conn_id);
//            if($sql_query->num_rows()>0){
        return $sql_query->result_array();
    }

    //frontend
    public function getJmlProduct() {
        return $this->db->get('ac_product')->num_rows();
    }
    
    public function getJmlProductByCategory($category_id = null) {
        return $this->db->get_where('ac_product', array('category_id' => $category_id))->num_rows();
//        $query = $this->db->query("select count(*) from ac_product where category_id='$category_id'");
//        return $query->row();
    }

    public function getById_productall($product_code) {
        return $this->db->get_where('ac_product', ["product_code" => $product_code])->row();
    }

//    public function update_status_id($status_id,$ac_product){
//        $this->db->select('status_id');
//     $this->db->from($ac_product);
//     $this->db->where($status_id);
//     $result = $this->db->get()->result();
//
//    if($result && $result[0]->status_id =='0')
//    {
//       $this->db->set('status_id','Out of Stock');
//    } else{
//       $this->db->set('status_id','Ready');
//    }
//
//    $this->db->where($status_id);
//    $this->db->update($ac_product);
//            
//    }
//}
    
    //frontend
    public function getDetailProduct($product_id = NULL) {
//        $query = $this->db->get_where('ac_product', array('product_id' => $product_id));
//        return $query->result();
        
        $this->db->select('*');
        $this->db->from('ac_product');
        $this->db->join('ac_product_condition', 'ac_product.condition_id = ac_product_condition.condition_id');
        $this->db->join('ac_stock_status', 'ac_product.status_id = ac_stock_status.status_id');
        $this->db->where('product_id',$product_id);
        $query = $this->db->get();
        return $query->result();
    }
    
    //frontend
    public function getProductByCategory($category_id = NULL){
        $query = $this->db->get_where('ac_product', array('category_id' => $category_id, 'aktif'=>'1'));
        return $query->result();
    }

    public function edit_product_aktif1($product_code, $status_id, $quantity, $price) {
        $hasil = $this->db->query("UPDATE ac_product SET status_id='$status_id',quantity='$quantity',price='$price' WHERE product_code='$product_code'");
        return $hasil;
    }
    
    //backend
    public function simpan_product_all1() {
//         $hasil=$this->db->query("INSERT INTO ac_product (  product_code,status_id,quantity,price) VALUES ($product_code,$manufacturer_id,$category_id,$sub_category_id,$name,$weight,$description,$link_tokopedia,$link_bukalapak,$link_shopee,$status_id,$quantity,$price,$aktif)");
//        return $hasil;

        $post = $this->input->post();
        $data = new stdClass();
        $data->product_code = $post['product_code'];
        $data->manufacturer_id = $post['manufacturer_id'];
        $data->category_id = $post['category_id'];
        $data->sub_category_id = $post['sub_category_id'];
        $data->name = $post['name'];
        $data->weight = $post['weight'];
        $data->status_id = $post['status_id'];
        $data->condition_id = $post['condition_id'];
        $data->quantity = $post['quantity'];
        $data->price = $post['price'];
        $data->aktif = $post['aktif'];
        $data->description = $post['description'];
        $data->image1 = $this->_uploadImage1();
        $data->image2 = $this->_uploadImage2();
        $data->image3 = $this->_uploadImage3();
        $data->image4 = $this->_uploadImage4();
        $data->image5 = $this->_uploadImage5();
        $data->link_tokopedia = $post['link_tokopedia'];
        $data->link_bukalapak = $post['link_bukalapak'];
        $data->link_shopee = $post['link_shopee'];

        $this->db->insert('ac_product', $data);

//     lama banyak tabel
//        $data_product = new stdClass();    
//        $data_product->product_code=$this->input->post('product_code');
//        $data_product->manufacturer_id=$this->input->post('manufacturer_id');
//        $data_product->category_id=$this->input->post('category_id');
//        $data_product->sub_category_id=$this->input->post('sub_category_id');
//        $data_product->name=$this->input->post('name');
//        $data_product->weight=$this->input->post('weight');
//        $data_product->status_id=$this->input->post('status_id');
//        $data_product->quantity=$this->input->post('quantity');
//        $data_product->price=$this->input->post('price');
//        $data_product->aktif=$this->input->post('aktif');
//        
//        $data_desc = new stdClass();
//        $data_desc->product_desc_code=$this->input->post('product_code');
//        $data_desc->description=$this->input->post('description');
//        
//        $data_image = new stdClass();
//        $data_image->product_image_code=$this->input->post('product_code');
//        $data_image->image1=$this->_uploadImage1();
//        $data_image->image2=$this->_uploadImage2();
//        $data_image->image3=$this->_uploadImage3();
//        $data_image->image4=$this->_uploadImage4();
//        $data_image->image5=$this->_uploadImage5();
//        
//        $data_link = new stdClass();
//        $data_link->product_link_code=$this->input->post('product_code');
//        $data_link->link_tokopedia=$this->input->post('link_tokopedia');
//        $data_link->link_bukalapak=$this->input->post('link_bukalapak');
//        $data_link->link_shopee=$this->input->post('link_shopee');
//        
//        $this->db->trans_begin();
//       
//        $this->db->insert('ac_product', $data_product); 
//        $data_desc->product_desc_id = $this->db->insert_id();
//        
//        $this->db->insert('ac_product_desc', $data_desc);
//        $data_image->product_image_id = $this->db->insert_id();
//        
//        $this->db->insert('ac_product_image', $data_image);
//        $data_link->product_link_id = $this->db->insert_id();
//        
//        $this->db->insert('ac_product_link', $data_link);
//        
//        $this->db->trans_complete();
//        return $this->db->trans_status() ? true : false;    
    }
    
    //backend
    public function edit_product_all1($product_code) {
//         $hasil=$this->db->query("UPDATE ac_product SET status_id='$status_id',quantity='$quantity',price='$price' WHERE product_code='$product_code'");
//        return $hasil;
        $post = $this->input->post();
        $data = new stdClass();
//        $data->product_code=$post['product_code'];
        $data->manufacturer_id = $post['manufacturer_id'];
        $data->category_id = $post['category_id'];
        $data->sub_category_id = $post['sub_category_id'];
        $data->name = $post['name'];
        $data->weight = $post['weight'];
        $data->status_id = $post['status_id'];
        $data->condition_id = $post['condition_id'];
        $data->quantity = $post['quantity'];
        $data->price = $post['price'];
        $data->aktif = $post['aktif'];
        $data->description = $post['description'];

        if (!empty($_FILES["image1"]["name"])) {
            $data->image1 = $this->_uploadImage1();
        } else {
            $data->image1 = $post["old_image1"];
        }

        if (!empty($_FILES["image2"]["name"])) {
            $data->image2 = $this->_uploadImage2();
        } else {
            $data->image2 = $post["old_image2"];
        }

        if (!empty($_FILES["image3"]["name"])) {
            $data->image3 = $this->_uploadImage3();
        } else {
            $data->image3 = $post["old_image3"];
        }

        if (!empty($_FILES["image4"]["name"])) {
            $data->image4 = $this->_uploadImage4();
        } else {
            $data->image4 = $post["old_image4"];
        }

        if (!empty($_FILES["image5"]["name"])) {
            $data->image5 = $this->_uploadImage5();
        } else {
            $data->image5 = $post["old_image5"];
        }

        $data->link_tokopedia = $post['link_tokopedia'];
        $data->link_bukalapak = $post['link_bukalapak'];
        $data->link_shopee = $post['link_shopee'];

        $this->db->update('ac_product', $data, array('product_code' => $post['product_code']));

//        $this->db->set('a.product_code',$product_code);
//        $this->db->set('a.manufacturer_id',$manufacturer_id);
//        $this->db->set('a.category_id',$category_id);
//        $this->db->set('a.sub_category_id',$sub_category_id);
//        $this->db->set('a.name',$name);
//        $this->db->set('a.weight',$weight);
//        $this->db->set('a.status_id',$status_id);
//        $this->db->set('a.quantity',$quantity);
//        $this->db->set('a.price',$price);
//        $this->db->set('a.aktif',$aktif);
//        $this->db->where('a.product_code',$product_code);
//        $this->db->update('ac_product a');
//
//        
////        $data_desc = new stdClass();
////        $data_desc->product_desc_code=$this->input->post('product_code');
//        $this->db->set('b.description',$description);
//        $this->db->where('b.product_desc_code',$product_code);
//        $this->db->update('ac_product_desc b');
//        $data_image = new stdClass();
//        $data_image->product_image_code=$this->input->post('product_code');
//        $this->db->set('image1=$this->_uploadImage1();
//        $this->db->set('image2=$this->_uploadImage2();
//        $this->db->set('image3=$this->_uploadImage3();
//        $this->db->set('image4=$this->_uploadImage4();
//        $this->db->set('image5=$this->_uploadImage5();
//        $data_product->product_code=$post('product_code');
//        $this->manufacturer_id=$post['manufacturer_id'];
//        $this->category_id=$post['category_id'];
//        $this->sub_category_id=$post['sub_category_id'];
//        $this->name=$post['name'];
//        $this->weight=$post['weight'];
//        $this->status_id=$post['status_id'];
//        $this->quantity=$post['quantity'];
//        $this->price=$post['price'];
//        $this->aktif=$post['aktif'];
//        
//        $this->description=$post['description'];
//        
//        $this->product_link_code=$post['product_code'];
//        $this->link_tokopedia=$post['link_tokopedia'];
//        $this->link_bukalapak=$post['link_bukalapak'];
//        $this->link_shopee=$post['link_shopee'];
//        $this->db->where('c.product_image_code',$product_code);
//        $this->db->update('ac_product_image c');
//        
////        $data_link = new stdClass();
////        $data_link->product_link_code=$this->input->post('product_code');
//        $this->db->set('d.link_tokopedia',$link_tokopedia);
//        $this->db->set('d.link_bukalapak',$link_bukalapak);
//        $this->db->set('d.link_shopee',$link_shopee);
//        $this->db->where('d.product_link_code',$product_code);
//        $this->db->update('ac_product_link d');
//        $this->db->trans_begin();
//        $where=['a.product_code'=>$product_code,'b.product_desc_code'=>'a.product_code','c.product_image_code'=>'b.product_desc_code','d.product_link_code'=>'c.product_image_code'];
//        $this->db->where($where);
//        $data_desc->product_desc_id = $this->db->insert_id();
//        $this->db->update('ac_product_desc', $data_desc);
//        $data_image->product_image_id = $this->db->insert_id();
//        $this->db->update('ac_product_image', $data_image);
//        $data_link->product_link_id = $this->db->insert_id();
//        $this->db->update('ac_product_link', $data_link);
//        $this->db->trans_complete();
//        return $this->db->trans_status() ? true : false;    
    }
    
    //backend
    public function hapus_product_all1($product_code) {
        $this->_deleteImage1($product_code);
        $this->_deleteImage2($product_code);
        $this->_deleteImage3($product_code);
        $this->_deleteImage4($product_code);
        $this->_deleteImage5($product_code);
        return $this->db->delete('ac_product', array("product_code" => $product_code));
    }

    private function _uploadImage1() {
//        $data_product = new stdClass();
        $config['upload_path'] = './upload/product/';
        $config['allowed_types'] = 'gif|jpg|png';
//        $config['file_name']            = $data_product->product_code;
        $config['overwrite'] = true;
        $config['max_size'] = 4096; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image1')) {
            return $this->upload->data("file_name");
        }
        print_r($this->upload->display_errors());
//        return "default.jpg";
    }

    private function _uploadImage2() {
//        $data_product = new stdClass();
        $config['upload_path'] = './upload/product/';
        $config['allowed_types'] = 'gif|jpg|png';
//        $config['file_name']            = $data_product->product_code;
        $config['overwrite'] = true;
        $config['max_size'] = 4096; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image2')) {
            return $this->upload->data("file_name");
        }
        print_r($this->upload->display_errors());
//        return "default.jpg";
    }

    private function _uploadImage3() {
//        $data_product = new stdClass();
        $config['upload_path'] = './upload/product/';
        $config['allowed_types'] = 'gif|jpg|png';
//        $config['file_name']            = $data_product->product_code;
        $config['overwrite'] = true;
        $config['max_size'] = 4096; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image3')) {
            return $this->upload->data("file_name");
        }
        print_r($this->upload->display_errors());
//        return "default.jpg";
    }

    private function _uploadImage4() {
//        $data_product = new stdClass();
        $config['upload_path'] = './upload/product/';
        $config['allowed_types'] = 'gif|jpg|png';
//        $config['file_name']            = $data_product->product_code;
        $config['overwrite'] = true;
        $config['max_size'] = 4096; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image4')) {
            return $this->upload->data("file_name");
        }
        print_r($this->upload->display_errors());
//        return "default.jpg";
    }

    private function _uploadImage5() {
//        $data_product = new stdClass();
        $config['upload_path'] = './upload/product/';
        $config['allowed_types'] = 'gif|jpg|png';
//        $config['file_name']            = $data_product->product_code;
        $config['overwrite'] = true;
        $config['max_size'] = 4096; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image5')) {
            return $this->upload->data("file_name");
        }
        print_r($this->upload->display_errors());
//        return "default.jpg";
    }

    private function _deleteImage1($product_code) {
        $product = $this->getById_productall($product_code);
        if ($product->image1 != "default.jpg") {
            $filename = explode(".", $product->image1)[0];
            return array_map('unlink', glob(FCPATH . "upload/product/$filename.*"));
        }
    }

    private function _deleteImage2($product_code) {
        $product = $this->getById_productall($product_code);
        if ($product->image2 != "default.jpg") {
            $filename = explode(".", $product->image2)[0];
            return array_map('unlink', glob(FCPATH . "upload/product/$filename.*"));
        }
    }

    private function _deleteImage3($product_code) {
        $product = $this->getById_productall($product_code);
        if ($product->image3 != "default.jpg") {
            $filename = explode(".", $product->image3)[0];
            return array_map('unlink', glob(FCPATH . "upload/product/$filename.*"));
        }
    }

    private function _deleteImage4($product_code) {
        $product = $this->getById_productall($product_code);
        if ($product->image4 != "default.jpg") {
            $filename = explode(".", $product->image4)[0];
            return array_map('unlink', glob(FCPATH . "upload/product/$filename.*"));
        }
    }

    private function _deleteImage5($product_code) {
        $product = $this->getById_productall($product_code);
        if ($product->image5 != "default.jpg") {
            $filename = explode(".", $product->image5)[0];
            return array_map('unlink', glob(FCPATH . "upload/product/$filename.*"));
        }
    }
    
    //frontend
    public function searchProduct($search){
//        $query = $this->db->query("select * from ac_product where name like '%$search%'");
//        return $query->result();
//        $search = $this->input->post('search');
        $this->db->select('*')
                ->from('ac_product')
                ->where('aktif=1')
                ->like('name',$search);
//	$this->db->or_like('harga',$keyword);
	return $this->db->get()->result();
    }
    
    //backend
    public function getProductCondition() {
        $sql_query = $this->db->query('call getProductCondition ()');
//        mysqli_next_result( $this->db->conn_id);
//            if($sql_query->num_rows()>0){
        return $sql_query->result_array();
    }
    
    //backend tambahan 
    public function uploadFile($filename){
    $this->load->library('upload'); // Load librari upload
    
    $config['upload_path'] = './upload/product/';
    $config['allowed_types'] = 'xlsx';
    $config['max_size']  = '2048';
    $config['overwrite'] = true;
    $config['file_name'] = $filename;
  
    $this->upload->initialize($config); // Load konfigurasi uploadnya
    if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
      // Jika berhasil :
      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      return $return;
    }else{
      // Jika gagal :
      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      return $return;
    }
  }
  
  // Buat sebuah fungsi untuk melakukan insert lebih dari 1 data
  public function insert_multiple($data){
    $this->db->insert_batch('ac_product', $data);
  }
  
  //backend
  public function getGrafikCategory(){
//      $this->db->select('ac_category.category_id,ac_category.category_name,sum(ac_product.category_id)');
//      $this->db->from('ac_product');
//      $this->db->join('ac_category', 'ac_product.category_id = ac_category.category_id');
//      $this->db->group_by('category_id');
//      $query = $this->db->get();
//      return $query->result();
      $hasil = $this->db->query("SELECT ac_product.category_id,ac_category.category_name,count(ac_product.category_id) as jumlah FROM ac_product,ac_category where ac_category.category_id=ac_product.category_id group by ac_category.category_id");
      if($hasil->num_rows() > 0){
            foreach($hasil->result() as $grafik){
                $query[] = $grafik;
            }
      return $query;
        }
  }
  
  public function getGrafikSubCategory(){ 
      $hasil = $this->db->query("SELECT ac_product.sub_category_id,ac_sub_category.sub_category_name,count(ac_product.sub_category_id) as jml FROM ac_product,ac_sub_category where ac_sub_category.sub_category_id=ac_product.sub_category_id group by ac_sub_category.sub_category_id");
      if($hasil->num_rows() > 0){
            foreach($hasil->result() as $grafiksub){
                $query[] = $grafiksub;
            }
      return $query;
        }
  }

}
