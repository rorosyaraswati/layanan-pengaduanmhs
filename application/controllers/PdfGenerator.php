<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// application/controllers/PdfGenerator.php

class PdfGenerator extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('tcpdf');
        $this->load->model('Akademik_model'); // Load the Akademik_model
    }

    public function generatePdf() {
        // Fetch data from the model
        $data['akademik_data'] = $this->Akademik_model->getAkademikData();

        // PDF Generation
        $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetAutoPageBreak(true, 10);
        $pdf->AddPage();
        $pdf->SetFont('helvetica', '', 12);

        // Loop through the data and add it to the PDF
        foreach ($data['akademik_data'] as $akademik) {
            $pdf->Cell(0, 10, 'ID: ' . $akademik['id_akademik'], 0, 1);
            $pdf->Cell(0, 10, 'Tanggal: ' . $akademik['tanggal'], 0, 1);
            $pdf->Cell(0, 10, 'NIM: ' . $akademik['nim'], 0, 1);
            $pdf->Cell(0, 10, 'Nama: ' . $akademik['nama'], 0, 1);
            $pdf->Cell(0, 10, 'Program Studi: ' . $akademik['program_studi'], 0, 1);
            $pdf->Cell(0, 10, 'Pilihan Akademik: ' . $akademik['pilihan_akademik'], 0, 1);
            $pdf->Cell(0, 10, 'Deskripsi Pengaduan: ' . $akademik['deskripsi_pengaduan'], 0, 1);
            $pdf->Cell(0, 10, '', 'T'); // Add a separator line after each row
        }

        // Output the PDF for download
        $pdfFileName = 'akademik_data.pdf';
        $pdf->Output($pdfFileName, 'D');
    }
}
