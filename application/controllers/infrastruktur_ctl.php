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
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('pengaduan/infrastruktur_view', $data);
        $this->load->view('layout/footer');
    }

    public function add_infrastruktur() {
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('add_infrastruktur');
        $this->load->view('layout/footer');
    }

    public function save_infrastruktur() {
        $data = $this->input->post();
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
        redirect('infrastruktur_ctl');
    }

    public function delete_infrastruktur($id_infrastruktur) {
        $this->infrastruktur->delete_infrastruktur($id_infrastruktur); // Mengubah nama model menjadi "infrastruktur"
        redirect('infrastruktur_ctl');
    }

    public function edit_infrastruktur($id_infrastruktur) {
        $data["detail_infrastruktur"] = $this->infrastruktur->get_infrastruktur_by_id($id_infrastruktur); // Mengubah nama model menjadi "infrastruktur"
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('edit_infrastruktur', $data);
        $this->load->view('layout/footer');
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
        redirect('infrastruktur_ctl');
    }
    public function update_status()
    {
        $data = json_decode($this->input->raw_input_stream, true);
        $nim = $data['nim'];
        $status = $data['status'];
    
        // Panggil fungsi model untuk menyimpan data ke database
        $this->infrastruktur->update_status($nim, $status);
    
        // Response jika berhasil (tidak dihandle di frontend, hanya untuk memberikan pesan pada AJAX)
        echo 'success';
    }
}
