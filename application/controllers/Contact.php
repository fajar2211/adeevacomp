<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("Master_model");
        
    }
    
    public function index() {
        $data['address'] = $this->Master_model->getAddress();
        $this->load->view('home/contact',$data);
    }
}