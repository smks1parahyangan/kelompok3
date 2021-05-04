<?php
require_once("require.php");
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CRUD Data Kelas</title>
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
	<h3>Kelas</h3>
	<p><a href="tambah_kelas.php">Tambah Data</a></p>
	<table cellspacing="0" border="1" cellpadding="5">
		<tr>
			<td>No.</td>
			<td>Nama Kelas</td>
			<td>Kompetensi Keahlian</td>
			<td>Aksi</td>
		</tr>
		<?php
		// Kita panggil tabel kelas
		$sql = mysqli_query($db, "SELECT * FROM kelas");
		$no = 1;
		while($r = mysqli_fetch_assoc($sql)){ ?>
			<tr>
				<td><?= $no; ?></td>
				<td><?= $r['nama_kelas']; ?></td>
				<td><?= $r['kompetensi_keahlian']; ?></td>
				<td><a href="?hapus&id_kelas=<?= $r['id_kelas'];?>">Hapus</a>
					<a href="edit_kelas.php?id_kelas=<?= $r['id_kelas']; ?>">Edit</a></td>
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
	$id_kelas = $_GET['id_kelas'];
	$hapus = mysqli_query($db, "DELETE FROM kelas WHERE id_kelas='$id_kelas'");
	if($hapus){
		header("Location: kelas.php");
	}else{
		echo "<script>alert('Maaf, data tesebut masih terhubung dengan data yang lain');</script>";
	}
}

?>