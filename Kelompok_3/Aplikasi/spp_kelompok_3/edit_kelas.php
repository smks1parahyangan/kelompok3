<?php
require_once("require.php");
$id_kelas = $_GET['id_kelas'];
$kelas = mysqli_query($db, "SELECT * FROM kelas WHERE id_kelas='$id_kelas'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit data Kelas</title>
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
	<h3>Edit data Kelas</h3>
	<?php
	while($row = mysqli_fetch_assoc($kelas)){ ?>
		<form action="" method="POST">
			<table cellpadding="5">
				<input type="hidden" name="id_kelas" value="<?= $row['id_kelas']; ?>">
				<tr>
					<td>Nama :</td>
					<td><input type="text" name="nama_kelas" value="<?= $row['nama_kelas']; ?>"></td>
				</tr>
				<tr>
					<td>Kompetensi Keahlian :</td>
					<td><input type="text" name="kompetensi_keahlian" value="<?= $row['kompetensi_keahlian']; ?>"></td>
				</tr>
				<tr>
					<td colspan="2"><button type="submit" name="simpan">Simpan</button></td>
				</tr>
			</table>
		</form>
	<?php } ?>
	<hr/>
		<!-- Panggil footer -->
	<?php require("footer.php"); ?>
</body>
</html>
<?php
//Proses Update
if(isset($_POST['simpan'])){
	$id_kelas = $_POST['id_kelas'];
	$nama_kelas = $_POST['nama_kelas'];
	$kompetensi_keahlian = $_POST['kompetensi_keahlian'];
	$update = mysqli_query($db, "UPDATE kelas SET nama_kelas='$nama_kelas',
		kompetensi_keahlian='$kompetensi_keahlian'
		WHERE kelas.id_kelas='$id_kelas'");
	if($update){
		header("Location: kelas.php");
	}else{
		echo "<script>alert('Gagal');</script>";
	}
}
?>