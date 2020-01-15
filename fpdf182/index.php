<?php
require "fpdf.php";

class myPDF extends FPDF{
    function header(){
        $this->Image('ypbu.png', 5,2);
        $this->SetFont('Times', 'B', 22);
        $this->Cell(45);
        $this->Cell(30, 10,'YAYASAN NURUL HUDA LAMPUNG', 0, 0, 'c');
        $this->Ln(6);
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(70);
        $this->Cell(30, 9,'PONDOK PESANTREN NURUL HUDA', 0, 0, 'c');
        $this->Ln(4);
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(40);
        $this->Cell(30, 10,'PERGURUAN TRI SUKSES (PAUD - TK - SD - SMP - SMA - SMK)', 0, 0, 'c');
        $this->Ln();
        $this->SetFont('Arial', '', 10);
        $this->Cell(20, 30,'Kantor : Komplek Pondok Pesantren Nurul Huda Serbajadi II Pemangggilan Natar Lampung Selatan. Telp/Fax: (0721) 780472', 0, 0, 'c');
        
    }

    function Footer()
    {
        $this->SetFont('Arial', '', 11);
        $this->Cell(0, 310, 'Petugas Penerima', 0, 0, 'l');
    
    }

}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P', 'A4', 0);
ob_end_clean();
$pdf->Output();