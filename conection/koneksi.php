<?php
// conection/koneksi.php (atau koneksi_md.php)
ini_set('display_errors', 1); 
error_reporting(E_ALL);

$host = "localhost"; 
$user = "root";      
$pass = "";          
$db = "umkm";        

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("❌ GAGAL KONEKSI: " . mysqli_connect_error());
}
?>