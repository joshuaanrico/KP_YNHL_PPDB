<!DOCTYPE html>
<html>
<head>
	<title>Tabel Daftar Siswa</title>
</head>
<body>
	<?php include("koneksi.php"); ?>

	<form method="post" action="#">
		<select name="dropdown">
			<option value="sd">SD</option>
			<option value="smp">SMP</option>
			<option value="sma">SMA</option>
			<option value="smk">SMK</option>
		</select>
		<input type="submit" value="submit">
	</form>
	<br>

	<?php
		switch ($_POST['dropdown'])  { 

		case "sd":
		 	echo "sd";
		break;

		case "smp":
		 	echo "smp";
		break;

		case "sma":
		 	echo "sma";
		break;
		
		case "smk":
		 	echo "smk";
		break;

		default:
		  	echo "Input did not match with any case";
		break;
		  
		  }
	?>
</body>
</html>