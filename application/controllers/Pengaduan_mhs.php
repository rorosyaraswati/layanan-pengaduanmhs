<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pengaduan_mhs extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('pengaduan'); // Mengubah nama model menjadi "pengaduan"
        
    }

    public function index() {
        $data['pengaduanArr'] = $this->pengaduan->get_pengaduan(); // Mengubah nama model menjadi "pengaduan"
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('pengaduan_view', $data);
        $this->load->view('layout/footer');
    }

    public function add_pengaduan() {
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('add_pengaduan');
        $this->load->view('layout/footer');
    }

    public function save_pengaduan() {
        $data = $this->input->post();
        $simpan = $this->pengaduan->save_pengaduan($data); // Mengubah nama model menjadi "pengaduan"
        if ($simpan) {
            $this->session->set_flashdata('message', '
                <div class="alert alert-success pastel alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    pengaduan berhasil ditambahkan.
                </div>');
        } else {
            $this->session->set_flashdata('message', '
                <div class="alert alert-danger pastel alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    pengaduan gagal ditambahkan.
                </div>');
        }
        redirect('pengaduan_mhs');
    }

    public function delete_pengaduan($id_pengaduan) {
        $this->pengaduan->delete_pengaduan($id_pengaduan); // Mengubah nama model menjadi "pengaduan"
        redirect('pengaduan_mhs');
    }

    public function edit_pengaduan($id_pengaduan) {
        $data["detail_pengaduan"] = $this->pengaduan->get_pengaduan_by_id($id_pengaduan); // Mengubah nama model menjadi "pengaduan"
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('edit_pengaduan', $data);
        $this->load->view('layout/footer');
    }

    public function update_pengaduan($id_pengaduan) {
        $data = $this->input->post();
        $update = $this->pengaduan->update_pengaduan($id_pengaduan, $data); // Mengubah nama model menjadi "pengaduan"
        if ($update) {
            $this->session->set_flashdata('message', '
                <div class="alert alert-success pastel alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    pengaduan berhasil diubah.
                </div>');
        } else {
            $this->session->set_flashdata('message', '
                <div class="alert alert-danger pastel alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    pengaduan gagal diubah.
                </div>');
        }
        redirect('pengaduan_mhs');
    }
}
