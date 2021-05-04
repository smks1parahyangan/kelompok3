<?php
require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>History Pembayaran</title>
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
	<!-- Panggil header -->
	<?php require_once("header.php"); ?>
	<!-- Konten -->
	<h3>History Pembayaran Siswa</h3>
	<form action="" method="POST" autocomplete="off">
		Cari Siswa <input type="text" name="nisn" placeholder="Cari berdasarkan NISN" autofocus>
		<button type="submit" name="cari">Cari</button>
	</form>
	<?php
	// Kita lakukan proses pencariannya disini
	if(isset($_POST['cari'])){
		$nisn = $_POST['nisn'];
		// Kita panggil table siswa
		$biodataSiswa = mysqli_query($db, "SELECT * FROM siswa
			JOIN kelas on siswa.id_kelas = kelas.id_kelas
			WHERE nisn='$nisn'");
		// Table pembayaran wajib kita panggil
		$historyPembayaran = mysqli_query($db, "SELECT * FROM pembayaran
			JOIN petugas ON pembayaran.id_petugas = petugas.id_petugas
			JOIN spp ON pembayaran.id_spp = spp.id_spp
			WHERE nisn='$nisn'");
		$r_siswa = mysqli_fetch_assoc($biodataSiswa);
	?>
	<hr/>
	<!-- Kita tampilkan Biodata Siswa -->
		<h3>Biodata Siswa</h3>
		<table cellpadding="5">
			<tr>
				<td>NISN</td>
				<td>:</td>
				<td><?= $r_siswa['nisn']; ?></td>
			</tr>
			<tr>
				<td>NIS</td>
				<td>:</td>
				<td><?= $r_siswa['nis']; ?></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><?= $r_siswa['nama']; ?></td>
			</tr>
			<tr>
				<td>Kelas</td>
				<td>:</td>
				<td><?= $r_siswa['nama_kelas']. " | " . $r_siswa['kompetensi_keahlian']; ?></td>
			</tr>
		</table>
		<hr/>
		<!-- Sekarang kita tampilkan history pembayarannya -->
		<table cellpadding="5" cellspacing="0" border="1">
			<tr>
				<td>NO. </td>
				<td>Tanggal Pembayaran</td>
				<td>Pembayaran Melalui</td>
				<td>Tahun SPP | Nominal yang harus dibayar</td>
				<td>Jumlah yang sudah dibayar</td>
				<td>Status</td>
				<td>Aksi</td>
			</tr>
			<?php
			$no=1;
			while($r_trx = mysqli_fetch_assoc($historyPembayaran)){ ?>
			<tr>
				<td><?= $no; ?></td>
				<td><?= $r_trx['tgl_bayar'] . " " . $r_trx['bulan_dibayar'] ." ". 
					$r_trx['tahun_dibayar']; ?></td>
				<td><?= $r_trx['nama_petugas']; ?></td>
				<td><?= $r_trx['tahun'] . " | Rp. " . $r_trx['nominal']; ?></td>
				<td><?= "Rp. " . $r_trx['jumlah_bayar']; ?></td>
			<?php
			if($r_trx['jumlah_bayar'] == $r_trx['nominal']){ ?>
				<td><font style="color: darkgreen; font-weight: bold;">LUNAS</font></td>
				<td>-</td>
			<?php }else{ ?> <td> BELUM LUNAS</td>
				<td><a href="transaksi.php?lunas&id=<?= $r_trx['id_pembayaran']; ?>">
				BAYAR LUNAS</a></td>
			<?php } ?>
			</tr>
			<?php $no++; } ?>
		</table>
		<?php } ?>
		<hr/>
	<!-- Panggil Footer -->
	<?php require_once("footer.php"); ?>
</body>
</html>