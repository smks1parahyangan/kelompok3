<?php
require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tambah Petugas</title>
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
	<h3>Tambah Petugas</h3>
	<form action="" method="POST">
		<table cellpadding="5">
			<tr>
				<td>Username :</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>Password :</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td>Nama Petugas :</td>
				<td><input type="text" name="nama_petugas"></td>
			</tr>
			<tr>
				<td>Level :</td>
				<td><select name="level">
					<option value="Admin">Administrator</option>
					<option value="Petugas">Petugas</option>
				</select></td>
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
	$username = $_POST['username'];
	$password = $_POST['password'];
	$nama_petugas = $_POST['nama_petugas'];
	$level = $_POST['level'];
	$simpan = mysqli_query($db, "INSERT INTO petugas VALUES
		(NULL, '$username', '$password', '$nama_petugas', '$level')");
	if($simpan){
		header("Location: petugas.php");
	}else{
		echo "<script>alert('Data sudah ada');</script>";
	}
}
?>