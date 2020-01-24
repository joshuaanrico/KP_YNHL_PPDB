<!DOCTYPE html>
<html>
<head>
	<title>Tabel Daftar Siswa</title>
</head>
<body>
	<?php 
		include("koneksi.php"); 

	?>
	<form method="post" action="?">
		<select name="dropdown">
			<option value="sd">SD</option>
			<option value="smp">SMP</option>
			<option value="sma">SMA</option>
			<option value="smk">SMK</option>
		</select>
		<input type="submit" value="submit">
	</form>
	<?php
		switch ($_POST['dropdown'])  { 

		case "Jehzeel1":
		 	echo "Jehzeel likes apples";
		break;

		case "Jehzeel2":
		 	echo "Jehzeel likes bananas";
		break;

		case "Jehzeel3":
		 	echo "Jehzeel likes oranges";
		break;

		default:
		  	echo "Input did not match with any case";
		break;
		  
		  }
	?>
</body>
</html>