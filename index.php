<?php
require "fpdf.php";

class myPDF extends FPDF{
    function header(){
        $this->Image('logo.png', 10,6);
        $this->SetFont('Arial', 'B', 22);
        $this->Cell(276, 5,'YAYASAN NURUL HUDA LAMPUNG', 0, 0, 'c');
        $this->SetFont('Arial', 'B', 16);
        $this->Cell(276, 5,'PONDOK PESANTREN NURUL HUDA', 0, 0, 'c');
        $this->SetFont('Arial', 'B', 16);
        $this->Cell(276, 5,'PERGURUAN TRI SUKSES (PAUD - TK - SD - SMP - SMA - SMK)', 0, 0, 'c');
        $this->Ln();
        $this->SetLineWidth(2);
        $this->SetLineWidth(0.5);
        $this->SetFont('Arial', '', 11);
        $this->Cell(276, 0,'Kantor :Komplek Pondok Pesantren Nurul Huda Serbajadi II Pemangggilan Natar Lampung Selatan. Telp/Fax: (0721) 780472', 0, 0, 'c');
        
        
    }

}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L', 'F4', 0);
$pdf->Output();