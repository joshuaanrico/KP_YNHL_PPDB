<!DOCTYPE html>
<html>
<head>
	<title>Tabel Daftar Siswa</title>
</head>
<body>
	<?php
	// Keterangan Database dan Server
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "test"; //nama database

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	?>

	<h2>Pemilihan Tingkatan</h2>
	<form method="post" action="#">
		<select name="dropdown">
			<option value="sd">SD</option>
			<option value="smp">SMP</option>
			<option value="sma">SMA</option>
			<option value="smk">SMK</option>
		</select>
		<input type="submit" value="submit">
	</form>
	<br><br>

	<?php
		switch ($_POST['dropdown'])  { 

		case "sd":
		 	if (mysqli_connect_errno()){
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

			$result = mysqli_query($conn,"SELECT * FROM tb_siswa where tingkat = '1'"); // tingkat 1 adalah SD

			echo "<table border='1'>
			<tr>
			<th>No</th>
			<th>ID Card</th>
			<th>Status Mukmin</th>
			<th>Tingkat</th>
			<th>NISN</th>
			<th>Nama Lengkap</th>
			<th>TTL</th>
			<th>Alamat</th>
			<th>Nama Ayah</th>
			<th>Nama Ibu</th>
			<th>No. Tlp</th>
			</tr>";

			while($row = mysqli_fetch_array($result)){
				echo "<tr>";
				echo "<td>" . $row['nomor'] . "</td>";
				echo "<td>" . $row['id_card'] . "</td>";
				echo "<td>" . $row['status_mukmin'] . "</td>";
				echo "<td> SD </td>";
				echo "<td>" . $row['nisn'] . "</td>";
				echo "<td>" . $row['nama_lengkap'] . "</td>";
				echo "<td>" . $row['ttl'] . "</td>";
				echo "<td>" . $row['alamat'] . "</td>";
				echo "<td>" . $row['nama_ayah'] . "</td>";
				echo "<td>" . $row['nama_ibu'] . "</td>";
				echo "<td>" . $row['no_hp_pengjawab'] . "</td>";
				echo "</tr>";
			}
			echo "</table>";

			mysqli_close($conn);
		break;

		case "smp":
		 	if (mysqli_connect_errno()){
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

			$result = mysqli_query($conn,"SELECT * FROM tb_siswa where tingkat = '2'"); // tingkat 1 adalah SMP

			echo "<table border='1'>
			<tr>
			<th>No</th>
			<th>ID Card</th>
			<th>Status Mukmin</th>
			<th>Tingkat</th>
			<th>NISN</th>
			<th>Nama Lengkap</th>
			<th>TTL</th>
			<th>Alamat</th>
			<th>Nama Ayah</th>
			<th>Nama Ibu</th>
			<th>No. Tlp</th>
			</tr>";

			while($row = mysqli_fetch_array($result)){
				echo "<tr>";
				echo "<td>" . $row['nomor'] . "</td>";
				echo "<td>" . $row['id_card'] . "</td>";
				echo "<td>" . $row['status_mukmin'] . "</td>";
				echo "<td> SMP </td>";
				echo "<td>" . $row['nisn'] . "</td>";
				echo "<td>" . $row['nama_lengkap'] . "</td>";
				echo "<td>" . $row['ttl'] . "</td>";
				echo "<td>" . $row['alamat'] . "</td>";
				echo "<td>" . $row['nama_ayah'] . "</td>";
				echo "<td>" . $row['nama_ibu'] . "</td>";
				echo "<td>" . $row['no_hp_pengjawab'] . "</td>";
				echo "</tr>";
			}
			echo "</table>";

			mysqli_close($conn);
		break;

		case "sma":
		 	if (mysqli_connect_errno()){
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

			$result = mysqli_query($conn,"SELECT * FROM tb_siswa where tingkat = '3'"); // tingkat 1 adalah SMA

			echo "<table border='1'>
			<tr>
			<th>No</th>
			<th>ID Card</th>
			<th>Status Mukmin</th>
			<th>Tingkat</th>
			<th>NISN</th>
			<th>Nama Lengkap</th>
			<th>TTL</th>
			<th>Alamat</th>
			<th>Nama Ayah</th>
			<th>Nama Ibu</th>
			<th>No. Tlp</th>
			</tr>";

			while($row = mysqli_fetch_array($result)){
				echo "<tr>";
				echo "<td>" . $row['nomor'] . "</td>";
				echo "<td>" . $row['id_card'] . "</td>";
				echo "<td>" . $row['status_mukmin'] . "</td>";
				echo "<td> SMA </td>";
				echo "<td>" . $row['nisn'] . "</td>";
				echo "<td>" . $row['nama_lengkap'] . "</td>";
				echo "<td>" . $row['ttl'] . "</td>";
				echo "<td>" . $row['alamat'] . "</td>";
				echo "<td>" . $row['nama_ayah'] . "</td>";
				echo "<td>" . $row['nama_ibu'] . "</td>";
				echo "<td>" . $row['no_hp_pengjawab'] . "</td>";
				echo "</tr>";
			}
			echo "</table>";

			mysqli_close($conn);
		break;
		
		case "smk":
		 	if (mysqli_connect_errno()){
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

			$result = mysqli_query($conn,"SELECT * FROM tb_siswa where tingkat = '4'"); // tingkat 1 adalah SMK

			echo "<table border='1'>
			<tr>
			<th>No</th>
			<th>ID Card</th>
			<th>Status Mukmin</th>
			<th>Tingkat</th>
			<th>NISN</th>
			<th>Nama Lengkap</th>
			<th>TTL</th>
			<th>Alamat</th>
			<th>Nama Ayah</th>
			<th>Nama Ibu</th>
			<th>No. Tlp</th>
			</tr>";

			while($row = mysqli_fetch_array($result)){
				echo "<tr>";
				echo "<td>" . $row['nomor'] . "</td>";
				echo "<td>" . $row['id_card'] . "</td>";
				echo "<td>" . $row['status_mukmin'] . "</td>";
				echo "<td> SMK </td>";
				echo "<td>" . $row['nisn'] . "</td>";
				echo "<td>" . $row['nama_lengkap'] . "</td>";
				echo "<td>" . $row['ttl'] . "</td>";
				echo "<td>" . $row['alamat'] . "</td>";
				echo "<td>" . $row['nama_ayah'] . "</td>";
				echo "<td>" . $row['nama_ibu'] . "</td>";
				echo "<td>" . $row['no_hp_pengjawab'] . "</td>";
				echo "</tr>";
			}
			echo "</table>";

			mysqli_close($conn);
		break;

		default:
		  	echo "Input did not match with any case";
		break;
		  
		  }
	?>
</body>
</html>