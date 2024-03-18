<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// application/controllers/pdf_keamanan.php

class pdf_keamanan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('tcpdf');
        $this->load->model('keamanan'); // Load the keamanan_model
    }

    public function generatePdf() {
        // Fetch data from the model
        $data['keamanan_data'] = $this->keamanan->getkeamananData();

        // PDF Generation
        $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetAutoPageBreak(true, 10);
        $pdf->AddPage();
        $pdf->SetFont('helvetica', '', 12);

        // Title
        $pdf->SetFont('times', 'B', 16); // Set the font to bold and increase the size to 16
        $pdf->Cell(0, 10, 'LAPORAN PENGADUAN KEAMANAN', 0, 1, 'C'); // Center-aligned title
        $pdf->SetFont('times', '', 12); // Set the font back to regular and size 12
        $pdf->Ln(5); // Add some vertical spacing after the title


        // Table Header
        $header = array('NIM', 'Nama', 'Kontak', 'Tanggal', 'Lokasi', 'Deskripsi', 'Lampiran', 'Status');
        $pdf->SetFillColor(230, 230, 230); // Set background color for header
        $pdf->SetTextColor(0); // Set text color for header
        $pdf->SetFont('times', 'B', 12);
        $pdf->Cell(20, 10, $header[0], 1, 0, 'C', 1);
        $pdf->Cell(40, 10, $header[1], 1, 0, 'C', 1);
        $pdf->Cell(30, 10, $header[2], 1, 0, 'C', 1);
        $pdf->Cell(30, 10, $header[3], 1, 0, 'C', 1);
        $pdf->Cell(30, 10, $header[4], 1, 0, 'C', 1);
        $pdf->Cell(90, 10, $header[5], 1, 0, 'C', 1);
        $pdf->Cell(20, 10, $header[7], 1, 1, 'C', 1);

        // Loop through the data and add it to the PDF
        // Table Content
        $pdf->SetFont('times', '', 12);
        foreach ($data['keamanan_data'] as $keamanan) {
        $pdf->Cell(20, 10, $keamanan['nim'], 1, 0, 'C');
        $pdf->Cell(40, 10, $keamanan['nama'], 1, 0, 'C');
        $pdf->Cell(30, 10, $keamanan['kontak'], 1, 0, 'C');
        $pdf->Cell(30, 10, $keamanan['tanggal'], 1, 0, 'L');
        $pdf->Cell(30, 10, $keamanan['lokasi'], 1, 0, 'L');
        $pdf->Cell(90, 10, $keamanan['deskripsi'], 1, 0, 'L');
        $pdf->Cell(20, 10, $keamanan['status'], 1, 1, 'C');
    }


        // Output the PDF for download
        $pdfFileName = 'keamanan_data.pdf';
        $pdf->Output($pdfFileName, 'D');
    }
}
