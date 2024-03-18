<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// application/controllers/pdf_akademik.php

class pdf_akademik extends CI_Controller {

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
        $pdf->SetAutoPageBreak(true, 15); // Set margin bottom to 15mm for better spacing
        $pdf->AddPage();
        $pdf->SetFont('times', '', 12);
    
        // Title
        $pdf->SetFont('times', 'B', 16); // Set the font to bold and increase the size to 16
        $pdf->Cell(0, 10, 'LAPORAN PENGADUAN AKADEMIK', 0, 1, 'C'); // Center-aligned title
        $pdf->SetFont('times', '', 12); // Set the font back to regular and size 12
        $pdf->Ln(5); // Add some vertical spacing after the title
    
        // Table Header
        $header = array('ID', 'Tanggal', 'NIM', 'Nama', 'Program Studi', 'Pilihan Akademik', 'Deskripsi Pengaduan');
        $pdf->SetFillColor(230, 230, 230); // Set background color for header
        $pdf->SetTextColor(0); // Set text color for header
        $pdf->SetFont('times', 'B', 12);
        $pdf->Cell(20, 10, $header[0], 1, 0, 'C', 1);
        $pdf->Cell(25, 10, $header[1], 1, 0, 'C', 1);
        $pdf->Cell(25, 10, $header[2], 1, 0, 'C', 1);
        $pdf->Cell(60, 10, $header[3], 1, 0, 'C', 1);
        $pdf->Cell(40, 10, $header[4], 1, 0, 'C', 1);
        $pdf->Cell(35, 10, $header[5], 1, 0, 'C', 1);
        $pdf->Cell(0, 10, $header[6], 1, 1, 'C', 1);
    
        // Table Content
        $pdf->SetFont('times', '', 12);
        foreach ($data['akademik_data'] as $akademik) {
            $pdf->Cell(20, 10, $akademik['id_akademik'], 1, 0, 'C');
            $pdf->Cell(25, 10, $akademik['tanggal'], 1, 0, 'C');
            $pdf->Cell(25, 10, $akademik['nim'], 1, 0, 'C');
            $pdf->Cell(60, 10, $akademik['nama'], 1, 0, 'L');
            $pdf->Cell(40, 10, $akademik['program_studi'], 1, 0, 'C');
            $pdf->Cell(35, 10, $akademik['pilihan_akademik'], 1, 0, 'C');
            $pdf->MultiCell(0, 10, $akademik['deskripsi_pengaduan'], 1, 'L'); // Use MultiCell for long description
        }
    
        // Output the PDF for download
        $pdfFileName = 'akademik_data.pdf';
        $pdf->Output($pdfFileName, 'D');
    }
    

    
}
