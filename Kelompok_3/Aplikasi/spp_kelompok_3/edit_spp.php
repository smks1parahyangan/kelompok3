<?php
require_once("require.php");
$id_spp = $_GET['id_spp'];
$spp = mysqli_query($db, "SELECT * FROM spp WHERE id_spp='$id_spp'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit data SPP</title>
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
	<h3>Edit data SPP</h3>
	<?php
	while($row = mysqli_fetch_assoc($spp)){ ?>
		<form action="" method="POST">
			<table cellpadding="5">
				<input type="hidden" name="id_spp" value="<?= $row['id_spp']; ?>">
				<tr>
					<td>Tahun :</td>
					<td><input type="text" name="tahun" value="<?= $row['tahun']; ?>"></td>
				</tr>
				<tr>
					<td>Nominal :</td>
					<td><input type="text" name="nominal" value="<?= $row['nominal']; ?>"></td>
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
	$id_spp = $_POST['id_spp'];
	$tahun = $_POST['tahun'];
	$nominal = $_POST['nominal'];
	$update = mysqli_query($db, "UPDATE spp SET tahun='$tahun',
		nominal='$nominal'
		WHERE spp.id_spp='$id_spp'");
	if($update){
		header("Location: spp.php");
	}else{
		echo "<script>alert('Gagal');</script>";
	}
}
?>