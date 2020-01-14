<?php 
	// Menambahkan file koneksi.php
	include("koneksi.php");

	$sql = "SELECT * FROM tb_siswa WHERE id='3556'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        echo "id: " . $row["id"]. " - Name: " . $row["Nama_Lengkap"] . "<br>";
	    }
	} else {
	    echo "0 results";
	}
	$conn->close();
 ?>