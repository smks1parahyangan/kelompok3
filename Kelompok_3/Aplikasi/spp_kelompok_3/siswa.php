<?php
require_once("require.php");
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CRUD Data Siswa</title>
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
	<h3>Siswa</h3>
	<p><a href="tambah_siswa.php">Tambah Data</a></p>
	<table cellspacing="0" border="1" cellpadding="5">
		<tr>
			<td>No.</td>
			<td>NISN</td>
			<td>NIS</td>
			<td>Nama Siswa</td>
			<td>Kelas</td>
			<td>Alamat</td>
			<td>No. Telp</td>
			<td>Aksi</td>
		</tr>
		<?php
		// Kita panggil tabel siswa
		// Setelah kita panggil, JOIN tabel yang ter relasi ke tabel siswa
		$sql = mysqli_query($db, "SELECT * FROM siswa
			JOIN kelas ON siswa.id_kelas = kelas.id_kelas");
		$no = 1;
		while($r = mysqli_fetch_assoc($sql)){ ?>
			<tr>
				<td><?= $no; ?></td>
				<td><?= $r['nisn']; ?></td>
				<td><?= $r['nis']; ?></td>
				<td><?= $r['nama']; ?></td>
				<td><?= $r['nama_kelas'] . " | " . $r['kompetensi_keahlian']; ?></td>
				<td><?= $r['alamat']; ?></td>
				<td><?= $r['no_telp']; ?></td>
				<td><a href="?hapus&nisn=<?= $r['nisn'];?>">Hapus</a>
					<a href="edit_siswa.php?nisn=<?= $r['nisn']; ?>">Edit</a></td>
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
	$nisn = $_GET['nisn'];
	$hapus = mysqli_query($db, "DELETE FROM siswa WHERE nisn='$nisn'");
	if($hapus){
		header("Location: siswa.php");
	}else{
		echo "<script>alert('Maaf, data tesebut masih terhubung dengan data yang lain');</script>";
	}
}

?>