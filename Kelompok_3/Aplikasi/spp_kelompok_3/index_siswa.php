<?php
session_start();
require_once("koneksi.php");
// Jika sesi dari login belum dibuat maka akan kita kembalikan ke halaman login
if(!isset($_SESSION['nisn'])){
	header("Location: login_siswa.php");
}else{
	// Jika sudah dibuatkan sesi maka akan kita masukkan ke dalam variabel
	$nisn = $_SESSION['nisn'];
}
$siswa = mysqli_query($db, "SELECT * FROM siswa
	JOIN kelas ON siswa.id_kelas=kelas.id_kelas
	WHERE nisn='$nisn'");
$result = mysqli_fetch_assoc($siswa);
$pembayaran = mysqli_query($db, "SELECT * FROM pembayaran
	JOIN petugas ON pembayaran.id_petugas = petugas.id_petugas
	JOIN spp ON pembayaran.id_spp = spp.id_spp
	WHERE nisn = '$nisn'
	ORDER BY tgl_bayar");
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<style>
			body{
				background-image: url(image-5.jpg);
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
		<h1>Selamat datang di Aplikasi Pembyaran SPP</h1>
			<hr/>
		<a href="#biodata">Biodata Kamu</a> | 
		<a href="#history">History Pembayaran</a> | 
		<a href="logout.php">Logout</a>
			<hr/>
		<h2>>> Hallo, <?= $result['nama']; ?></h2>
		<h3>Biodata Kamu</h3>
			<hr/>
		<table cellpadding="5">
			<tr>
				<td>NISN</td>
				<td>:</td>
				<td><?= $result['nisn']; ?></td>
			</tr>
			<tr>
				<td>NIS</td>
				<td>:</td>
				<td><?= $result['nis']; ?></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><?= $result['nama']; ?></td>
			</tr>
			<tr>
				<td>Kelas</td>
				<td>:</td>
				<td><?= $result['nama_kelas'] . " | " . $result['kompetensi_keahlian']; ?></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><?= $result['alamat']; ?></td>
			</tr>
		</table>
			<hr/>
		<p><h2>History Pembayaran Kamu</h2></p>
		<table id="history" cellpadding="5" cellspacing="0" border="1">
			<tr>
				<td>No.</td>
				<td>Dibayarkan kepada</td>
				<td>Tgl. Pembayaran</td>
				<td>Tahun | Nominal yang harus dibayar</td>
				<td>Jumlah yang dibayarkan</td>
				<td>Status</td>
			</tr>
		<?php
		$no = 1;
		while($r = mysqli_fetch_assoc($pembayaran)){ ?>
			<tr>
				<td><?= $no; ?></td>
				<td><?= $r['nama_petugas']; ?></td>
				<td><?= $r['tgl_bayar'] . "/" . $r['bulan_dibayar'] . "/" . $r['tahun_dibayar']; ?></td>
				<td><?= $r['tahun'] . " | Rp. " . $r['nominal']; ?></td>
				<td><?= $r['jumlah_bayar']; ?></td>
				<td>
		<?php
		// Jika jumlah bayar sesuai dengan yang harus dibayar maka Status LUNAS
		if($r['jumlah_bayar'] == $r['nominal']){ ?>
			<font style="color: darkgreen; font-weight: bold;">LUNAS</font>
		<?php }else{ ?>	BELUM LUNAS <?php } ?></td>
			</tr>
		<?php $no++; } ?>
	</table>
	<hr/>
	<?php require_once("footer.php"); ?>
</body>
</html>