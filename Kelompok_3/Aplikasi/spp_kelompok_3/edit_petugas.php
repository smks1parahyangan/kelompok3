<?php
require_once("require.php");
$id_petugas = $_GET['id_petugas'];
$petugas = mysqli_query($db, "SELECT * FROM petugas WHERE id_petugas='$id_petugas'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit data Petugas</title>
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
	<h3>Edit data Petugas</h3>
	<?php
	while($row = mysqli_fetch_assoc($petugas)){ ?>
		<form action="" method="POST">
			<table cellpadding="5">
				<input type="hidden" name="id_petugas" value="<?= $row['id_petugas']; ?>">
				<tr>
					<td>Username :</td>
					<td><input type="text" name="username" value="<?= $row['username']; ?>"></td>
				</tr>
				<tr>
					<td>Password :</td>
					<td><input type="text" name="password" value="<?= $row['password']; ?>"></td>
				</tr>
				<tr>
					<td>Nama Petugas :</td>
					<td><input type="text" name="nama_petugas" value="<?= $row['nama_petugas']; ?>"></td>
				</tr>
				<tr>
					<td>Level :</td>
					<td><select name="level">
						<option value="Admin">Administrator</option>
						<option value="Petugas"  <?php if($row['level'] == 'Petugas'){echo "selected";} ?>>Petugas</option>
					</select></td>
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
	$id_petugas = $_POST['id_petugas'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$nama_petugas = $_POST['nama_petugas'];
	$level = $_POST['level'];
	$update = mysqli_query($db, "UPDATE petugas SET username='$username',
		password='$password', nama_petugas='$nama_petugas', level='$level'
		WHERE petugas.id_petugas='$id_petugas'");
	if($update){
		header("Location: petugas.php");
	}else{
		echo "<script>alert('Gagal');</script>";
	}
}
?>