<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan_inf extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('infrastruktur'); // Mengubah nama model menjadi "akademik"
    }

    public function index() {
        $data['infrastrukturArr'] = $this->infrastruktur->get_infrastruktur(); // Mengubah nama model menjadi "akademik"
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('laporan/lp_infrastruktur', $data);
        $this->load->view('layout/footer');
    }

}