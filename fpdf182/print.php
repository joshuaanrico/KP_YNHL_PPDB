<?php

$servername    = "localhost";
$username    = "root";
$password    = "";
$dbname        = "db_dashboard";

$conn    = mysqli_connect ($servername, $username, $password, $dbname);
if (!$conn){
    die ("Connection Failed: ". mysqli_connect_error());
    }

// Koneksi library FPDF
require('fpdf.php');
// Setting halaman PDF
$pdf = new FPDF('l','mm','F4');
// Menambah halaman baru
$pdf->AddPage();
// Setting jenis font
$pdf->SetFont('Arial','B',20);
// Membuat string
$pdf->Cell(190,7,'Yayasan Nurul Huda Lampung',0,1,'C');
$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,7,'PONDOK PESANTREN NURUL HUDA',0,1,'C');
$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,7,'PERGURUAN TRI SUKSES (PAUD-TK-SD-SMP-SMA-SMK) ',0,1,'C');
// Setting garis kop surat 
$pdf->Line(1,3.1,20.5,3.1);            
$pdf->SetLineWidth(0.1);             
$pdf->Line(1,3.2,20.5,3.2);                         
$pdf->SetLineWidth(0);             
$pdf->Ln();
// Setting spasi kebawah supaya tidak rapat
$pdf->Cell(10,7,'',0,1);



$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,6,'NO',1,0);
$pdf->Cell(50,6,'NAMA MOTOR',1,0);
$pdf->Cell(35,6,'WARNA',1,0);
$pdf->Cell(30,6,'BRAND',1,0);
$pdf->Cell(25,6,'HARGA',1,0);
$pdf->Cell(25,6,'CICILAN',1,1);
 
$pdf->SetFont('Arial','',10);
$query = mysqli_query($conn, "SELECT * FROM rsh_dealer");
while ($row = mysqli_fetch_array($query)){
    $pdf->Cell(10,6,$row['id'],1,0);
    $pdf->Cell(50,6,$row['NamaMotor'],1,0);
    $pdf->Cell(35,6,$row['Warna'],1,0);
    $pdf->Cell(30,6,$row['Brand'],1,0);
    $pdf->Cell(25,6,$row['Harga'],1,0);
    $pdf->Cell(25,6,$row['Cicilan'],1,1);
}

$pdf->Output();
?>