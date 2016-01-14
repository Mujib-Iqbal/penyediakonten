<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('dashboard/login');
        }

        // Load model
        $this->load->model('backend/customer_model');
    }

	// Mengarahkan pada halaman pembayaran / payment
    public function index() {
        redirect('dashboard/customer/view');
    }

    // Menampilkan halaman pembayaran / payment
    public function view() {

        // Ambil data payment dari database
        $data['customer'] = $this->customer_model->view();

        // Memuat view dengan data payment dari database
        return $this->template->backend('customer', $data);
    }

	// Menampilkan halaman detail customer
    public function detail($id) {
        // Cek apakah URL terdapat id customer atau tidak
        if (is_null($id)) {
            // Jika tidak ada maka redirect ke halaman pembayaran
            return redirect('dashboard/customer/view');
        }

        // Ambil data customer berdasarkan id tersebut
        $data['customer'] = $this->customer_model->get($id);

        // Cek apakah terdapat data customer dengan id tersebut
        if (count($data['customer'])==0) {
            // Jika tidak ada data customer dengan id tersebut redirect ke halaman customer dengan pesan error
            $this->session->set_flashdata('danger', 'Data tidak ditemukan');
            return redirect('dashboard/customer/view');
        }

        // Jika ada tampilkan halaman detail pembayaran
        $this->template->backend('detail-customer', $data);

    }

    public function delete($id) {
        // Cek apakah URL terdapat id customer atau tidak
        if (is_null($id)) {
            // Jika tidak ada maka redirect ke halaman customer
            return redirect('dashboard/customer/view');
        }

        $removeable = $this->customer_model->removeable($id);
        if ($removeable) {
            $this->customer_model->delete($id);
            $this->session->set_flashdata('success', 'Data Customer telah dihapus');
            return redirect('dashboard/customer/view');
        }

        $this->session->set_flashdata('danger', 'Customer tidak dapat dihapus karena memiliki relasi dengan data Order');
        return redirect('dashboard/customer/view');
    }

}