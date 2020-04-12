<?php

class Laporan_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->db = $this->load->database('default', true);
    }

    public function getAllLaporan() {
//        return $this->db->get('ac_manufacturer')->result_array();
        $sql_query = $this->db->query('call getAllLaporan ()');
//        mysqli_next_result( $this->db->conn_id);
//            if($sql_query->num_rows()>0){
        return $sql_query->result_array();
    }

    public function getBulan() {
        $sql_query = $this->db->query('call getBulan ()');
//        mysqli_next_result( $this->db->conn_id);
//            if($sql_query->num_rows()>0){
        return $sql_query->result_array();
    }

    public function getTahun() {
        $sql_query = $this->db->query('call getTahun ()');
//        mysqli_next_result( $this->db->conn_id);
//            if($sql_query->num_rows()>0){
        return $sql_query->result_array();
    }

    public function getFilterLaporan($bulan, $tahun) {
        $id = $this->session->userdata('ngadimin_id');
//        $this->db->where("date_format(blth,'%M')",$bulan);
//        $this->db->where("date_format(blth,'%Y')",$tahun);
//        $this->db->where('ngadimin_id',$ngadimin_id);
        $hasil = $this->db->query("SELECT date_format(a.blth,'%Y%m') as blth,a.filename,b.username FROM mc_laporan a,ac_ngadimin b WHERE a.ngadimin_id=b.ngadimin_id and b.ngadimin_id='$id' and date_format(blth,'%m')='$bulan' and date_format(blth,'%Y')='$tahun'");
        return $hasil;
//        return $this->db->get('mc_laporan');
    }

    public function getById_laporan($laporan_id) {
        return $this->db->get_where('mc_laporan', ["laporan_id" => $laporan_id])->row();
    }

    public function simpan_laporan1() {
        $post = $this->input->post();
        $data = new stdClass();
        $data->ngadimin_id = $post['ngadimin_id'];
        $data->blth = $post['blth'];
        $data->filename = $this->_uploadFile();

        $this->db->insert('mc_laporan', $data);
    }

    public function edit_laporan1($laporan_id) {
        $post = $this->input->post();
        $data = new stdClass();
        $data->blth = $post['blth'];

        if (!empty($_FILES["filename"]["name"])) {
            $data->filename = $this->_uploadFile();
        } else {
            $data->filename = $post["old_file"];
        }

        $this->db->update('mc_laporan', $data, array('laporan_id' => $post['laporan_id']));
    }

    public function hapus_laporan1($laporan_id) {
        $this->_deleteFile($laporan_id);
        return $this->db->delete('mc_laporan', array("laporan_id" => $laporan_id));
    }

    private function _uploadFile() {
//        $data_product = new stdClass();
        $config['upload_path'] = './upload/laporan/';
        $config['allowed_types'] = 'xls|pdf|xlsx';
//        $config['file_name']            = $data_product->product_code;
        $config['overwrite'] = true;
        $config['max_size'] = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('filename')) {
            return $this->upload->data("file_name");
        }
        print_r($this->upload->display_errors());
//        return "default.jpg";
    }

//    private function _deleteFile($laporan_id) {
//        $laporan = $this->getById_laporan($laporan_id);
//        if ($laporan->filename != "default.jpg") {
//            $filename = explode(".", $laporan->filename)[0];
//            return array_map('unlink', glob(FCPATH . "upload/laporan/$filename.*"));
//        }
//    }

    private function _deleteFile($laporan_id) {
        $laporan = $this->getById_laporan($laporan_id);
        if ($laporan->filename != "") {
            $filename = explode(".", $laporan->filename)[0];
            return array_map('unlink', glob(FCPATH . "upload/laporan/$filename.*"));
        }
    }

}
