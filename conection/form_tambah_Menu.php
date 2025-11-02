<?php
// --- DEBUGGING ---
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'koneksi.php'; 

$pesan_sukses = "";
$error_message = "";

// 1. Logika untuk memproses INSERT data baru
if (isset($_POST['simpan'])) {
    
    // Pastikan koneksi masih terbuka sebelum menggunakan real_escape_string
    if (!isset($koneksi) || $koneksi === false) {
        require_once 'koneksi.php'; 
    }
    
    // Ambil dan bersihkan data dari form
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama_menu']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    $price = mysqli_real_escape_string($koneksi, $_POST['price']); 
    $stock = mysqli_real_escape_string($koneksi, $_POST['stock_slot']); 
    $time = mysqli_real_escape_string($koneksi, $_POST['estimated_work_time']); 
    
    // Query INSERT
    // Catatan: id_menu biasanya bersifat AUTO_INCREMENT, jadi tidak perlu dimasukkan di sini
    $sql_insert = "INSERT INTO menu (name, description, price, stock_slot, estimated_work_time) 
                   VALUES ('$nama', '$deskripsi', '$price', '$stock', '$time')";
    
    if (mysqli_query($koneksi, $sql_insert)) {
        // Jika sukses, redirect kembali ke halaman daftar menu
        mysqli_close($koneksi);
        header("Location: menu.php?status=sukses_tambah");
        exit();
    } else {
        $error_message = "Gagal menyimpan data: " . mysqli_error($koneksi);
    }
    
    mysqli_close($koneksi); // Tutup koneksi setelah selesai berinteraksi
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Layanan Baru</title>
    
    <style>
        /* ====================================
           PALET WARNA RUANGGURU (Untuk Konsistensi)
           ==================================== */
        :root {
            --ruangguru-blue-primary: #007bff; 
            --ruangguru-blue-dark: #0056b3;
            --ruangguru-yellow-accent: #ffc107; 
            --ruangguru-green-accent: #28a745; /* Hijau untuk Simpan/Tambah */
            --ruangguru-red-danger: #dc3545; 
            --ruangguru-white: #ffffff; 
            --ruangguru-light-gray: #f8f9fa; 
            --ruangguru-dark-text: #343a40; 
        }
        
        /* ====================================
           STYLE FORMULIR TAMBAH (TEMA RUANGGURU)
           ==================================== */

        .crud-page {
            font-family: 'Poppins', 'Arial', sans-serif;
            background-color: var(--ruangguru-light-gray); 
            color: var(--ruangguru-dark-text);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        .form-container {
            max-width: 600px;
            width: 100%;
            padding: 40px;
            background-color: var(--ruangguru-white);
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .form-container h1 {
            color: var(--ruangguru-green-accent); /* Warna Hijau untuk Tambah */
            border-bottom: 3px solid var(--ruangguru-green-accent);
            padding-bottom: 15px;
            margin-bottom: 30px;
            font-weight: 700;
            font-size: 1.8em;
        }

        .form-container label {
            display: block;
            margin-top: 15px;
            color: var(--ruangguru-dark-text);
            font-weight: 600;
            margin-bottom: 5px;
        }

        .form-container input[type="text"],
        .form-container input[type="number"],
        .form-container textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ced4da;
            border-radius: 8px; 
            box-sizing: border-box; 
            font-size: 16px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }
        
        .form-container textarea {
            resize: vertical;
        }
        
        .form-container input:focus, 
        .form-container textarea:focus {
            border-color: var(--ruangguru-green-accent); /* Fokus Hijau */
            box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25); 
            outline: none;
        }

        /* Tombol Simpan/Tambah */
        .form-container button[type="submit"] {
            background-color: var(--ruangguru-green-accent); /* Hijau */
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 25px;
            font-size: 16px;
            font-weight: 700;
            transition: background-color 0.3s, transform 0.2s;
            width: 100%; 
            box-shadow: 0 4px 8px rgba(40, 167, 69, 0.3);
        }

        .form-container button[type="submit"]:hover {
            background-color: #218838;
            transform: translateY(-1px);
        }
        
        /* Link Kembali */
        .form-container p {
            text-align: center;
            margin-top: 20px;
        }
        .form-container a {
            color: var(--ruangguru-dark-text);
            text-decoration: none;
            font-weight: 500;
        }
        .form-container a:hover {
            color: var(--ruangguru-green-accent);
            text-decoration: underline;
        }
        
        .success-message {
            color: white;
            background-color: var(--ruangguru-green-accent);
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-weight: 500;
            text-align: center;
        }
        
        .error-message {
            color: var(--ruangguru-red-danger);
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-weight: 500;
        }

    </style>
</head>

<body class="crud-page">
    <div class="form-container">
        <h1>Tambah Layanan/Menu Baru</h1>
        
        <?php if (!empty($error_message)): ?>
            <p class="error-message">❌ <?php echo $error_message; ?></p>
        <?php endif; ?>
        
        <form method="POST">
            
            <label for="nama_menu">Nama Layanan:</label>
            <input type="text" id="nama_menu" name="nama_menu" required>
            
            <label for="deskripsi">Deskripsi:</label>
            <textarea id="deskripsi" name="deskripsi" rows="5" required></textarea>
            
            <label for="price">Harga (Contoh: 1500000):</label>
            <input type="text" id="price" name="price" required>

            <label for="stock_slot">Slot Stok / Ketersediaan:</label>
            <input type="number" id="stock_slot" name="stock_slot" value="1" min="1" required>
            
            <label for="estimated_work_time">Estimasi Waktu Kerja (Contoh: 1 jam / 30 menit):</label>
            <input type="text" id="estimated_work_time" name="estimated_work_time" required>
            
            <button type="submit" name="simpan">SIMPAN LAYANAN</button>
            
            <p><a href="menu.php">← Kembali ke Daftar Menu</a></p>
        </form>
    </div>

</body>
</html>