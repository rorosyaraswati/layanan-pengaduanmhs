<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tab_keamanan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('keamanan'); // Mengubah nama model menjadi "keamanan"
        is_loginmhs();
    }

    public function index() {
        $data['keamananArr'] = $this->keamanan->get_keamanan(); // Mengubah nama model menjadi "keamanan"
        $this->load->view('layoutmhs/header');
        $this->load->view('layoutmhs/sidebar');
        $this->load->view('tabel/keamanan_view', $data);
        $this->load->view('layoutmhs/footer');
    }
}