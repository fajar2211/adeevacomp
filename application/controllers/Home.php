<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        $this->load->model("Master_model");
        $this->load->model("Product_model");
        $this->load->library("pagination");
    }

    public function index() {
        $data['carousel'] = $this->Master_model->getCarouselSliders_active();
        $data['carousel_item'] = $this->Master_model->getCarouselSliders_item();
        $data['category'] = $this->Master_model->getAllCategory();
        $jumlah_data = $this->Product_model->getJmlProduct();

        $config['base_url'] = site_url('home/index');
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 30;
        $config['uri_segment'] = 3;  // uri parameter
        $config['num_links'] = 4;
//        $choice = $config['total_rows'] / $config['per_page'];
//        $config['num_links'] = floor($choice);

        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] = '</span>Next</li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['productaktif'] = $this->Product_model->getAllProduct3($config['per_page'], $data['page']);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('home/index', $data);
    }

    public function detail($product_id) {
        $data['detail'] = $this->Product_model->getDetailProduct($product_id);
        $this->load->view('home/detail', $data);
    }

    public function etalase($category_id) {
        $data['carousel'] = $this->Master_model->getCarouselSliders_active();
        $data['carousel_item'] = $this->Master_model->getCarouselSliders_item();
        $data['category'] = $this->Master_model->getAllCategory();

//        $jumlah_data = $this->Product_model->getJmlProductByCategory();
////
//        $config['base_url'] = site_url('home/etalase/');
//        $config['total_rows'] = $jumlah_data;
//        $config['per_page'] = 60;
//        $config['uri_segment'] = 3;  // uri parameter
//        $choice = $config['total_rows'] / $config['per_page'];
//        $config['num_links'] = floor($choice);
////
//        $config['first_link'] = 'First';
//        $config['last_link'] = 'Last';
//        $config['next_link'] = 'Next';
//        $config['prev_link'] = 'Prev';
//        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
//        $config['full_tag_close'] = '</ul></nav></div>';
//        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
//        $config['num_tag_close'] = '</span></li>';
//        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
//        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
//        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
//        $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
//        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
//        $config['prev_tagl_close'] = '</span>Next</li>';
//        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
//        $config['first_tagl_close'] = '</span></li>';
//        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
//        $config['last_tagl_close'] = '</span></li>';
////
//        $this->pagination->initialize($config);
//        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
//        $data['etalase'] = $this->Product_model->getProductByCategory($category_id,$config['per_page'], $data['page']);
        $data['etalase'] = $this->Product_model->getProductByCategory($category_id);
//        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('home/etalase', $data);
    }

    public function search(){
        $search = $this->input->post('search');
        $data['carousel'] = $this->Master_model->getCarouselSliders_active();
        $data['carousel_item'] = $this->Master_model->getCarouselSliders_item();
        $data['category'] = $this->Master_model->getAllCategory();
        $data['search'] = $this->Product_model->searchProduct($search);
//        var_dump($search);
        $this->load->view('home/cari', $data);
    }
}
