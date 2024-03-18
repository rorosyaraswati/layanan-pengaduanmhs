<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan_kea extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('keamanan'); // Mengubah nama model menjadi "akademik"
    }

    public function index() {
        $data['keamananArr'] = $this->keamanan->get_keamanan(); // Mengubah nama model menjadi "akademik"
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('laporan/lp_keamanan', $data);
        $this->load->view('layout/footer');
    }

}