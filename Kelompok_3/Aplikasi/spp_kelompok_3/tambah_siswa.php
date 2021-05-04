<?php
require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tambah Siswa</title>
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
	<h3>Tambah Siswa</h3>
	<form action="" method="POST">
		<table cellpadding="5">
			<tr>
				<td>NISN :</td>
				<td><input type="text" name="nisn"></td>
			</tr>
			<tr>
				<td>NIS :</td>
				<td><input type="text" name="nis"></td>
			</tr>
			<tr>
				<td>Nama :</td>
				<td><input type="text" name="nama"></td>
			</tr>
			<tr>
				<td>Kelas :</td>
				<td><select name="kelas">
			<?php
			$kelas = mysqli_query($db, "SELECT * FROM kelas");
			while($r = mysqli_fetch_assoc($kelas)){ ?>
				<option value="<?= $r['id_kelas']; ?>"><?= $r['nama_kelas'] . " | "
				. $r['kompetensi_keahlian']; ?></option>
			<?php } ?> </select></td>
			</tr>
			<tr>
				<td>Alamat :</td>
				<td><input type="text" name="alamat"></td>
			</tr>
			<tr>
				<td>No. Telp :</td>
				<td><input type="text" name="no"></td>
			</tr>
			<tr>
				<td>SPP :</td>
				<td><input type="text" name="spp"></td>
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
	$nisn = $_POST['nisn'];
	$nis = $_POST['nis'];
	$nama = $_POST['nama'];
	$kelas = $_POST['kelas'];
	$alamat = $_POST['alamat'];
	$no = $_POST['no'];
	$spp = $_POST['spp'];
	$simpan = mysqli_query($db, "INSERT INTO siswa VALUES
		('$nisn', '$nis', '$nama', '$kelas', '$alamat', '$no', '$spp')");
	if($simpan){
		header("Location: siswa.php");
	}else{
		echo "<script>alert('Data sudah ada');</script>";
	}
}
?>