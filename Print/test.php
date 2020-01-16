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

		$sql = "SELECT * FROM tb_siswa WHERE id='2854'";
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
				<td><p class="pContent2">: <?php echo $row["Nama_Lengkap"]; ?></p> <!-- 1 --> </td>
			</tr>
			<tr>
				<td><p class="pContent2">&emsp;2 NISN </p></td>
				<td><p class="noDisplay">xyz</p></td>
				<td><p class="pContent2">: <?php echo $row["NISN"]; ?></p></td>
			</tr>
			<td style="vertical-align: top;text-align: left; width:200px;">
				<p class="pContent2">&emsp;1 Nama Lengkap </p>
				<p class="pContent2">&emsp;2 NISN </p>
				<p class="pContent2">&emsp;3 NIK </p>
				<p class="pContent2">&emsp;4 Asal Sekolah </p>
				<p class="pContent2">&emsp;5 No. Ujian </p>
				<p class="pContent2">&emsp;6 SKHU </p>
				<p class="pContent2">&emsp;7 No. Ijazah </p>
				<p class="pContent2">&emsp;8 Jenis Kelamin </p>
				<p class="pContent2">&emsp;9 Tempat, Tanggal Lahir </p>
				<p class="pContent2">&emsp;10 Agama </p>
				<p class="pContent2">&emsp;11 Suku </p>
				<p class="pContent2">&emsp;12 Status </p>
				<p class="pContent2">&emsp;13 Kondisi </p>
				<p class="pContent2">&emsp;14 Keadaan Orang Tua</p>
				<p class="pContent2">&emsp;15 Status Dalam Keluarga</p>
				<p class="pContent2">&emsp;16 Tinggal Bersama </p>
				<p class="pContent2">&emsp;17 Kewarganegaraan </p>
				<p class="pContent2">&emsp;18 Anak Ke- </p>
				<p class="pContent2">&emsp;19 Bahasa Sehari-hari </p>
				<p class="pContent2">&emsp;20 Alamat </p>
				<p class="pContent2">&emsp;21 Email </p>
			</td>
			<td><p class="noDisplay">xyz</p></td>
			<td style="vertical-align: top;text-align: left;">
				<p class="pContent2">: <?php echo $row["Nama_Lengkap"]; ?></p> <!-- 1 -->
				<p class="pContent2">: <?php echo $row["NISN"]; ?></p> 
				<p class="pContent2">: <?php echo $row["NIK"]; ?></p> 
				<p class="pContent2">: <?php echo $row["Asal_Sekolah"]; ?></p> 
				<p class="pContent2">: <?php echo $row["No_Peserta_UN"]; ?></p> <!-- 5 -->
				<p class="pContent2">: <?php echo $row["No_SKHUN_UN"]; ?></p> 
				<p class="pContent2">: <?php echo $row["No_Ijazah_Tahun"]; ?></p> 
				<p class="pContent2">: <?php echo $row["Jenis_Kelamin"]; ?></p> 
				<p class="pContent2">: <?php echo $row["Tempat_Lahir"]; ?>, <?php echo $row["Tanggal_Lahir"]; ?></p> 
				<p class="pContent2">: <?php echo $row["Agama"]; ?></p> <!-- 10 -->
				<p class="pContent2">:  </p> <!-- Tidak ada -->
				<p class="pContent2">: <?php echo $row["Status_Pondok"]; ?> </p> 
				<p class="pContent2">:  </p> <!-- Tidak ada -->
				<p class="pContent2">: <?php echo $row["Status_anak"]; ?> </p> 
				<p class="pContent2">: <?php echo $row["Status_dalam_keluarga"]; ?> </p> <!-- 15 -->
				<p class="pContent2">: <?php echo $row["Tinggal_dengan"]; ?></p> 
				<p class="pContent2">: <?php echo $row["Warganegara"]; ?></p> 
				<p class="pContent2">: <?php echo $row["Anak_ke"]; ?> dari <?php echo $row["Jumlah_Saudara"]; ?> bersaudara</p> 
				<p class="pContent2">: <?php echo $row["Bahasa"]; ?></p> 
				<p class="pContent2">: <?php echo $row["Alamat_Lengkap"]; ?>, Kab <?php echo $row["Kabupaten"]; ?>, Kec <?php echo $row["Kecamatan"]; ?>, Kel <?php echo $row["Kelurahan"]; ?>, Kode Pos: <?php echo $row["Kode_Pos"]; ?></p> <!-- 20 -->
				<p class="pContent2">: <?php echo $row["e_Mail"]; ?></p>
			</td>
		</table>	
	</div>

	<!-- B. DATA ORANG TUA -->
	<div class="content">
		<p class="noDisplay"></p>
		<p class="pContent4">&nbsp;B. DATA ORANG TUA</p>
		<table>
			<td style="vertical-align: top;text-align: left;">
				<p class="pContent2">&emsp;1 Nama </p>
				<p class="pContent2">&emsp;2 Pendidikan </p>
				<p class="pContent2">&emsp;3 Pekerjaan </p>
				<p class="pContent2">&emsp;4 Penghasilan </p>
				<p class="pContent2">&emsp;5 Email Orang Tua </p>
				<p class="pContent2">&emsp;6 Nama Wali </p>
				<p class="pContent2">&emsp;7 Alamat Orang Tua / Wali </p>
				<p class="pContent2">&emsp;8 Telepon/HP Orang Tua </p>
				<p class="pContent2">&emsp;9 Alamat Penguhubung </p>
				<p class="pContent2">&emsp;&emsp;Orang Tua </p>
				<p class="pContent2">&emsp;10 Alamat Penghubung </p>
				<p class="pContent2">&emsp;&emsp; Penanggung Jawab </p>
			</td>
			<td><p class="noDisplay">&emsp;&emsp;xyz</p></td>
			<td style="vertical-align: top;text-align: left;">
				<p class="pContent2">: Ayah: <?php echo $row["Nama_Ayah"]; ?>, Ibu: <?php echo $row["Nama_Ibu"]; ?></p> <!-- 1 -->
				<p class="pContent2">: Ayah: <?php echo $row["Pendidikan_terakhir_ayah"]; ?>, Ibu: <?php echo $row["Pendidikan_terakhir_ibu"]; ?></p> 
				<p class="pContent2">: Ayah: <?php echo $row["Pekerjaan_Ayah"]; ?>, Ibu: <?php echo $row["Pekerjaan_Ibu"]; ?></p> 
				<p class="pContent2">: Ayah: <?php echo $row["Penghasilan"]; ?>, Ibu : <?php echo $row["Penghasilan_ibu"]; ?></p> 
				<p class="pContent2">: </p> <!-- 5 --> <!-- Tidak ada -->
				<p class="pContent2">: <?php echo $row["Nama_Wali"]; ?></p>
				<p class="pContent2">: <?php echo $row["Alamat_Ayah"]; ?> <?php echo $row["Alamat_Wali"]; ?></p> 
				<p class="pContent2">: Ayah: <?php echo $row["NO_Telp_Ayah"]; ?>, Ibu: <?php echo $row["NO_Telp_Ibu"]; ?></p>
				<p class="pContent2">: <?php echo $row["e_Mail"]; ?></p> <!-- alamt penghubung ortu  blum -->
				<p class="pContent2">: </p> <!-- 10 --> 
				<p class="pContent2">: <?php echo $row["e_Mail"]; ?></p> <!-- alamat penghubung penanggung jawab  blum--> 
				<p class="pContent2">: </p> 
			</td>
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
			<td><p class="noDisplay">&emsp;&emsp;xyz</p></td>
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
		<p style="text-align: right;">Natar, xx xx xx 20xx</p> <!-- tgl masuk kali?  blum -->
		<table align="center">
			<td>
				<p class="pContent2" align="center">Petugas Penerima,</p>
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
				<p class="pContent2">___________________________</p>
				<p class="pContent2" align="center">tanda tangan dan nama jelas</p>
			</td>
			<td><p class="noDisplay">&emsp;&emsp;&emsp;&emsp;xyz</p></td>
			<td>
				<p class="pContent2" align="center">Calon Peserta Didik,</p>
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