<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	 public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('dashboard/login');
        }
        $this->load->model('pendapatan_model');
        $this->load->model('order_model');
        $this->load->model('kreator_model');
        $this->load->model('backend/customer_model');
    }

    public function index() {
        $data['pendapatan']=$this->pendapatan_model->total();
        $data['order']=$this->order_model->total();
        $data['kreator']=$this->kreator_model->total();
        $data['customer']=$this->customer_model->total();
        $this->template->backend('dashboard',$data);
    }



}