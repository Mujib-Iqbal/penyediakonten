<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Daftar extends CI_Controller {

    // Konfigurasi untuk validasi
    static $config = array(
            array(
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required|trim|max_length[25]'
                ),
            array(
                'field' => 'username',
                'label' => 'User Name',
                'rules' => 'required|trim|max_length[25]'
                ),
            array(
                'field' => 'telefon',
                'label' => 'No Telefon',
                'rules' => 'required|trim|integer|max_length[15]'
                ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|valid_email|max_length[50]'
                ),
            array(
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'required|trim|max_length[50]'
                ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|trim|max_length[25]'
                ),
            array(
                'field' => 'confirmpassword',
                'label' => 'Confirm Password',
                'rules' => 'required|matches[password]'
                ),
        );

    public function __construct() {
        parent::__construct();
        $this->load->model('backend/customer_model');
        $this->load->model('kreator_model');
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this::$config);
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
    }

     public function index() {
        return redirect('daftar/cust');
    }
    
    public function cust() {

        if (!$this->input->post()) {
            // Jika tidak ada data dari submit form maka akan ditampilkan halaman "tambah paket"
            return $this->template->frontend('daftarcustomer');
        }

        // Jika ada data dari submit form
        // Proses Validasi
        $validation = $this->form_validation->run();

        // Jika validasi salah maka tampilkan form tambah paket beserta pesan errornya
        if ($validation == FALSE) {
            return $this->template->frontend('daftarcustomer');
        }
        
        //Jika validasi benar maka masukan data ke database
        $data = array(
            'customer_nama' => $this->input->post('nama'),
            'customer_telefon' => $this->input->post('telefon'),
            'customer_alamat' => $this->input->post('alamat'),
            'customer_username' => $this->input->post('username'),
            'customer_email' => $this->input->post('email'),
            'customer_password' => md5($this->input->post('password')),
            );
        $this->customer_model->add($data);
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan.');
        return redirect('customer/login');
    }

   

}