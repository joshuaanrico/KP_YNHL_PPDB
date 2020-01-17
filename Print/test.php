<!DOCTYPE html>
<html>
<head>
	<title>test</title>
	<link rel="stylesheet" type="text/css" href="style.css">
<body>

	<!-- Memanggil Fungsi php untuk database -->
	<?php 
		// Menambahkan file koneksi.php
		include("koneksi.php");

		$sql = "SELECT * FROM tb_siswa WHERE id='1024'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		        
	?>

	<!-- header -->
	<div class="header">
		<table border="0" align="center">
			<td><img src="../images/ypbu.png" width="80" height="80"></td>
			<td><p class="noDisplay">xxxxxxxxxxxx</p></td>
			<td>
				<p class="pHeader1">YAYASAN NURUL HUDA LAMPUNG</p>
				<p class="pHeader2">PONDOK PESANTREN NURUL HUDA</p>
				<p class="pHeader3">PERGURUAN TRI SUKSES (PAUD - TK - SD - SMP - SMA - SMK)</p>
			</td>
		</table>
	<hr class="garis1">
	<p class="pHeader4">Kantor : Komplek Pondok Pesantren Nurul Huda Serbajadi II Pemanggilan Natar Lampung Selatan Telp/Fax. (0721) 780472</p>
	<hr class="garis2">
	</div>

	<!-- content -->
	<!-- FORMULIR PENDAFTARAN PESERTA DIDIK BARU -->
	<div class="content">
		<p class="pContent1">FORMULIR PENDAFTARAN PESERTA DIDIK BARU</p>
		<i class="pContent2">&emsp;&emsp;Bagian ini diisi oleh Petugas Pendaftaran</i>
		<table>
			<td style="vertical-align: top;text-align: left;">
				<p class="pContent2">&emsp;&emsp;No. Registrasi</p> 
				<p class="pContent2">&emsp;&emsp;Nomor Induk</p>
				<p class="pContent2">&emsp;&emsp;Sekolah Didaftar</p>
				<p class="pContent2">&emsp;&emsp;Petugas Penerima</p>
			</td>
			<td><p class="noDisplay">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;xyz</p></td>
			<td style="vertical-align: top;text-align: left;">
				<p class="pContent2">: <?php echo $row["No_Reg"]; ?></p> 
				<p class="pContent2">: <?php echo $row["NIS"]; ?></p>
				<p class="pContent2">: <?php echo $row["Pendidikan"]; ?></p>
				<p class="pContent2">: </p> <!-- Tidak ada -->
			</td>
		</table>
		<p class="noDisplay"></p>
	</div>

	<!-- A. DATA PRIBADI CALON PESERTA DIDIK -->
	<div class="content">
		<p class="pContent3">&nbsp;Mohon data di bawah ini dilengkapi dengan huruf kapital</p>
		<p class="noDisplay"></p>
		<p class="pContent4">&nbsp;A. DATA PRIBADI CALON PESERTA DIDIK</p>
		<table border="0">
			<tr>
				<td><p class="pContent2">&emsp;1 Nama Lengkap </p></td>
				<td><p class="noDisplay">xyz</p></td>
				<td><p class="pContent2">&nbsp;&nbsp;: <?php echo $row["Nama_Lengkap"]; ?></p> <!-- 1 --> </td>
			</tr>
			<tr>
				<td><p class="pContent2">&emsp;2 NISN </p></td>
				<td><p class="noDisplay">xyz</p></td>
				<td><p class="pContent2">&nbsp;&nbsp;: <?php echo $row["NISN"]; ?></p></td>
			</tr>
			<tr>
				<td><p class="pContent2">&emsp;3 NIK </p></td>
				<td><p class="noDisplay">xyz</p></td>
				<td><p class="pContent2">&nbsp;&nbsp;: <?php echo $row["NIK"]; ?></p>  </td>
			</tr>
			<tr>
				<td><p class="pContent2">&emsp;4 Asal Sekolah </p></td>
				<td><p class="noDisplay">xyz</p></td>
				<td><p class="pContent2">&nbsp;&nbsp;: <?php echo $row["Asal_Sekolah"]; ?></p>   </td>
			</tr>
			<tr>
				<td><p class="pContent2">&emsp;5 No. Ujian </p></td>
				<td><p class="noDisplay">xyz</p></td>
				<td><p class="pContent2">&nbsp;&nbsp;: <?php echo $row["No_Peserta_UN"]; ?></p>  </td>
			</tr>
			<tr>
				<td><p class="pContent2">&emsp;6 SKHU </p></td>
				<td><p class="noDisplay">xyz</p></td>
				<td><p class="pContent2">&nbsp;&nbsp;: <?php echo $row["No_SKHUN_UN"]; ?></p>  </td>
			</tr>
			<tr>
				<td><p class="pContent2">&emsp;7 No. Ijazah </p></td>
				<td><p class="noDisplay">xyz</p></td>
				<td><p class="pContent2">&nbsp;&nbsp;: <?php echo $row["No_Ijazah_Tahun"]; ?></p>  </td>
			</tr>
			<tr>
				<td><p class="pContent2">&emsp;8 Jenis Kelamin </p></td>
				<td><p class="noDisplay">xyz</p></td>
				<td><p class="pContent2">&nbsp;&nbsp;: <?php echo $row["Jenis_Kelamin"]; ?></p>  </td>
			</tr>
			<tr>
				<td><p class="pContent2">&emsp;9 Tempat, Tanggal Lahir </p></td>
				<td><p class="noDisplay">xyz</p></td>
				<td><p class="pContent2">&nbsp;&nbsp;: <?php echo $row["Tempat_Lahir"]; ?>, <?php echo $row["Tanggal_Lahir"]; ?></p>  </td>
			</tr>
			<tr>
				<td><p class="pContent2">&emsp;10 Agama </p></td>
				<td><p class="noDisplay">xyz</p></td>
				<td><p class="pContent2">&nbsp;&nbsp;: <?php echo $row["Agama"]; ?></p> <!-- 10 -->  </td>
			</tr>
			<tr>
				<td><p class="pContent2">&emsp;11 Suku </p></td>
				<td><p class="noDisplay">xyz</p></td>
				<td><p class="pContent2">&nbsp;&nbsp;:  </p> <!-- Tidak ada -->  </td>
			</tr>
			<tr>
				<td><p class="pContent2">&emsp;12 Status </p></td>
				<td><p class="noDisplay">xyz</p></td>
				<td><p class="pContent2">&nbsp;&nbsp;: <?php echo $row["Status_Pondok"]; ?> </p> </td>
			</tr>
			<tr>
				<td><p class="pContent2">&emsp;13 Kondisi </p></td>
				<td><p class="noDisplay">xyz</p></td>
				<td><p class="pContent2">&nbsp;&nbsp;:  </p> <!-- Tidak ada -->  </td>
			</tr>
			<tr>
				<td><p class="pContent2">&emsp;14 Keadaan Orang Tua </p></td>
				<td><p class="noDisplay">xyz</p></td>
				<td><p class="pContent2">&nbsp;&nbsp;: <?php echo $row["Status_anak"]; ?> </p> </td>
			</tr>
			<tr>
				<td><p class="pContent2">&emsp;15 Status Dalam Keluarga </p></td>
				<td><p class="noDisplay">xyz</p></td>
				<td><p class="pContent2">&nbsp;&nbsp;:  <?php echo $row["Status_dalam_keluarga"]; ?></p>  </td>
			</tr>
			<tr>
				<td><p class="pContent2">&emsp;16 Tinggal Bersama</p></td>
				<td><p class="noDisplay">xyz</p></td>
				<td><p class="pContent2">&nbsp;&nbsp;: <?php echo $row["Tinggal_dengan"]; ?> </p>   </td>
			</tr>
			<tr>
				<td><p class="pContent2">&emsp;17 Kewarganegaraan</p></td>
				<td><p class="noDisplay">xyz</p></td>
				<td><p class="pContent2">&nbsp;&nbsp;: <?php echo $row["Warganegara"]; ?> </p> </td>
			</tr>
			<tr>
				<td><p class="pContent2">&emsp;18 Anak Ke-</p></td>
				<td><p class="noDisplay">xyz</p></td>
				<td><p class="pContent2">&nbsp;&nbsp;: <?php echo $row["Anak_ke"]; ?> dari <?php echo $row["Jumlah_Saudara"]; ?> bersaudara </p>  </td>
			</tr>
			<tr>
				<td><p class="pContent2">&emsp;19 Bahasa Sehari-hari</p></td>
				<td><p class="noDisplay">xyz</p></td>
				<td><p class="pContent2">&nbsp;&nbsp;: <?php echo $row["Bahasa"]; ?> </p> </td>
			</tr>
			<tr>
				<td><p class="pContent2">&emsp;20 Email </p></td>
				<td><p class="noDisplay">xyz</p></td>
				<td><p class="pContent2">&nbsp;&nbsp;: <?php echo $row["e_Mail"]; ?> </p></td>
			</tr>
		</table>
		<table>
			<tr>
				<td><p class="pContent2">&emsp;21 Alamat</p></td>
				<td><p class="noDisplay">xyz</p></td>
				<td><p class="pContent2">: <?php echo $row["Alamat_Lengkap"]; ?>, Kab <?php echo $row["Kabupaten"]; ?>, Kec <?php echo $row["Kecamatan"]; ?>, Kel <?php echo $row["Kelurahan"]; ?>, Kode Pos: <?php echo $row["Kode_Pos"]; ?></p></td>
			</tr>
		</table>	
	</div>

	<!-- B. DATA ORANG TUA -->
	<div class="content">
		<p class="noDisplay"></p>
		<p class="pContent4">&nbsp;B. DATA ORANG TUA</p>

		<table border="0">
			<tr>
				<td><p class="pContent2">&emsp;1 Nama  </p></td>
				<td><p class="noDisplay">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;xyz</p></td>
				<td><p class="pContent2">: Ayah: <?php echo $row["Nama_Ayah"]; ?> </p></td>
				<td><p class="noDisplay">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;xyz</p></td>
				<td><p class="pContent2"> Ibu: <?php echo $row["Nama_Ibu"]; ?></p></td>
			</tr>
			<tr>
				<td><p class="pContent2">&emsp;2 Pendidikan </p></td>
				<td><p class="noDisplay">&emsp;&emsp;&emsp;&emsp;xyz</p></td>
				<td><p class="pContent2">: Ayah: <?php echo $row["Pendidikan_terakhir_ayah"]; ?> </p></td>
				<td><p class="noDisplay">&emsp;&emsp;&emsp;xyz</p></td>
				<td><p class="pContent2"> Ibu: <?php echo $row["Pendidikan_terakhir_ibu"]; ?></p></td>
			</tr>
			<tr>
				<td><p class="pContent2">&emsp;3 Pekerjaan </p></td>
				<td><p class="noDisplay">&emsp;&emsp;&emsp;&emsp;xyz</p></td>
				<td><p class="pContent2">: Ayah: <?php echo $row["Pekerjaan_Ayah"]; ?> </p></td>
				<td><p class="noDisplay">&emsp;&emsp;&emsp;xyz</p></td>
				<td><p class="pContent2"> Ibu: <?php echo $row["Pekerjaan_Ibu"]; ?></p></td>
			</tr>
			<tr>
				<td><p class="pContent2">&emsp;4 Penghasilan  </p></td>
				<td><p class="noDisplay">&emsp;&emsp;&emsp;&emsp;xyz</p></td>
				<td><p class="pContent2">: Ayah: <?php echo $row["Penghasilan"]; ?> </p></td>
				<td><p class="noDisplay">&emsp;&emsp;&emsp;xyz</p></td>
				<td><p class="pContent2"> Ibu: <?php echo $row["Penghasilan_ibu"]; ?></p></td>
			</tr>
		</table>
		<table border="0">
			<td style="vertical-align: top;text-align: left;">
				<p class="pContent2">&emsp;5 Email Orang Tua </p>
				<p class="pContent2">&emsp;6 Nama Wali </p>
				<p class="pContent2">&emsp;7 Alamat Orang Tua / Wali </p>
				<p class="pContent2">&emsp;8 Telepon/HP Orang Tua </p>
			</td>
			<td><p class="noDisplay">&emsp;&emsp;xyz</p></td>
			<td style="vertical-align: top;text-align: left;">
				<p class="pContent2">: </p> <!-- 5 --> <!-- Tidak ada -->
				<p class="pContent2">: <?php echo $row["Nama_Wali"]; ?></p>
				<p class="pContent2">: <?php echo $row["Alamat_Ayah"]; ?> <?php echo $row["Alamat_Wali"]; ?></p> 
				<p class="pContent2">: <?php echo $row["NO_Telp_Ayah"]; ?> , <?php echo $row["NO_Telp_Ibu"]; ?></p>
			</td>
		</table>
		<table border="0">
			<tr>
				<td><p class="pContent2">&emsp;9 Alamat Penghubung </p></td>
				<td><p class="noDisplay">&emsp;&emsp;&emsp;&emsp;xyz</p></td>
				<td><p class="pContent2">&nbsp;&nbsp;: Kelompok: <?php echo $row["Kelompok"]; ?> </p></td>
				<td><p class="noDisplay">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;xyz</p></td>
				<td><p class="pContent2"> Desa: <?php echo $row["Desa"]; ?></p></td>
			</tr>
			<tr>
				<td><p class="pContent2">&emsp;&emsp;Orang Tua </p></td>
				<td><p class="noDisplay">&emsp;&emsp;&emsp;&emsp;xyz</p></td>
				<td><p class="pContent2">&nbsp;&nbsp;: Daerah: <?php echo $row["Daerah"]; ?> </p></td>
			</tr>
			<tr>
				<td><p class="pContent2">&emsp;10 Alamat Penghubung </p></td>
				<td><p class="noDisplay">&emsp;&emsp;&emsp;&emsp;xyz</p></td>
				<td><p class="pContent2">&nbsp;&nbsp;: Kelompok: <?php echo $row["Kelompok"]; ?> </p></td>
				<td><p class="noDisplay">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;xyz</p></td>
				<td><p class="pContent2"> Desa: <?php echo $row["Desa"]; ?></p></td>
			</tr>
			<tr>
				<td><p class="pContent2">&emsp;&emsp;Penanggung Jawab </p></td>
				<td><p class="noDisplay">&emsp;&emsp;&emsp;&emsp;xyz</p></td>
				<td><p class="pContent2">&nbsp;&nbsp;: Daerah: <?php echo $row["Daerah"]; ?> </p></td>
			</tr>
		</table>	
	</div>

	<!-- C. RIWAYAT KESEHATAN CALON PESERTA DIDIK -->
	<div class="content">
		<p class="pContent4">&nbsp;C. RIWAYAT KESEHATAN CALON PESERTA DIDIK</p>
		<table>
			<td>
				<p class="pContent2">&emsp;1 Golongan darah </p>
				<p class="pContent2">&emsp;2 Berat dan Tinggi Badan </p>
				<p class="pContent2">&emsp;3 Riwayat Penyakit </p>
			</td>
			<td><p class="noDisplay">&emsp;&emsp;&emsp;xyz</p></td>
			<td>
				<p class="pContent2">: <?php echo $row["Golongan_Darah"]; ?></p> <!-- 1 -->
				<p class="pContent2">: Berat Badan: <?php echo $row["Berat_Badan"]; ?> kg, Tinggi Badan: <?php echo $row["Tinggi_Badan"]; ?> cm</p> 
				<p class="pContent2">: <?php echo $row["Penyakit_diderita"]; ?></p> 
			</td>
		</table>	
	</div>

	<!-- footer -->
	<!-- Tanda tangan -->	
	<div class="footer">
		<p style="text-align: right;">Natar, <?php echo $row["Tanggal_Masuk"]; ?></p> <!-- maybe -->
		<table align="center">
			<td>
				<p class="pContent2" align="center">Petugas Penerima,</p>
				<p class="noDisplay">xyz</p>
				<p class="noDisplay">xyz</p>
				<p class="noDisplay">xyz</p>
				<p class="pContent2">___________________________</p>
				<p class="pContent2" align="center">tanda tangan dan nama jelas</p>
			</td>
			<td><p class="noDisplay">&emsp;&emsp;&emsp;&emsp;xyz</p></td>
			<td>
				<p class="pContent2" align="center">Orang Tua/Wali,</p>
				<p class="noDisplay">xyz</p>
				<p class="noDisplay">xyz</p>
				<p class="noDisplay">xyz</p>
				<p class="pContent2">___________________________</p>
				<p class="pContent2" align="center">tanda tangan dan nama jelas</p>
			</td>
			<td><p class="noDisplay">&emsp;&emsp;&emsp;&emsp;xyz</p></td>
			<td>
				<p class="pContent2" align="center">Calon Peserta Didik,</p>
				<p class="noDisplay">xyz</p>
				<p class="noDisplay">xyz</p>
				<p class="noDisplay">xyz</p>
				<p class="pContent2">___________________________</p>
				<p class="pContent2" align="center">tanda tangan dan nama jelas</p>
			</td>
		</table>
	</div>

	<?php
		    }
		} else {
		    echo "0 results";
		}
		$conn->close();
	 ?>
	
</body>
</html>