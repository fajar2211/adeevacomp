<?php

class All extends CI_Controller {
    
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
                
	}

	public function index()
	{
            $data["laporan"]=$this->Laporan_model->getAllLaporan();
            $data["product"]=$this->Product_model->getAllProduct2();
            $data["productaktif"]=$this->Product_model->getAllProduct_aktif();
            $data["manufacturer"]=$this->Master_model->getAllManufacturer();
            $data["category"]=$this->Master_model->getAllCategory();
            $data["subcategory"]=$this->Master_model->getAllSubCategory();
            $data["user"]=$this->User_model->getAllUser();
            $this->load->view("ngadimin/laporan/all",$data);
           
        }
        
        public function simpan_laporan(){
            $laporan = $this->Laporan_model;
            $laporan->simpan_laporan1();
            redirect('ngadimin/laporan/all');
        }
        
        public function edit_laporan($laporan_id = null){
            $laporan = $this->Laporan_model;
            $data["laporan"]=$this->Laporan_model->getAllLaporan();
            $laporan->edit_laporan1($laporan_id);
            redirect('ngadimin/laporan/all',$data);
        }
        
        public function hapus_laporan($laporan_id = null){
            $laporan = $this->Laporan_model;
//            $data["laporan"]=$this->Laporan_model->getAllLaporan();
            $laporan->hapus_laporan1($laporan_id);
            redirect('ngadimin/laporan/all');
        }
}