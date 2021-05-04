<?php
require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Entry Transaksi</title>
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
	<h3>Transaksi</h3>
	<p><a href="tambah_transaksi.php">Tambah Data</a></p>
	<table cellspacing="0" border="1" cellpadding="5">
		<tr>
			<td>No. </td>
			<td>Nama Petugas</td>
			<td>Nama Siswa</td>
			<td>Tgl/Bulan/Tahun Dibayar</td>
			<td>Tahun / Nominal harus dibayar</td>
			<td>Jumlah yang dibayar</td>
			<td>Status</td>
			<td>Aksi</td>
		</tr>
		<?php
		// Kita panggil tabel pembayaran
		// Setelah kita panggil, JOIN tabel yang ter relasi ke tabel pembayaran
		$sql = mysqli_query($db, "SELECT * FROM pembayaran
			JOIN petugas ON pembayaran.id_petugas = petugas.id_petugas
			JOIN siswa ON pembayaran.nisn = siswa.nisn
			JOIN spp ON pembayaran.id_spp = spp.id_spp");
		$no = 1;
		while($r = mysqli_fetch_assoc($sql)){ ?>
			<tr>
				<td><?=$no; ?></td>
				<td><?=$r['nama_petugas']; ?></td>
				<td><?=$r['nama']; ?></td>
				<td><?=$r['tgl_bayar'] . "/" . $r['bulan_dibayar'] . "/" . $r['tahun_dibayar']; ?></td>
				<td><?=$r['tahun'] . " | Rp. " . $r['nominal']; ?></td>
				<td><?=$r['jumlah_bayar']; ?></td>
				<td>
					<?php
					// Jika jumlah bayar sesuai dengan yang harus dibayar maka Staus LUNAS
					if($r['jumlah_bayar'] == $r['nominal']){ ?>
						<font style="color: darkgreen; font-weight: bold;">LUNAS</font>
					<?php }else{ ?> BELUM LUNAS <?php } ?></td>
				<td>
				<?php
				// Jika siswa ingin membayar lunas sisa pembayaran
				if($r['jumlah_bayar'] == $r['nominal']){ echo "-";
				}else{ ?>
					<a href="?lunas&id=<?=$r['id_pembayaran']; ?>">BAYAR LUNAS</a>
				<?php } ?></td>
			</tr>
			<?php $no++; } ?>
		</table>
		<hr/>
	<?php require_once("footer.php"); ?>
</body>
</html>
<?php
// Ada siswa yang ingin membayar sisa pembayaran
if(isset($_GET['lunas'])){
	$id = $_GET['id'];
	$ambilData = mysqli_query($db,"SELECT * FROM pembayaran JOIN spp ON pembayaran.id_spp = spp.id_spp
		WHERE id_pembayaran = '$id'");
	$row = mysqli_fetch_assoc($ambilData);
	$sisa = $row['nominal'] - $row['jumlah_bayar'];
	$hasil = $row['jumlah_bayar'] + $sisa;
	$update = mysqli_query($db, "UPDATE pembayaran SET jumlah_bayar='$hasil' WHERE id_pembayaran='$id'");
	if($update){
		header("Location: transaksi.php");
	}
}
?>