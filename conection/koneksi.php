<?php
$host = "localhost";
$user = "root";       // username default XAMPP
$pass = "";           // kosongkan jika belum ada password
$db   = "umkm";       // nama database kamu di phpMyAdmin

$conn = mysqli_connect($host, $user, $pass, $db);

if (mysqli_query($conn, $sql)) {
    echo "<script>
            alert('✅ Pesanan berhasil disimpan!');
            window.location='index.php';
          </script>";
} else {
    echo "<pre>❌ Error: " . mysqli_error($conn) . "</pre>";
}
if ($conn) {
    echo "✅ Koneksi berhasil";
} else {
    echo "❌ Gagal koneksi: " . mysqli_connect_error();
}

?>
