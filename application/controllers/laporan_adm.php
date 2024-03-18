<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan_adm extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('administrasi'); // Mengubah nama model menjadi "akademik"
    }

    public function index() {
        $data['administrasiArr'] = $this->administrasi->get_administrasi(); // Mengubah nama model menjadi "akademik"
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('laporan/lp_administrasi', $data);
        $this->load->view('layout/footer');
    }

}