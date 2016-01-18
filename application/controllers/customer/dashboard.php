<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	 public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('customer_logged_in')) {
            redirect('customer/login');
        }
        $this->load->model('order_model');
        $this->load->model('konten_model');
    }

    public function index() {
        $data['order']=$this->order_model->totalByCustomer($this->session->userdata('customer_id'));
        $data['konten']=$this->konten_model->totalByCustomer($this->session->userdata('customer_id'));
        $this->template->customer('dashboard', $data);
    }


}