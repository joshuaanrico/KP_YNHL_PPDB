<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WEB PONPES [Cetak Data Siswa]</title>
</head>
<body>
<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
include_once 'config/jq-config.php';
 // include the jqGrid Class
include_once "php/jqGrid.php";
// include the driver class
include_once "php/jqGridPdo.php"; 
// Connection to the server
$conn = new PDO(DB_DSN,DB_USER,DB_PASSWORD);

//echo $_GET["NoP"];
//include '../code/getheaderyys.php';

$sqlLap = "
SELECT A.id,A.nis,A.id_card,A.nisn, A.nama_lengkap,A.nama_panggilan, 
A.tempat_lahir, A.tanggal_lahir   as tanggal_lahir, A.jenis_kelamin,A.status_diri ,
A.anak_ke, A.jumlah_saudara,A.tinggal_bersama,
A.status ,  A.warganegara,A.kewarganegaraan,
A.alamat_lengkap,A.telp,A.No_HP_Ayah hp,
A.kelompok,A.desa,A.daerah,
A.STATUS,A.penanggung_jawab,
A.kelompok,
A.no_tlp_penanggung_jawab,NO_HP_Penanggung_Jawab,
DATE_FORMAT(A.tanggal_masuk,'%d-%m-%Y') as tanggal_masuk,
A.Nama_Ayah,A.Alamat_Ayah,A.NO_HP_Ayah,
A.Nama_Ibu,A.Alamat_Ibu,A.NO_HP_Ibu ,A.keterangan
,B.golongan_darah
,B.riwayat_penyakit
,B.kelainan_jasmani
,B.tinggi_badan
,B.berat_badan
,B.alergi
,C.kelompok kelmpok_pondok
FROM 
tb_siswa A
    LEFT JOIN tbs_kesehatan_siswa B 
        ON (A.nis = B.nis)
	LEFT JOIN tbs_kelompok C
        ON (A.kelompok_pondok = C.id)	
where A.id = '".$_GET["NoP"]."'";
//echo $sqlLap;


$rResult = mysql_query($sqlLap);
  
while ($tRow = mysql_fetch_array( $rResult )) 
		{
		?>
<!---table heading--->
<center><b>FORMULIR PENDAFTARAN PESERTA DIDIK BARU</b></center>
<table width="718" height="681" cellpadding="0" cellspacing="0" border="0"  ><tr style="font-size:12px"  ><td width="137" rowspan="8" ><table width="718" height="681" cellpadding="0" cellspacing="0" border="1"  >
  <tr>
    <td style="font-size:13px" height="10" colspan="5"><b>&nbsp;A. DATA SANTRI</a></td>
  </tr>
  <tr style="font-size:12px"  >
    <td width="22" align="center" height="10">1. </td>
    <td colspan="2">&nbsp;No. ID Card</td>

    <td width="349">&nbsp;
        <?=$tRow["id_card"]?></td>
  </tr>
  <tr style="font-size:12px">
    <td  align="center" height="10">2. </td>
    <td colspan="2">&nbsp;Nama Lengkap</td>
    <td>&nbsp;
        <b><?=$tRow["nama_lengkap"]?></b></td>
  </tr>
  <tr style="font-size:12px">
    <td align="center"  height="10">3. </td>
    <td colspan="2">&nbsp;NISN</td>
    <td>&nbsp;
        <?=$tRow["nisn"]?></td>
  </tr>
  <tr style="font-size:12px">
    <td  align="center" height="10">4. </td>
    <td colspan="2">&nbsp;Tempat/Tanggal Lahir</td>
    <td>&nbsp;
        <?=$tRow["tempat_lahir"]?>, <?=$tRow["tanggal_lahir"]?></td>
  </tr>
  <tr style="font-size:12px">
    <td  align="center" height="10">6. </td>
    <td colspan="2">&nbsp;Jenis Kelamin</td>
    <?php if ($tRow["jenis_kelamin"] =="L" )$jk="Laki-laki"; else $jk="Perempuan";?>
    <td>&nbsp;<?php echo $jk?></td>
  </tr>

  <tr style="font-size:12px">
    <td  align="center" height="10">7.</td>
    <td colspan="2" >&nbsp;Alamat Lengkap</td>
    <td valign="top" colspan="2" align="justify">
        <?=$tRow["alamat_lengkap"]?></td>
  </tr>
  <tr style="font-size:12px">
    <td width="22"  align="center" height="10">8. </td>
    <td colspan="4">&nbsp;Alamat Pengajian Asal </td>
  </tr>
  <tr style="font-size:12px">
    <td  height="10">&nbsp;</td>
    <td width="34"><div align="center">a.</div></td>
    <td width="143">&nbsp;Kelompok</td>
    <td colspan="2">&nbsp;
        <?=$tRow["kelompok"]?></td>
  </tr>
  <tr style="font-size:12px">
    <td  height="10">&nbsp;</td>
    <td><div align="center">b.</div></td>
    <td>&nbsp;Desa</td>
    <td colspan="2">&nbsp;
        <?=$tRow["desa"]?></td>
  </tr>
  <tr style="font-size:12px">
    <td  height="10">&nbsp;</td>
    <td><div align="center">c.</div></td>
    <td>&nbsp;Daerah</td>
    <td colspan="2">&nbsp;
        <?=$tRow["daerah"]?></td>
  </tr>
  
  <tr>
		<td height="23" colspan="4" height="10"></td>
  </tr>
  <tr style="font-size:13px">
    <td style="font-size:13px" height="10" colspan="5" height="10"><b>&nbsp;B. DATA ORANG TUA & PENANGGUNG JAWAB</b></td>
  </tr>
  <tr style="font-size:12px">
    <td align="center" height="10">1. </td>
    <td colspan="2">&nbsp;Nama Ayah</td>
    <td colspan="2">&nbsp;
        <?=$tRow["Nama_Ayah"]?></td>
  </tr>

  <tr style="font-size:12px">
    <td  align="center" height="10">2. </td>
    <td colspan="2">&nbsp;No HP Ayah</td>
    <td colspan="2">&nbsp;
        <?=$tRow["NO_HP_Ayah"]?></td>
  </tr>
  <tr style="font-size:12px">
    <td  align="center" height="10">3. </td>
    <td colspan="2">&nbsp;Nama Ibu</td>
    <td colspan="2">&nbsp;
        <?=$tRow["Nama_Ibu"]?></td>
  </tr>

  <tr style="font-size:12px">
    <td align="center" height="10">4. </td>
    <td colspan="2">&nbsp;No HP Ibu</td>
    <td colspan="2">&nbsp;
        <?=$tRow["NO_HP_Ibu"]?></td>
  </tr>
  <tr style="font-size:12px">
    <td align="center" height="10">5. </td>
    <td colspan="2">&nbsp;Penanggung Jawab</td>
    <td colspan="2">&nbsp;
        <?=$tRow["penanggung_jawab"]?></td>
  </tr>
  <tr style="font-size:12px">
    <td align="center" height="10">6. </td>
    <td colspan="2">&nbsp;No HP Penanggung Jawab</td>
    <td colspan="2">&nbsp;
        <?=$tRow["NO_HP_Penanggung_Jawab"]?></td>
  </tr>
</table></td>
  </tr>
</table>

<?php
		}
		?>
		
<script language="javascript">
		window.print();
</script>
</body>

</html>	

