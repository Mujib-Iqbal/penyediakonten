<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	 public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('kreator_logged_in')) {
            redirect('kreator/login');
        }
        $this->load->model('order_model');
        $this->load->model('job_model');
        $this->load->model('gaji_model');
        $this->load->model('konten_model');
    }

    public function index() {
        $data['job']=$this->job_model->totalByKreator($this->session->userdata('kreator_id'));
        $data['gaji']=$this->gaji_model->total($this->session->userdata('kreator_id'));
        $data['konten']=$this->konten_model->totalByKreator($this->session->userdata('kreator_id'));
        $this->template->kreator('dashboard',$data);
    }

}