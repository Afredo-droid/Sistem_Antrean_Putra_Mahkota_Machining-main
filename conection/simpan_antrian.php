<?php
include "koneksi.php";

$nama            = $_POST['nama'];
$telepon         = $_POST['telepon'];
$jenis_perbaikan = $_POST['jenis_perbaikan'];
$tanggal_booking = $_POST['tanggal'];     // ✅ sesuai form
$deskripsi       = $_POST['keluhan'];     // ✅ sesuai form

$sql = "INSERT INTO queue (customer_name, phone, repair_type, booking_date, description)
        VALUES ('$nama', '$telepon', '$jenis_perbaikan', '$tanggal_booking', '$deskripsi')";

if (mysqli_query($conn, $sql)) {
    echo "<script>
            alert('✅ Pesanan berhasil disimpan!');
            window.location='index.php';
          </script>";
} else {
    echo "<pre>❌ Error: " . mysqli_error($conn) . "</pre>";
}

mysqli_close($conn);
?>
