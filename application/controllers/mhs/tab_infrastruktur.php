<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tab_infrastruktur extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('infrastruktur'); // Mengubah nama model menjadi "infrastruktur"
        is_loginmhs();
    }

    public function index() {
        $data['infrastrukturArr'] = $this->infrastruktur->get_infrastruktur(); // Mengubah nama model menjadi "infrastruktur"
        $this->load->view('layoutmhs/header');
        $this->load->view('layoutmhs/sidebar');
        $this->load->view('tabel/infrastruktur_view', $data);
        $this->load->view('layoutmhs/footer');
    }
}