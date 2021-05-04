<?php
require_once("require.php");
$nisnSiswa = $_GET['nisn'];
$siswa = mysqli_query($db, "SELECT * FROM siswa WHERE nisn='$nisnSiswa'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>EDIt data Siswa</title>
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
	<h3>Edit data Siswa</h3>
	<?php
	while($row = mysqli_fetch_assoc($siswa)){ ?>
		<form action="" method="POST">
			<table cellpadding="5">
				<input type="hidden" name="nisn" value="<?= $row['nisn']; ?>">
				<tr>
					<td>Nama :</td>
					<td><input type="text" name="nama" value="<?= $row['nama']; ?>"></td>
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
					<td><input type="text" name="alamat" value="<?= $row['alamat']; ?>"></td>
				</tr>
				<tr>
					<td>No. Telp :</td>
					<td><input type="text" name="no" value="<?= $row['no_telp']; ?>"></td>
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
	$nisn = $_POST['nisn'];
	$nis = $_POST['nis'];
	$nama = $_POST['nama'];
	$kelas = $_POST['kelas'];
	$alamat = $_POST['alamat'];
	$no = $_POST['no'];
	$update = mysqli_query($db, "UPDATE siswa SET nama='$nama',
		id_kelas='$kelas', alamat='$alamat', no_telp='$no'
		WHERE siswa.nisn='$nisn'");
	if($update){
		header("Location: siswa.php");
	}else{
		echo "<script>alert('Gagal');</script>";
	}
}
?>