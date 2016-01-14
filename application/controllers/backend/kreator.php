<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kreator extends CI_Controller {

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
                'field' => 'konten',
                'label' => 'Konten',
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
                'rules' => 'required|trim|max_length[100]'
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
        $this->load->model('kreator_model');
        $this->load->library('form_validation');

        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
    }

    // Mengarahkan pada halaman pembayaran / payment
    public function index() {
        redirect('dashboard/kreator/view');
    }

    // Menampilkan halaman pembayaran / payment
    public function view() {

        // Ambil data payment dari database
        $data['kreator'] = $this->kreator_model->view();

        // Memuat view dengan data payment dari database
        return $this->template->backend('kreator', $data);
    }

    public function add() {

        if (!$this->input->post()) {
            // Jika tidak ada data dari submit form maka akan ditampilkan halaman "tambah paket"
            return $this->template->backend('tambah-kreator');
        }

        // Jika ada data dari submit form
        // Proses Validasi
        $this->form_validation->set_rules($this::$config);
        $validation = $this->form_validation->run();

        // Jika validasi salah maka tampilkan form tambah paket beserta pesan errornya
        if ($validation == FALSE) {
            return $this->template->backend('tambah-kreator');
        }

        //Jika validasi benar maka masukan data ke database
        $data = array(
                'kreator_nama' => $this->input->post('nama'),
                'kreator_alamat' => $this->input->post('alamat'),
                'kreator_telefon' => $this->input->post('telefon'),
                'kreator_email' => $this->input->post('email'),
                'kreator_konten' => $this->input->post('konten'),
                'kreator_username' => $this->input->post('username'),
                'kreator_password' => md5($this->input->post('password')),
            );

        $this->kreator_model->add($data);
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan.');
        return redirect('dashboard/kreator/view');
    }

    public function edit($id) {

        // Ambil data paket dengan id tertentu
        $kreator = $this->kreator_model->get($id);

        // Cek apakah paket dengan id tertentu tersebut ada dalam database
        if ($kreator == null) { // Jika paket dengan id tersebut tidak dapat ditemukan masuk ke kondisi ini
            // redirect ke halaman view paket
            $this->session->set_flashdata('danger', 'Data tidak ditemukan.');
            return redirect('dashboard/kreator/view');
        }

        // Cek ada data dari form yang di-submit
        if ($this->input->post()) { // Jika terdapat data yang disubmit masuk ke kondisi ini
            // Proses Validasi data yang disubmit
            $config = $this::$config;
            unset($config[6]);
            unset($config[7]);
            $this->form_validation->set_rules($config);
            $validation = $this->form_validation->run();

            // Cek dapakah validasiya benar atau salah
            if ($validation == FALSE) { // Jika validasi salah maka masuk ke kondisi ini
                // Redirect ke form ubah paket beserta pesan errornya
                $data['kreator'] = $kreator;
                return $this->template->backend('edit-kreator', $data);
            }

            //Jika validasi benar maka masukan data ke database
            $data = array(
                'kreator_nama' => $this->input->post('nama'),
                'kreator_alamat' => $this->input->post('alamat'),
                'kreator_telefon' => $this->input->post('telefon'),
                'kreator_email' => $this->input->post('email'),
                'kreator_konten' => $this->input->post('konten'),
                'kreator_username' => $this->input->post('username'),
            );
            $this->kreator_model->update($id, $data);

            // Redirect ke halaman view paket dengan notifikasi
            $this->session->set_flashdata('success', 'Data berhasil diubah.');
            return redirect('dashboard/kreator/view');
        }

        // Jika tidak ada maka tampilkan halaman ubah paket dengan form yang sudah terisi dengan data sebelumnya
        // Jika paket ditemukan ambil datanya dan masukkan ke dalam view
        $data['kreator'] = $kreator;
        return $this->template->backend('edit-kreator', $data);
    }


    public function update($id) {
        // Cek ada tidaknya data yang dikirim
        if (!$this->input->post()) {
            // Jika tidak ada data dari submit form, redirect ke halaman "view paket"
            return redirect('dashboard/kreator/view');
        }

        // ambil data paket dengan id tertentu
        $kreator = $this->kreator_model->get($id);
        if ($kreator == null) {
            // Jika paket tidak dapat ditemukan, redirect ke halaman view paket
            $this->session->set_flashdata('danger', 'Data tidak ditemukan.');
            return redirect('dashboard/kreator/view');
        }

        // Proses Validasi
        $validation = $this->form_validation->run();

        // Jika validasi salah maka tampilkan form tambah paket beserta pesan errornya
        if ($validation == FALSE) {
            return redirect('dashboard/kreator/edit/'.$id);
        }

        //Jika validasi benar maka masukan data ke database
        $data = array(
                'kreator_nama' => $this->input->post('nama'),
                'kreator_alamat' => $this->input->post('alamat'),
                'kreator_telefon' => $this->input->post('telefon'),
                'kreator_email' => $this->input->post('email'),
                'kreator_username' => $this->input->post('username'),
            );
        $this->kreator_model->update($id, $data);

        // Redirect ke halaman view paket dengan notifikasi
        $this->session->set_flashdata('success', 'Data berhasil diubah.');
        return redirect('dashboard/kreator/view');

    }

    //[FUNGSI DELETE MASIH ERROR]
    public function delete($id) {
        // Cek ada tidaknya data yang dikirim
        if (is_null($id)) {
            // Jika tidak ada data dari submit form, redirect ke halaman "view paket"
            return redirect('dashboard/kreator/view');
        }

        $removeable = $this->kreator_model->removeable($id);
        if ($removeable) {
            $this->kreator_model->delete($id);
            $this->session->set_flashdata('success', 'Data Kreator telah dihapus');
            return redirect('dashboard/kreator/view');
        }

        $this->session->set_flashdata('danger', 'Kreator tidak dapat dihapus karena memiliki relasi dengan data Job');
        return redirect('dashboard/kreator/view');
    }


}