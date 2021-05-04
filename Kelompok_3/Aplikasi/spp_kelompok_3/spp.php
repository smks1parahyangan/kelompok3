<?php
require_once("require.php");
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CRUD Data SPP</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<style>
			body{
				background-image: url(image-3.jpg);
				background-size: cover;
				color: #000;
				font-weight: bold;
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
	<!-- Panggil script header -->
	<?php require_once("header.php"); ?>
	<!-- Isi Konten -->
	<h3>SPP</h3>
	<p><a href="tambah_spp.php">Tambah Data</a></p>
	<table cellspacing="0" border="1" cellpadding="5">
		<tr>
			<td>No.</td>
			<td>Tahun</td>
			<td>Nominal</td>
			<td>Aksi</td>
		</tr>
		<?php
		// Kita panggil tabel SPP
		$sql = mysqli_query($db, "SELECT * FROM spp");
		$no = 1;
		while($r = mysqli_fetch_assoc($sql)){ ?>
			<tr>
				<td><?= $no; ?></td>
				<td><?= $r['tahun']; ?></td>
				<td><?= $r['nominal']; ?></td>
				<td><a href="?hapus&id_spp=<?= $r['id_spp'];?>">Hapus</a>
					<a href="edit_spp.php?id_spp=<?= $r['id_spp']; ?>">Edit</a></td>
			</tr>
		<?php $no++; }?>
	</table>
	<hr/>
	<?php require_once("footer.php"); ?>
</body>
</html>
<?php
// Tombol Hapus ditekan
if(isset($_GET['hapus'])){
	$id_spp = $_GET['id_spp'];
	$hapus = mysqli_query($db, "DELETE FROM spp WHERE id_spp='$id_spp'");
	if($hapus){
		header("Location: spp.php");
	}else{
		echo "<script>alert('Maaf, data tesebut masih terhubung dengan data yang lain');</script>";
	}
}

?>