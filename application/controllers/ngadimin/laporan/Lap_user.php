<?php

class Lap_user extends CI_Controller {
    
    public function __construct()
    {
		parent::__construct();
                if($this->session->userdata('logged_in') !== TRUE){
                redirect('ngadimin/login','refresh');
                }
                $this->load->model("Product_model");
                $this->load->model("Master_model");
                $this->load->model("User_model");
                $this->load->model("Laporan_model");
                $this->load->helper("download");
	}

	public function index()
	{
            $data["laporan"]=$this->Laporan_model->getAllLaporan();
            $data["product"]=$this->Product_model->getAllProduct2();
            $data["productaktif"]=$this->Product_model->getAllProduct_aktif();
            $data["manufacturer"]=$this->Master_model->getAllManufacturer();
            $data["category"]=$this->Master_model->getAllCategory();
            $data["subcategory"]=$this->Master_model->getAllSubCategory();
            
//            $data["bulan"]=$this->Laporan_model->getBulan();
            $data["tahun"]=$this->Laporan_model->getTahun();
           
            
            $this->load->view("ngadimin/laporan/lap_user",$data);
           
        }
        
        public function tampil(){
            $data["laporan"]=$this->Laporan_model->getAllLaporan();
            $data["product"]=$this->Product_model->getAllProduct2();
            $data["productaktif"]=$this->Product_model->getAllProduct_aktif();
            $data["manufacturer"]=$this->Master_model->getAllManufacturer();
            $data["category"]=$this->Master_model->getAllCategory();
            $data["subcategory"]=$this->Master_model->getAllSubCategory();
            
//            $data["bulan"]=$this->Laporan_model->getBulan();
            $bulan=$this->input->get('bulan');
            $tahun=$this->input->get('tahun');
//            $bulan=$this->Laporan_model;
            $data["tahun"]=$this->Laporan_model->getTahun();
            $data["lap_user"]=$this->Laporan_model->getFilterLaporan($bulan,$tahun)->result_array();
            
            $this->load->view("ngadimin/laporan/tampil",$data);
        }
        
        public function download($filename = NULL) {   
        if ($filename) {
         $file = realpath ( "upload/laporan" ) . "\\" . $filename;
         // check file exists 
         if (file_exists ( $file )) {
          // get file content
          $data = file_get_contents ( $file );
          // force download
          force_download ( $filename, $data );
         } else {
          // Redirect to base url
          redirect ( base_url () );
         }
        }
       }
}