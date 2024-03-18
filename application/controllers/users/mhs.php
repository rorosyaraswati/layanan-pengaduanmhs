<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mhs extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('users/mhs_mod'); // Mengubah nama model menjadi "akademik"
        is_login();
    }

    public function index() {
        $data['usermhsArr'] = $this->mhs_mod->get_usermhs(); // Mengubah nama model menjadi "akademik"
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('m-data/mhs', $data);
        $this->load->view('layout/footer');
    }
}