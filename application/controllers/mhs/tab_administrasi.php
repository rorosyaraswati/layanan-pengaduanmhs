<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tab_administrasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('administrasi'); // Mengubah nama model menjadi "administrasi"
        is_loginmhs();
    }

    public function index() {
        
        $data['administrasiArr'] = $this->administrasi->get_administrasi(); // Mengubah nama model menjadi "administrasi"
        $this->load->view('layoutmhs/header');
        $this->load->view('layoutmhs/sidebar');
        $this->load->view('tabel/administrasi_view', $data);
        $this->load->view('layoutmhs/footer');
    }
}