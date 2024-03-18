<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class administrasi_ctl extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('administrasi'); // Mengubah nama model menjadi "administrasi"
        is_loginmhs();
    }

    public function index() {
        
        $data['administrasiArr'] = $this->administrasi->get_administrasi(); // Mengubah nama model menjadi "administrasi"
        $this->load->view('layoutmhs/header');
        $this->load->view('layoutmhs/sidebar');
        $this->load->view('form/administrasi', $data);
        $this->load->view('layoutmhs/footer');
    }

    public function add_administrasi() {
        $this->load->view('layoutmhs/header');
        $this->load->view('layoutmhs/sidebar');
        $this->load->view('add_administrasi');
        $this->load->view('layoutmhs/footer');
    }

    public function save_administrasi() {
        $data = $this->input->post();
        $data['status'] = 'terkirim';
        $simpan = $this->administrasi->save_administrasi($data); // Mengubah nama model menjadi "administrasi"
        if ($simpan) {
            $this->session->set_flashdata('message', '
                <div class="alert alert-success pastel alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Pengaduan Telah Terkirim.
                </div>');
        } else {
            $this->session->set_flashdata('message', '
                <div class="alert alert-danger pastel alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Gagal Mengirim Pengaduan.
                </div>');
        }
        redirect('mhs/administrasi_ctl');
    }

    public function delete_administrasi($no_ref) {
        $this->administrasi->delete_administrasi($no_ref); // Mengubah nama model menjadi "administrasi"
        redirect('administrasi_mhs');
    }

    public function edit_administrasi($no_ref) {
        $data["detail_administrasi"] = $this->administrasi->get_administrasi_by_id($no_ref); // Mengubah nama model menjadi "administrasi"
        $this->load->view('layoutmhs/header');
        $this->load->view('layoutmhs/sidebar');
        $this->load->view('edit_administrasi', $data);
        $this->load->view('layoutmhs/footer');
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
        redirect('mhs/administrasi_ctl');
    }
}
