<?php
// --- DEBUGGING ---
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'koneksi.php'; 

// 1. Ambil ID dari URL (wajib ada)
if (!isset($_GET['id'])) {
    header("Location: menu.php");
    exit();
}

// Gunakan fungsi real_escape_string hanya jika koneksi masih terbuka
$id = mysqli_real_escape_string($koneksi, $_GET['id']);

// 2. Query untuk mengambil SEMUA data menu yang akan diedit
$sql_select = "SELECT id_menu, name, description, price, stock_slot, estimated_work_time FROM menu WHERE id_menu='$id'";
$result_select = mysqli_query($koneksi, $sql_select);

if (mysqli_num_rows($result_select) == 0) {
    mysqli_close($koneksi);
    die("Data layanan dengan ID tersebut tidak ditemukan.");
}
$data_lama = mysqli_fetch_assoc($result_select);

$error_message = "";

// 3. Logika untuk memproses UPDATE (Controller Logic)
if (isset($_POST['update'])) {
    
    // Ambil dan bersihkan data baru dari form
    $nama_baru = mysqli_real_escape_string($koneksi, $_POST['nama_menu']);
    $deskripsi_baru = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    $price_baru = mysqli_real_escape_string($koneksi, $_POST['price']); // Harga
    $stock_baru = mysqli_real_escape_string($koneksi, $_POST['stock_slot']); // Slot Stok
    $time_baru = mysqli_real_escape_string($koneksi, $_POST['estimated_work_time']); // Estimasi Waktu
    
    // Query UPDATE untuk SEMUA kolom
    $sql_update = "UPDATE menu SET 
        name='$nama_baru', 
        description='$deskripsi_baru', 
        price='$price_baru',
        stock_slot='$stock_baru',
        estimated_work_time='$time_baru'
        WHERE id_menu='$id'";
    
    if (mysqli_query($koneksi, $sql_update)) {
        // Tutup koneksi dan redirect jika sukses
        mysqli_close($koneksi);
        header("Location: menu.php?status=sukses_update");
        exit();
    } else {
        $error_message = "Error Update: " . mysqli_error($koneksi);
    }
}

// Tutup koneksi jika tidak ada POST request
if (!isset($_POST['update'])) {
    mysqli_close($koneksi);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Layanan - ID <?php echo htmlspecialchars($data_lama['id_menu']); ?></title>
    
    <style>
        /* ====================================
           PALET WARNA RUANGGURU (Untuk Konsistensi)
           ==================================== */
        :root {
            --ruangguru-blue-primary: #007bff; /* Biru Dominan */
            --ruangguru-blue-dark: #0056b3;
            --ruangguru-yellow-accent: #ffc107; 
            --ruangguru-green-accent: #28a745; 
            --ruangguru-red-danger: #dc3545; 
            --ruangguru-white: #ffffff; 
            --ruangguru-light-gray: #f8f9fa; 
            --ruangguru-dark-text: #343a40; 
        }
        
        /* ====================================
           STYLE FORMULIR EDIT (TEMA RUANGGURU)
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
            color: var(--ruangguru-blue-dark); 
            border-bottom: 3px solid var(--ruangguru-blue-primary);
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
            border-color: var(--ruangguru-blue-primary);
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25); 
            outline: none;
        }

        /* Tombol Simpan/Update */
        .form-container button[type="submit"] {
            background-color: var(--ruangguru-blue-primary); 
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
            box-shadow: 0 4px 8px rgba(0, 123, 255, 0.3);
        }

        .form-container button[type="submit"]:hover {
            background-color: var(--ruangguru-blue-dark);
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
            color: var(--ruangguru-blue-primary);
            text-decoration: underline;
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
        <h1>Edit Data Layanan/Menu (ID: <?php echo htmlspecialchars($data_lama['id_menu']); ?>)</h1>
        
        <?php if (!empty($error_message)): ?>
            <p class="error-message">❌ <?php echo $error_message; ?></p>
        <?php endif; ?>
        
        <form method="POST">
            
            <label for="nama_menu">Nama Layanan:</label>
            <input type="text" id="nama_menu" name="nama_menu" value="<?php echo htmlspecialchars($data_lama['name']); ?>" required>
            
            <label for="deskripsi">Deskripsi:</label>
            <textarea id="deskripsi" name="deskripsi" rows="5" required><?php echo htmlspecialchars($data_lama['description']); ?></textarea>
            
            <label for="price">Harga (Contoh: 1500000):</label>
            <input type="text" id="price" name="price" value="<?php echo htmlspecialchars($data_lama['price']); ?>" required>

            <label for="stock_slot">Slot Stok / Ketersediaan:</label>
            <input type="number" id="stock_slot" name="stock_slot" value="<?php echo htmlspecialchars($data_lama['stock_slot']); ?>" required>
            
            <label for="estimated_work_time">Estimasi Waktu Kerja (Contoh: 1 jam / 30 menit):</label>
            <input type="text" id="estimated_work_time" name="estimated_work_time" value="<?php echo htmlspecialchars($data_lama['estimated_work_time']); ?>" required>
            
            <button type="submit" name="update">SIMPAN PERUBAHAN</button>
            
            <p><a href="menu.php">← Kembali ke Daftar Menu</a></p>
        </form>
    </div>

</body>
</html>