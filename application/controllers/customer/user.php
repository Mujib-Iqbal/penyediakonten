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
                'field' => 'telefon',
                'label' => 'No Telefon',
                'rules' => 'required|trim|integer|max_length[15]'
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
        if (!$this->session->userdata('customer_logged_in')) {
            redirect('customer/login');
        }
        
        $this->load->model('backend/customer_model');
        $this->load->library('form_validation');
        //$this->form_validation->set_rules($this::$config);
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
    }

    // Mengarahkan pada halaman pembayaran / payment
    public function index() {
        redirect('dashboard/admin/profil');
    }


    public function profil() {

        // Cek ada data dari form yang di-submit
        if ($this->input->post()) { // Jika terdapat data yang disubmit masuk ke kondisi ini

          // Mengatur aturan validasi
          $config = $this::$config;
          unset($config[5]);
          unset($config[6]);
          // Cek jika form password diisi maka harus divalidasi
          if ($this->input->post('password') != NULL) {
            $config[] = array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|trim|max_length[25]'
              );
            $config[] = array(
                'field' => 'confirmpassword',
                'label' => 'Confirm Password',
                'rules' => 'required|matches[password]'
              );
          }
          $this->form_validation->set_rules($config);
            // Proses Validasi data yang disubmit
            $validation = $this->form_validation->run();

            // Cek dapakah validasiya benar atau salah
            if ($validation == FALSE) { // Jika validasi salah maka masuk ke kondisi ini
                // Redirect ke form ubah paket beserta pesan errornya
                return $this->template->customer('profil');
            }

            //Jika validasi benar maka masukan data ke database
            $data = array(
                'customer_nama' => $this->input->post('nama'),
                'customer_username' => $this->input->post('username'),
                'customer_email' => $this->input->post('email'),
                'customer_alamat' => $this->input->post('alamat'),
                'customer_telefon' => $this->input->post('telefon'),
                );
            if ($this->input->post('password') != NULL) {
              $data ['customer_password'] = md5($this->input->post('password'));
            }
            $this->customer_model->update($this->session->userdata('customer_id'), $data);

            // Update data admin yang sedang login
            $user_data['customer_nama'] = $this->input->post('nama');
            $user_data['customer_username'] = $this->input->post('username');
            $user_data['customer_email'] = $this->input->post('email');
            $user_data['customer_telefon'] = $this->input->post('telefon');
            $user_data['customer_alamat'] = $this->input->post('alamat');
            $this->session->set_userdata($user_data);

            // Redirect ke halaman view paket dengan notifikasi
            $this->session->set_flashdata('success', 'Data berhasil diubah.');
            return redirect('customer/user/profil');
        }

        // Jika tidak ada maka tampilkan halaman ubah paket dengan form yang sudah terisi dengan data sebelumnya
        // Jika paket ditemukan ambil datanya dan masukkan ke dalam view
        return $this->template->customer('profil');
    }

    public function update($id) {
        // Cek ada tidaknya data yang dikirim
        if (!$this->input->post()) {
            // Jika tidak ada data dari submit form, redirect ke halaman "view paket"
            return redirect('customer/user/profil');
        }

        // ambil data paket dengan id tertentu
        $customer = $this->customer_model->get($id);
        if ($customer == null) {
            // Jika paket tidak dapat ditemukan, redirect ke halaman view paket
            $this->session->set_flashdata('danger', 'Data tidak ditemukan.');
            return redirect('customer/user/profil');
        }

        // Proses Validasi
        $this->form_validation->set_rules($this::$config);
        $validation = $this->form_validation->run();

        // Jika validasi salah maka tampilkan form tambah paket beserta pesan errornya
        if ($validation == FALSE) {
            return redirect('customer/user/profil/'.$id);
        }

        //Jika validasi benar maka masukan data ke database
        $data = array(
                'customer_nama' => $this->input->post('nama'),
                'customer_username' => $this->input->post('username'),
                'customer_password' => md5($this->input->post('password')),
                'customer_email' => $this->input->post('email'),
                //'admin_confirmpassword' => $this->input->post(''),
            );
        $this->customer_model->update($id, $data);

        // Redirect ke halaman view paket dengan notifikasi
        $this->session->set_flashdata('success', 'Data berhasil diubah.');
        return redirect('customer/user/profil');

    }

}