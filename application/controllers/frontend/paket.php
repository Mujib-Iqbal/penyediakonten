<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Paket extends CI_Controller {

     public function __construct() {
        parent::__construct();
    $this->load->model('backend/paket_model');
    }

    public function index() {
        
        $this->template->frontend('paket');
    }

    public function view() {
        // Ambil data paket pada database
        $data['paket'] = $this->paket_model->view();

        // Memuat view dengan memasukkan data kedalamnya
        return $this->template->frontend('paket', $data);
    }

}