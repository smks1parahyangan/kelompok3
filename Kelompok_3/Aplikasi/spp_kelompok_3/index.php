<?php
session_start();
require_once("koneksi.php");
// Jika sesi dari login belum dibuat maka akan kita kembalikan ke halaman login
if(!isset($_SESSION['username'])){
	header("Location: login.php");
}else{
	// Jika sudah dibuatkan sesi maka akan kita masukkan kedalam variabel
	$username = $_SESSION['username'];
}
?>

<html>
	<head>
		<title>Aplikasi Pembayaran SPP</title>
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
	<!-- Kita akan panggil menu navigasi -->
	<?php require_once("header.php"); ?>
	<h3>Selamat datang, <?= $username ?> </h3>
	<br/>
	Silahkan dikelola dengan baik yaa :)
	<hr/>
	<?php require_once("footer.php"); ?>
</body>
</html>