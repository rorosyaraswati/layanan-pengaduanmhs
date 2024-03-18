<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('users/admin_mod'); // Mengubah nama model menjadi "administrasi"
        is_login();
    }

    public function index() {
        $data['userArr'] = $this->admin_mod->get_admin(); // Mengubah nama model menjadi "administrasi"
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('m-data/admin', $data);
        $this->load->view('layout/footer');
    }

}