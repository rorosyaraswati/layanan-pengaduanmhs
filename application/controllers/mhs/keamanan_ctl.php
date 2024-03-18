<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class keamanan_ctl extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('keamanan'); // Mengubah nama model menjadi "keamanan"
        is_loginmhs();
    }

    public function index() {
        $data['keamananArr'] = $this->keamanan->get_keamanan(); // Mengubah nama model menjadi "keamanan"
        $this->load->view('layoutmhs/header');
        $this->load->view('layoutmhs/sidebar');
        $this->load->view('form/keamanan', $data);
        $this->load->view('layoutmhs/footer');
    }

    public function add_keamanan() {
        $this->load->view('layoutmhs/header');
        $this->load->view('layoutmhs/sidebar');
        $this->load->view('add_keamanan');
        $this->load->view('layoutmhs/footer');
    }

    public function save_keamanan() {
        $data = $this->input->post();
        $simpan = $this->keamanan->save_keamanan($data); // Mengubah nama model menjadi "keamanan"
        if ($simpan) {
            $this->session->set_flashdata('message', '
                <div class="alert alert-success pastel alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    keamanan berhasil ditambahkan.
                </div>');
        } else {
            $this->session->set_flashdata('message', '
                <div class="alert alert-danger pastel alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    keamanan gagal ditambahkan.
                </div>');
        }
        redirect('mhs/keamanan_ctl');
    }

    public function delete_keamanan($nim) {
        $this->keamanan->delete_keamanan($nim); // Mengubah nama model menjadi "keamanan"
        redirect('mhs/keamanan_ctl');
    }

    public function edit_keamanan($nim) {
        $data["detail_keamanan"] = $this->keamanan->get_keamanan_by_id($nim); // Mengubah nama model menjadi "keamanan"
        $this->load->view('layoutmhs/header');
        $this->load->view('layoutmhs/sidebar');
        $this->load->view('edit_keamanan', $data);
        $this->load->view('layoutmhs/footer');
    }

    public function update_keamanan($nim) {
        $data = $this->input->post();
        $data['status'] = 'terkirim';
        $update = $this->keamanan->update_keamanan($nim, $data); // Mengubah nama model menjadi "keamanan"
        if ($update) {
            $this->session->set_flashdata('message', '
                <div class="alert alert-success pastel alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    keamanan berhasil diubah.
                </div>');
        } else {
            $this->session->set_flashdata('message', '
                <div class="alert alert-danger pastel alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    keamanan gagal diubah.
                </div>');
        }
        redirect('mhs/keamanan_ctl');
    }
}
