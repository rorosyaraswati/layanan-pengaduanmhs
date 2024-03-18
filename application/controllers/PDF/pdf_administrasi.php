<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// application/controllers/pdf_administrasi.php

class pdf_administrasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('tcpdf');
        $this->load->model('administrasi'); // Load the administrasi_model
    }

    public function generatePdf() {
        // Fetch data from the model
        $data['administrasi_data'] = $this->administrasi->getadministrasiData();

        // PDF Generation
        $pdf = new TCPDF('L', 'mm', 'F4', true, 'UTF-8', false);
        $pdf->SetAutoPageBreak(true, 15); // Set margin bottom to 15mm for better spacing
        $pdf->AddPage();
        $pdf->SetFont('times', '', 12);

        // Title
        $pdf->SetFont('times', 'B', 16); // Set the font to bold and increase the size to 16
        $pdf->Cell(0, 10, 'LAPORAN PENGADUAN ADMINISTRASI', 0, 1, 'C'); // Center-aligned title
        $pdf->SetFont('times', '', 12); // Set the font back to regular and size 12
        $pdf->Ln(5); // Add some vertical spacing after the title

        
        // Table Header
        $header = array('No Ref', 'Tanggal', 'NIM', 'Nama', 'Program Studi', 'Jenis Biaya', 'Deskripsi', 'Lampiran', 'Status');
        $pdf->SetFillColor(230, 230, 230); // Set background color for header
        $pdf->SetTextColor(0); // Set text color for header
        $pdf->SetFont('times', 'B', 12);
        $pdf->Cell(20, 10, $header[0], 1, 0, 'C', 1);
        $pdf->Cell(25, 10, $header[1], 1, 0, 'C', 1);
        $pdf->Cell(25, 10, $header[2], 1, 0, 'C', 1);
        $pdf->Cell(40, 10, $header[3], 1, 0, 'C', 1);
        $pdf->Cell(30, 10, $header[4], 1, 0, 'C', 1);
        $pdf->Cell(25, 10, $header[5], 1, 0, 'C', 1);
        $pdf->Cell(90, 10, $header[6], 1, 0, 'C', 1);
        $pdf->Cell(30, 10, $header[7], 1, 0, 'C', 1);
        $pdf->Cell(20, 10, $header[8], 1, 1, 'C', 1);
    

        // Table Content
        $pdf->SetFont('times', '', 12);
        foreach ($data['administrasi_data'] as $administrasi) {
        $pdf->Cell(20, 10, $administrasi['no_ref'], 1, 0, 'C');
        $pdf->Cell(25, 10, $administrasi['tanggal'], 1, 0, 'C');
        $pdf->Cell(25, 10, $administrasi['nim'], 1, 0, 'C');
        $pdf->Cell(40, 10, $administrasi['nama'], 1, 0, 'L');
        $pdf->Cell(30, 10, $administrasi['program_studi'], 1, 0, 'L');
        $pdf->Cell(25, 10, $administrasi['jenis_biaya'], 1, 0, 'L');
        $pdf->Cell(90, 10, $administrasi['deskripsi'], 1, 0, 'L');
        $pdf->Cell(30, 10, $administrasi['lampiran'], 1, 0, 'C');
        $pdf->Cell(20, 10, $administrasi['status'], 1, 1, 'C');
    }

        // Output the PDF for download
        $pdfFileName = 'administrasi_data.pdf';
        $pdf->Output($pdfFileName, 'D');
    }
}
