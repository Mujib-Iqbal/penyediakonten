<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {

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
        if (!$this->session->userdata('logged_in')) {
            redirect('dashboard/login');
        }

        // Load model
        $this->load->model('backend/admin_model');
        $this->load->library('form_validation');
        // $this->form_validation->set_rules($this::$config);
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
    }

    // Mengarahkan pada halaman pembayaran / payment
    public function index() {
        redirect('dashboard/admin/view');
    }

    public function add() {

        if (!$this->input->post()) {
            // Jika tidak ada data dari submit form maka akan ditampilkan halaman "tambah paket"
            return $this->template->backend('tambah-admin');
        }

        // Jika ada data dari submit form
        // Proses Validasi
        $this->form_validation->set_rules($this::$config);
        $validation = $this->form_validation->run();

        // Jika validasi salah maka tampilkan form tambah paket beserta pesan errornya
        if ($validation == FALSE) {
            return $this->template->backend('tambah-admin');
        }

        //Jika validasi benar maka masukan data ke database
        $data = array(
            'admin_nama' => $this->input->post('nama'),
            'admin_username' => $this->input->post('username'),
            'admin_email' => $this->input->post('email'),
            'admin_password' => md5($this->input->post('password')),
            );
        $this->admin_model->add($data);
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan.');
        return redirect('dashboard/admin/view');
    }

    // Menampilkan halaman pembayaran / payment
    public function view() {

        // Ambil data payment dari database
        $data['admin'] = $this->admin_model->view();

        // Memuat view dengan data payment dari database
        return $this->template->backend('admin', $data);
    }

    public function edit($id) {

        // Ambil data paket dengan id tertentu
        $admin = $this->admin_model->get($id);

        // Cek apakah paket dengan id tertentu tersebut ada dalam database
        if ($admin == null) { // Jika paket dengan id tersebut tidak dapat ditemukan masuk ke kondisi ini
            // redirect ke halaman view paket
            $this->session->set_flashdata('danger', 'Data tidak ditemukan.');
            return redirect('dashboard/admin/view');
        }

        // Cek ada data dari form yang di-submit
        if ($this->input->post()) { // Jika terdapat data yang disubmit masuk ke kondisi ini
            // Proses Validasi data yang disubmit
            $this->form_validation->set_rules($this::$config);
            $validation = $this->form_validation->run();

            // Cek dapakah validasiya benar atau salah
            if ($validation == FALSE) { // Jika validasi salah maka masuk ke kondisi ini
                // Redirect ke form ubah paket beserta pesan errornya
                $data['admin'] = $admin;
                return $this->template->backend('edit-admin', $data);
            }

            //Jika validasi benar maka masukan data ke database
            $data = array(
                'admin_nama' => $this->input->post('nama'),
                'admin_username' => $this->input->post('username'),
                'admin_password' => md5($this->input->post('password')),
                'admin_email' => $this->input->post('email'),
                //'admin_confirmpassword' => $this->input->post(''),
                //'admin_confirmpassword' => $this->input->post('username'),
                );
            $this->admin_model->update($id, $data);

            // Redirect ke halaman view paket dengan notifikasi
            $this->session->set_flashdata('success', 'Data berhasil diubah.');
            return redirect('dashboard/admin/view');
        }

        // Jika tidak ada maka tampilkan halaman ubah paket dengan form yang sudah terisi dengan data sebelumnya
        // Jika paket ditemukan ambil datanya dan masukkan ke dalam view
        $data['admin'] = $admin;
        return $this->template->backend('edit-admin', $data);
    }

    public function update($id) {
        // Cek ada tidaknya data yang dikirim
        if (!$this->input->post()) {
            // Jika tidak ada data dari submit form, redirect ke halaman "view paket"
            return redirect('dashboard/admin/view');
        }

        // ambil data paket dengan id tertentu
        $admin = $this->admin_model->get($id);
        if ($admin == null) {
            // Jika paket tidak dapat ditemukan, redirect ke halaman view paket
            $this->session->set_flashdata('danger', 'Data tidak ditemukan.');
            return redirect('dashboard/admin/view');
        }

        // Proses Validasi
        $this->form_validation->set_rules($this::$config);
        $validation = $this->form_validation->run();

        // Jika validasi salah maka tampilkan form tambah paket beserta pesan errornya
        if ($validation == FALSE) {
            return redirect('dashboard/admin/edit/'.$id);
        }

        //Jika validasi benar maka masukan data ke database
        $data = array(
                'admin_nama' => $this->input->post('nama'),
                'admin_username' => $this->input->post('username'),
                'admin_password' => md5($this->input->post('password')),
                'admin_email' => $this->input->post('email'),
                //'admin_confirmpassword' => $this->input->post(''),
            );
        $this->admin_model->update($id, $data);

        // Redirect ke halaman view paket dengan notifikasi
        $this->session->set_flashdata('success', 'Data berhasil diubah.');
        return redirect('dashboard/admin/view');

    }

    public function profil() {

        // Cek ada data dari form yang di-submit
        if ($this->input->post()) { // Jika terdapat data yang disubmit masuk ke kondisi ini

          // Mengatur aturan validasi
          $config = $this::$config;
          unset($config[3]);
          unset($config[4]);
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
                return $this->template->backend('profil-admin');
            }

            //Jika validasi benar maka masukan data ke database
            $data = array(
                'admin_nama' => $this->input->post('nama'),
                'admin_username' => $this->input->post('username'),
                'admin_email' => $this->input->post('email'),
                );
            if ($this->input->post('password') != NULL) {
              $data ['admin_password'] = md5($this->input->post('password'));
            }
            $this->admin_model->update($this->session->userdata('admin_id'), $data);

            // Update data admin yang sedang login
            $user_data['admin_nama'] = $this->input->post('nama');
            $user_data['admin_username'] = $this->input->post('username');
            $user_data['admin_email'] = $this->input->post('email');
            $this->session->set_userdata($user_data);

            // Redirect ke halaman view paket dengan notifikasi
            $this->session->set_flashdata('success', 'Data berhasil diubah.');
            return redirect('dashboard/admin/view');
        }

        // Jika tidak ada maka tampilkan halaman ubah paket dengan form yang sudah terisi dengan data sebelumnya
        // Jika paket ditemukan ambil datanya dan masukkan ke dalam view
        return $this->template->backend('profil-admin');
    }

    //[FUNGSI DELETE MASIH ERROR]
    public function delete($id) {
        // Cek ada tidaknya data yang dikirim
        if (is_null($id)) {
            // Jika tidak ada data dari submit form, redirect ke halaman "view paket"
            return redirect('dashboard/admin/view');
        }

        $this->admin_model->delete($id);

        // Redirect ke halaman view paket dengan notifikasi
        $this->session->set_flashdata('success', 'admin berhasil dihapus.');
        return redirect('dashboard/admin/view');
    }


}
