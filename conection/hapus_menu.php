<?php
// Tiga baris untuk debugging:
ini_set('display_errors', 1); error_reporting(E_ALL);

require_once 'koneksi.php'; // Ganti 'koneksi.php' jika Anda menggunakan 'koneksi_md.php'

// Cek 1: Pastikan ID diterima dari URL
if (isset($_GET['id'])) {
    
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);
    
    // Query DELETE
    $sql_delete = "DELETE FROM menu WHERE id_menu='$id'";
    
    // Eksekusi Query
    if (mysqli_query($koneksi, $sql_delete)) {
        // Jika berhasil, redirect kembali ke daftar menu
        header("Location: menu.php?status=sukses_hapus");
        exit();
    } else {
        echo "Error Delete: " . mysqli_error($koneksi);
    }
    
    mysqli_close($koneksi);
    
} else {
    // Jika diakses tanpa ID, kembali ke halaman menu
    header("Location: menu.php");
    exit();
}
?>