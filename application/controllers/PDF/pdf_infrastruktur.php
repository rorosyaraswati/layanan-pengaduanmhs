<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// application/controllers/pdf_infrastruktur.php

class pdf_infrastruktur extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('tcpdf');
        $this->load->model('infrastruktur'); // Load the infrastruktur_model
    }

    public function generatePdf() {
        // Fetch data from the model
        $data['infrastruktur_data'] = $this->infrastruktur->getinfrastrukturData();

        // PDF Generation
        $pdf = new TCPDF('L', 'mm', 'F4', true, 'UTF-8', false);
        $pdf->SetAutoPageBreak(true, 15); // Set margin bottom to 15mm for better spacing
        $pdf->AddPage();
        $pdf->SetFont('times', '', 12);

        // Title
        $pdf->SetFont('times', 'B', 16); // Set the font to bold and increase the size to 16
        $pdf->Cell(0, 10, 'LAPORAN PENGADUAN INFRASTRUKTUR DAN FASILITAS', 0, 1, 'C'); // Center-aligned title
        $pdf->SetFont('times', '', 12); // Set the font back to regular and size 12
        $pdf->Ln(5); // Add some vertical spacing after the title


        // Table Header
        $header = array('NIM', 'Nama', 'Tanggal', 'Kategori', 'Lokasi', 'Deskripsi', 'Lampiran', 'Status');
        $pdf->SetFillColor(230, 230, 230); // Set background color for header
        $pdf->SetTextColor(0); // Set text color for header
        $pdf->SetFont('times', 'B', 12);
        $pdf->Cell(20, 10, $header[0], 1, 0, 'C', 1);
        $pdf->Cell(40, 10, $header[1], 1, 0, 'C', 1);
        $pdf->Cell(25, 10, $header[2], 1, 0, 'C', 1);
        $pdf->Cell(40, 10, $header[3], 1, 0, 'C', 1);
        $pdf->Cell(30, 10, $header[4], 1, 0, 'C', 1);
        $pdf->Cell(90, 10, $header[5], 1, 0, 'C', 1);
        $pdf->Cell(20, 10, $header[7], 1, 1, 'C', 1);
    

        // Table Content
        $pdf->SetFont('times', '', 12);
        foreach ($data['infrastruktur_data'] as $infrastruktur) {
        $pdf->Cell(20, 10, $infrastruktur['nim'], 1, 0, 'C');
        $pdf->Cell(40, 10, $infrastruktur['nama'], 1, 0, 'C');
        $pdf->Cell(25, 10, $infrastruktur['tanggal'], 1, 0, 'C');
        $pdf->Cell(40, 10, $infrastruktur['kategori'], 1, 0, 'C');
        $pdf->Cell(30, 10, $infrastruktur['lokasi'], 1, 0, 'C');
        $pdf->Cell(90, 10, $infrastruktur['deskripsi'], 1, 0, 'C');
        $pdf->Cell(20, 10, $infrastruktur['status'], 1, 1, 'C');
    }

        // Output the PDF for download
        $pdfFileName = 'infrastruktur_data.pdf';
        $pdf->Output($pdfFileName, 'D');
    }
}
