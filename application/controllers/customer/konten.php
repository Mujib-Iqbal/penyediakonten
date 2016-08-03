<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Konten extends CI_Controller {

	 public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('customer_logged_in')) {
            redirect('customer/login');
        }
       $this->load->model('konten_model');

    }

    public function index() {
        return redirect('customer/konten/view');
    }

    public function view() {
        $data['konten'] = $this->konten_model->getContentByCustomerId($this->session->userdata('customer_id'));
        // var_dump($data['konten']);
        // return 'ok';
        return $this->template->customer('konten', $data);
    }

    public function detail($id) {
         // Cek apakah URL terdapat id customer atau tidak
        if (is_null($id)) {
            // Jika tidak ada maka redirect ke halaman pembayaran
            return redirect('customer/konten/view');
        }

        // Ambil data customer berdasarkan id tersebut
        $data['konten'] = $this->konten_model->get($id);

        // Cek apakah terdapat data customer dengan id tersebut
        if (count($data['konten'])==0) {
            // Jika tidak ada data customer dengan id tersebut redirect ke halaman customer dengan pesan error
            $this->session->set_flashdata('danger', 'Data tidak ditemukan');
            return redirect('customer/konten/view');
        }

        // Jika ada tampilkan halaman detail pembayaran
        $this->template->customer('detail-konten', $data);
    }
}