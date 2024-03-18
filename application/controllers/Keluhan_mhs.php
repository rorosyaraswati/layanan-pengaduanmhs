<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluhan_mhs extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('keluhan'); // Mengubah nama model menjadi "keluhan"
        is_login();
    }

    public function index() {
        $data['keluhanArr'] = $this->keluhan->get_keluhan(); // Mengubah nama model menjadi "keluhan"
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('keluhan_view', $data);
        $this->load->view('layout/footer');
    }

    public function add_keluhan() {
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('add_keluhan');
        $this->load->view('layout/footer');
    }

    public function save_keluhan() {
        $data = $this->input->post();
        $simpan = $this->keluhan->save_keluhan($data); // Mengubah nama model menjadi "keluhan"
        if ($simpan) {
            $this->session->set_flashdata('message', '
                <div class="alert alert-success pastel alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Keluhan berhasil ditambahkan.
                </div>');
        } else {
            $this->session->set_flashdata('message', '
                <div class="alert alert-danger pastel alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Keluhan gagal ditambahkan.
                </div>');
        }
        redirect('keluhan_mhs');
    }

    public function delete_keluhan($id_keluhan) {
        $this->keluhan->delete_keluhan($id_keluhan); // Mengubah nama model menjadi "keluhan"
        redirect('keluhan_mhs');
    }

    public function edit_keluhan($id_keluhan) {
        $data["detail_keluhan"] = $this->keluhan->get_keluhan_by_id($id_keluhan); // Mengubah nama model menjadi "keluhan"
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('edit_keluhan', $data);
        $this->load->view('layout/footer');
    }

    public function update_keluhan($id_keluhan) {
        $data = $this->input->post();
        $update = $this->keluhan->update_keluhan($id_keluhan, $data); // Mengubah nama model menjadi "keluhan"
        if ($update) {
            $this->session->set_flashdata('message', '
                <div class="alert alert-success pastel alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Keluhan berhasil diubah.
                </div>');
        } else {
            $this->session->set_flashdata('message', '
                <div class="alert alert-danger pastel alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Keluhan gagal diubah.
                </div>');
        }
        redirect('keluhan_mhs');
    }
}
