<?php
//$host = "localhost"; // server
//$user = "root"; // username
//$pass = ""; // password
//$database = "db_inventory"; // nama database

//HOSTINGAN
$host = "localhost"; // server
$user = "id6526905_paragon"; // username
$pass = "paragontech"; // password
$database = "id6526905_paragon"; // nama database

$koneksi = mysqli_connect($host, $user, $pass, $database); // menggunakan mysqli_connect

if(mysqli_connect_errno()){ // mengecek apakah koneksi database error
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error(); // pesan ketika koneksi database error
}
?>
