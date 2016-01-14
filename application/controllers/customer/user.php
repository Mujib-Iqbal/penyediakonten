<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

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
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|valid_email|max_length[50]'
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
        if (!$this->session->userdata('customer_logged_in')) {
            redirect('customer/login');
        }
        
        $this->load->model('backend/customer_model');
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this::$config);
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
    }

    // Mengarahkan pada halaman pembayaran / payment
    public function index() {
        redirect('dashboard/admin/profil');
    }


    public function profil() {

        // Ambil data paket dengan id tertentu
        $this->customer_model->get($this->session->userdata('customer_id'));
        

        // Cek ada data dari form yang di-submit
        if ($this->input->post()) { // Jika terdapat data yang disubmit masuk ke kondisi ini
            // Proses Validasi data yang disubmit
            $validation = $this->form_validation->run();

            // Cek dapakah validasiya benar atau salah
            if ($validation == FALSE) { // Jika validasi salah maka masuk ke kondisi ini
                // Redirect ke form ubah paket beserta pesan errornya
                $data['customer'] = $user;
                return $this->template->customer('profil', $data);
            }

            //Jika validasi benar maka masukan data ke database
            $data = array(
                'customer_nama' => $this->input->post('nama'),
                'customer_username' => $this->input->post('username'),
                'customer_password' => md5($this->input->post('password')),
                'customer_email' => $this->input->post('email'),
                //'admin_confirmpassword' => $this->input->post(''),
                //'admin_confirmpassword' => $this->input->post('username'),
                );
            $this->customer_model->update($id, $data);

            // Redirect ke halaman view paket dengan notifikasi
            $this->session->set_flashdata('success', 'Data berhasil diubah.');
            return redirect('customer/user/profil');
        }

        // Jika tidak ada maka tampilkan halaman ubah paket dengan form yang sudah terisi dengan data sebelumnya
        // Jika paket ditemukan ambil datanya dan masukkan ke dalam view
        // $data['admin'] = $admin;
        return $this->template->customer('profil');
    }

}