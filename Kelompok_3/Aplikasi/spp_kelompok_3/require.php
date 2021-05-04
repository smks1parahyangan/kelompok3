<?php
session_start();
require_once("koneksi.php");

if(!isset($_SESSION['username'])){
	header("Location: login.php");
}else{
	$username = $_SESSION['username'];
}