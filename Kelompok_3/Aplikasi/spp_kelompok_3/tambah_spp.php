<?php
require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tambah SPP</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<style>
			body{
				background-image: url(image-3.jpg);
				background-size: cover;
				color: #000;
			}
			h1{
				margin-top: 100px;
			}
			.logo{
				box-shadow:#333 0px 0px 20px; margin:20px; padding:10px;
			}
		</style>
</head>
<body>
	<!-- Panggil header -->
	<?php require("header.php"); ?>
	<!-- Konten -->
	<h3>Tambah SPP</h3>
	<form action="" method="POST">
		<table cellpadding="5">
			<tr>
				<td>Tahun :</td>
				<td><input type="text" name="tahun"></td>
			</tr>
			<tr>
				<td>Nominal :</td>
				<td><input type="text" name="nominal"></td>
			</tr>
			<tr>
				<td colspan="2"><button type="submit" name="simpan">Simpan</button></td>
			</tr>
		</table>
	</form>
<hr/>
		<!-- Panggil footer -->
	<?php require("footer.php"); ?>
</body>
</html>
<?php
// Proses simpan
if(isset($_POST['simpan'])){
	$tahun = $_POST['tahun'];
	$nominal = $_POST['nominal'];
	$simpan = mysqli_query($db, "INSERT INTO spp VALUES
		(NULL, '$tahun', '$nominal')");
	if($simpan){
		header("Location: spp.php");
	}else{
		echo "<script>alert('Gagal!');</script>";
	}
}
?>