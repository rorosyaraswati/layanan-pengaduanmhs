<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class akademik_ctl extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Akademik_model'); // Mengubah nama model menjadi "akademik"
        is_loginmhs();
    }

    public function index() {
        $data['akademikArr'] = $this->Akademik_model->get_akademik(); // Mengubah nama model menjadi "akademik"
        $this->load->view('layoutmhs/header');
        $this->load->view('layoutmhs/sidebar');
        $this->load->view('form/akademik', $data);
        $this->load->view('layoutmhs/footer');
    }

    public function add_akademik() {
        $this->load->view('layoutmhs/header');
        $this->load->view('layoutmhs/sidebar');
        $this->load->view('add_akademik');
        $this->load->view('layoutmhs/footer');
    }

    public function save_akademik() {
        $data = $this->input->post();
        $data['status'] = 'terkirim';
        $simpan = $this->Akademik_model->save_akademik($data); // Mengubah nama model menjadi "akademik"
        if ($simpan) {
            $this->session->set_flashdata('message', '
                <div class="alert alert-success pastel alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    akademik berhasil ditambahkan.
                </div>');
        } else {
            $this->session->set_flashdata('message', '
                <div class="alert alert-danger pastel alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    akademik gagal ditambahkan.
                </div>');
        }
        redirect('mhs/akademik_ctl');
    }

    public function delete_akademik($id_akademik) {
        $this->Akademik_model->delete_akademik($id_akademik); // Mengubah nama model menjadi "akademik"
        redirect('mhs/akademik_ctl');
    }

    public function edit_akademik($id_akademik) {
        $data["detail_akademik"] = $this->Akademik_model->get_akademik_by_id($id_akademik); // Mengubah nama model menjadi "akademik"
        $this->load->view('layoutmhs/header');
        $this->load->view('layoutmhs/sidebar');
        $this->load->view('edit_akademik', $data);
        $this->load->view('layoutmhs/footer');
    }

    public function update_akademik($id_akademik) {
        $data = $this->input->post();
        $update = $this->Akademik_model->update_akademik($id_akademik, $data); // Mengubah nama model menjadi "akademik"
        if ($update) {
            $this->session->set_flashdata('message', '
                <div class="alert alert-success pastel alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    akademik berhasil diubah.
                </div>');
        } else {
            $this->session->set_flashdata('message', '
                <div class="alert alert-danger pastel alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    akademik gagal diubah.
                </div>');
        }
        redirect('mhs/akademik_ctl');
    }

    public function generatePDF() {
        // Load library PDF
        require_once APPPATH . 'third_party/tcpdf/tcpdf.php'; // Ubah lokasi sesuai dengan konfigurasi Anda
    
        // Buat objek TCPDF baru
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    
        // Set dokumen informasi dan header
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle('Akademik Model');
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'Akademik Model', 'Model Data', array(0,64,255), array(0,64,128));
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    
        // Tambahkan halaman baru
        $pdf->AddPage();
    
        // Isi konten PDF dengan isi file model akademik.php
        ob_start();
        include(APPPATH . 'models/Akademik_model.php'); // Ubah lokasi sesuai dengan struktur direktori Anda
        $content = ob_get_clean();
        $pdf->writeHTML($content, true, false, true, false, '');
    
        // Outputkan file PDF
        $pdf->Output('akademik_model.pdf', 'D');
    }
    
}
