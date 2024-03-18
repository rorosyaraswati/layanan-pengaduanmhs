<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan_akd extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Akademik_model'); // Mengubah nama model menjadi "akademik"
    }

    public function index() {
        $data['akademikArr'] = $this->Akademik_model->get_akademik(); // Mengubah nama model menjadi "akademik"
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('laporan/lp_akademik', $data);
        $this->load->view('layout/footer');
    }

}