<?php
$host   = "localhost";
$user   = "root";
$pass   = "";
$dbname = "db_kontak";

$conn = mysqli_connect($host,$user,$pass,$dbname) or die("Koneksi gagal dibangun".$dbname.mysqli_connect_error());

?>
