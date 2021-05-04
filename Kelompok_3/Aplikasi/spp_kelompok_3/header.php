<h1>Selamat datang di Aplikasi Pembayaran SPP</h1>
<hr/>
<!-- Logika kita, jika Level Admin Maka fitur apa saja yang dapat diakses -->
<?php
$panggil = mysqli_query($db, "SELECT * FROM petugas WHERE username='$username'");
$hasil = mysqli_fetch_assoc($panggil);
	if($hasil['level'] == "Admin"){ ?>
		<a href="siswa.php">Data Siswa</a>
		<a href="petugas.php">Data Petugas</a>
		<a href="kelas.php">Data Kelas</a>
		<a href="spp.php">Data SPP</a>
		<a href="transaksi.php">Transaksi</a>
		<a href="history.php">History Pembayaran</a>
		<a href="logout.php">Logout</a>
<?php
	}else{ ?>
	<a href="transaksi.php">Transaksi</a>
	<a href="history.php">History Pembayaran</a>
	<a href="logout.php">Logout</a>
<?php } ?>
<hr/>