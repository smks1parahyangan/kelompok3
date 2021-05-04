<?php
require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tambah Kelas</title>
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
	<h3>Tambah Kelas</h3>
	<form action="" method="POST">
		<table cellpadding="5">
			<tr>
				<td>Nama Kelas :</td>
				<td><input type="text" name="nama_kelas"></td>
			</tr>
			<tr>
				<td>Kompetensi Keahlian :</td>
				<td><input type="text" name="kompetensi_keahlian"></td>
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
	$nama_kelas = $_POST['nama_kelas'];
	$kompetensi_keahlian = $_POST['kompetensi_keahlian'];
	$simpan = mysqli_query($db, "INSERT INTO kelas VALUES
		(NULL, '$nama_kelas', '$kompetensi_keahlian')");
	if($simpan){
		header("Location: kelas.php");
	}else{
		echo "<script>alert('Gagal!');</script>";
	}
}
?>