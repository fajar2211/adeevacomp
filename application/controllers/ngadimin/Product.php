<?php

class Product extends CI_Controller {
    
    private $filename = "format";

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('ngadimin/login', 'refresh');
        }
        $this->load->model("Product_model");
        $this->load->model("Master_model");
    }

    public function index() {
        $data["product"] = $this->Product_model->getAllProduct2();
        $data["productaktif"] = $this->Product_model->getAllProduct_aktif();
        $data["manufacturer"] = $this->Master_model->getAllManufacturer();
        $data["category"] = $this->Master_model->getAllCategory();
        $data["subcategory"] = $this->Master_model->getAllSubCategory();
        $data["condition"] = $this->Product_model->getProductCondition();
//        $data["grafik"] = $this->Product_model->getGrafikCategory();
//        var_dump($data);exit;
        $this->load->view("ngadimin/product", $data);
    }

//    public function update_status($product_code){
//
//    $status_id = array('product_code' => $product_code);
//    $this->Product_model->update_status_id($status_id,'ac_product');
//    redirect('ngadimin/product_aktif');
//    }
//      

    public function simpan_product_all() {
//        $this->Product_model->simpan_product_all1($product_code,$manufacturer_id,$category_id,$sub_category_id,$name,$weight,$description,$link_tokopedia,$link_bukalapak,$link_shopee,$status_id,$quantity,$price,$aktif);
//        redirect('ngadimin/product');

        $product = $this->Product_model;
        $data["product"] = $this->Product_model->getAllProduct2();
//            $data["manufacturer"]=$this->Master_model->getAllManufacturer();
//            $pabrikan1=array();
//            foreach ($this->Product_model->getManufacturer() as $manufacturer){
//                $pabrikan1[$manufacturer['manufacturer_id']]=$manufacturer['manufacturer_name'];
//            }
//            $data["pabrikan"]=$pabrikan1;
        $product->simpan_product_all1();
//        $this->db->insert('product',$data);
        redirect('ngadimin/product', $data);
    }

    public function edit_product_all($product_code = null) {
        $product = $this->Product_model;
        $data["product"] = $this->Product_model->getAllProduct2();
//        $data["subcategory"]=$this->Master_model->getAllSubCategory();
//        $product_code=$this->input->post('product_code');
//        $status_id=$this->input->post('status_id');
//        $quantity=$this->input->post('quantity');
//        $price=$this->input->post('price');
        $product->edit_product_all1($product_code);
        redirect('ngadimin/product', $data);
    }

    public function hapus_product_all($product_code = null) {
//        if ($this->Product_model->hapus_product_all1($product_code)){
        $product = $this->Product_model;
//        $data["product"]=$this->Product_model->getAllProduct2();
        $product->hapus_product_all1($product_code);
        redirect('ngadimin/product');
    }
    
    //tambahan
    public function form() {
    $data = array(); // Buat variabel $data sebagai array
    
    if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
      // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
      $upload = $this->Product_model->uploadFile($this->filename);
      
      if($upload['result'] == "success"){ // Jika proses upload sukses
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
        
        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('upload/product/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
        
        // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
        // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
        $data['sheet'] = $sheet; 
      }else{ // Jika proses upload gagal
        $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
      }
    }
    
    $this->load->view('ngadimin/form', $data);
  }
  
  public function import(){
    // Load plugin PHPExcel nya
    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
    $excelreader = new PHPExcel_Reader_Excel2007();
    $loadexcel = $excelreader->load('upload/product/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
    
    // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
    $data = array();
    
    $numrow = 1;
    foreach($sheet as $row){
      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom
      // Jadi dilewat saja, tidak usah diimport
      if($numrow > 1){
        // Kita push (add) array data ke variabel data
        array_push($data, array(
          'product_code'=>$row['A'], // Insert data nis dari kolom A di excel
          'manufacturer_id'=>$row['B'], // Insert data nama dari kolom B di excel
          'category_id'=>$row['C'], // Insert data jenis kelamin dari kolom C di excel
          'sub_category_id'=>$row['D'], // Insert data alamat dari kolom D di excel
          'status_id'=>$row['E'], // Insert data nis dari kolom A di excel
          'condition_id'=>$row['F'], // Insert data nis dari kolom A di excel
          'name'=>$row['G'], // Insert data nama dari kolom B di excel
          'price'=>$row['H'], // Insert data jenis kelamin dari kolom C di excel
          'weight'=>$row['I'], // Insert data alamat dari kolom D di excel
          'quantity'=>$row['J'], // Insert data alamat dari kolom D di excel
          'description'=>$row['K'], // Insert data alamat dari kolom D di excel
          'image1'=>$row['L'], // Insert data alamat dari kolom D di excel
          'image2'=>$row['M'], // Insert data alamat dari kolom D di excel
          'image3'=>$row['N'], // Insert data alamat dari kolom D di excel
          'image4'=>$row['O'], // Insert data alamat dari kolom D di excel
          'image5'=>$row['P'], // Insert data alamat dari kolom D di excel
          'link_tokopedia'=>$row['Q'], // Insert data alamat dari kolom D di excel
          'link_bukalapak'=>$row['R'], // Insert data alamat dari kolom D di excel
          'link_shopee'=>$row['S'], // Insert data alamat dari kolom D di excel
          'aktif'=>$row['T'], // Insert data nama dari kolom B di excel
        ));
      }
      
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
    $this->Product_model->insert_multiple($data);
    
    redirect("ngadimin/product"); // Redirect ke halaman awal (ke controller siswa fungsi index)
  }

}
