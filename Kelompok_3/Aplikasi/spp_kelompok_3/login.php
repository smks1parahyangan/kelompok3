<html>
<head>
	<title>LOG IN</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<style>
		body{
			background-image: url(image-2.jpg);
			background-size: cover;
			color: #FFF;
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
<center>
	<h1>Silahkan Login</h1>
	<img src="logo.png" width="150px" style="box-shadow:#333 0px 0px 5px; margin:10px; padding:10px;" />
	<form action="proseslogin.php" method="POST">
		<table align="center">
			<tr>
				<td>Username :</td>
				<td><input type="text" name="username" /></td>
			</tr>
			<tr>
				<td>Password :</td>
				<td><input type="password" name="password" /></td>
			</tr>
			<tr>
				<td></td>
				<td><button type="submit" name="login">Login</button></td>
			</tr>
		</table>
	</form>
</center>
</body>
</html