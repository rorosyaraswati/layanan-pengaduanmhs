<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tab_akademik extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Akademik_model'); // Mengubah nama model menjadi "akademik"
        is_loginmhs();
    }

    public function index() {
        $data['akademikArr'] = $this->Akademik_model->get_akademik(); // Mengubah nama model menjadi "akademik"
        $this->load->view('layoutmhs/header');
        $this->load->view('layoutmhs/sidebar');
        $this->load->view('tabel/akademik_view', $data);
        $this->load->view('layoutmhs/footer');
    }
}