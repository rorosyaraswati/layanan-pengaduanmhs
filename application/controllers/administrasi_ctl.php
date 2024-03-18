<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrasi_ctl extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('administrasi'); // Mengubah nama model menjadi "administrasi"
        is_login();
    }

    public function index() {
        $data['administrasiArr'] = $this->administrasi->get_administrasi(); // Mengubah nama model menjadi "administrasi"
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('pengaduan/administrasi_view', $data);
        $this->load->view('layout/footer');
    }

    public function add_administrasi() {
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('add_administrasi');
        $this->load->view('layout/footer');
    }

    public function save_administrasi() {
        $data = $this->input->post();
        $simpan = $this->administrasi->save_administrasi($data); // Mengubah nama model menjadi "administrasi"
        if ($simpan) {
            $this->session->set_flashdata('message', '
                <div class="alert alert-success pastel alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    administrasi berhasil ditambahkan.
                </div>');
        } else {
            $this->session->set_flashdata('message', '
                <div class="alert alert-danger pastel alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    administrasi gagal ditambahkan.
                </div>');
        }
        redirect('administrasi_ctl');
    }

    public function delete_administrasi($no_ref) {
        $this->administrasi->delete_administrasi($no_ref); // Mengubah nama model menjadi "administrasi"
        redirect('administrasi_ctl');
    }

    public function edit_administrasi($no_ref) {
        $data["detail_administrasi"] = $this->administrasi->get_administrasi_by_id($no_ref); // Mengubah nama model menjadi "administrasi"
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('edit_administrasi', $data);
        $this->load->view('layout/footer');
    }

    public function update_administrasi($no_ref) {
        $data = $this->input->post();
        $update = $this->administrasi->update_administrasi($no_ref, $data); // Mengubah nama model menjadi "administrasi"
        if ($update) {
            $this->session->set_flashdata('message', '
                <div class="alert alert-success pastel alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    administrasi berhasil diubah.
                </div>');
        } else {
            $this->session->set_flashdata('message', '
                <div class="alert alert-danger pastel alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    administrasi gagal diubah.
                </div>');
        }
        redirect('administrasi_ctl');
    }

    public function update_status()
    {
        $data = json_decode($this->input->raw_input_stream, true);
        $no_ref = $data['no_ref'];
        $status = $data['status'];
    
        // Panggil fungsi model untuk menyimpan data ke database
        $this->administrasi->update_status($no_ref, $status);
    
        // Response jika berhasil (tidak dihandle di frontend, hanya untuk memberikan pesan pada AJAX)
        echo 'success';
    }
    
}
