<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class infrastruktur_ctl extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('infrastruktur'); // Mengubah nama model menjadi "infrastruktur"
        is_loginmhs();
    }

    public function index() {
        $data['infrastrukturArr'] = $this->infrastruktur->get_infrastruktur(); // Mengubah nama model menjadi "infrastruktur"
        $this->load->view('layoutmhs/header');
        $this->load->view('layoutmhs/sidebar');
        $this->load->view('form/infrastruktur', $data);
        $this->load->view('layoutmhs/footer');
    }

    public function add_infrastruktur() {
        $this->load->view('layoutmhs/header');
        $this->load->view('layoutmhs/sidebar');
        $this->load->view('add_infrastruktur');
        $this->load->view('layoutmhs/footer');
    }

    public function save_infrastruktur() {
        $data = $this->input->post();
        $data['status'] = 'terkirim';
        $simpan = $this->infrastruktur->save_infrastruktur($data); // Mengubah nama model menjadi "infrastruktur"
        if ($simpan) {
            $this->session->set_flashdata('message', '
                <div class="alert alert-success pastel alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    infrastruktur berhasil ditambahkan.
                </div>');
        } else {
            $this->session->set_flashdata('message', '
                <div class="alert alert-danger pastel alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    infrastruktur gagal ditambahkan.
                </div>');
        }
        redirect('mhs/infrastruktur_ctl');
    }

    public function delete_infrastruktur($id_infrastruktur) {
        $this->infrastruktur->delete_infrastruktur($id_infrastruktur); // Mengubah nama model menjadi "infrastruktur"
        redirect('mhs/infrastruktur_ctl');
    }

    public function edit_infrastruktur($id_infrastruktur) {
        $data["detail_infrastruktur"] = $this->infrastruktur->get_infrastruktur_by_id($id_infrastruktur); // Mengubah nama model menjadi "infrastruktur"
        $this->load->view('layoutmhs/header');
        $this->load->view('layoutmhs/sidebar');
        $this->load->view('edit_infrastruktur', $data);
        $this->load->view('layoutmhs/footer');
    }

    public function update_infrastruktur($id_infrastruktur) {
        $data = $this->input->post();
        $update = $this->infrastruktur->update_infrastruktur($id_infrastruktur, $data); // Mengubah nama model menjadi "infrastruktur"
        if ($update) {
            $this->session->set_flashdata('message', '
                <div class="alert alert-success pastel alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    infrastruktur berhasil diubah.
                </div>');
        } else {
            $this->session->set_flashdata('message', '
                <div class="alert alert-danger pastel alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    infrastruktur gagal diubah.
                </div>');
        }
        redirect('mhs/infrastruktur_ctl');
    }
}
