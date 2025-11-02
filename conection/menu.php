<?php
// --- DEBUGGING ---
ini_set('display_errors', 1);
error_reporting(E_ALL);

// 1. Panggil file koneksi 
require_once 'koneksi.php'; 

$data_menu = [];
$pesan_error = "";

// Query untuk mengambil SEMUA kolom
$sql = "SELECT id_menu, name, description, price, stock_slot, estimated_work_time FROM menu ORDER BY id_menu ASC";
$result = mysqli_query($koneksi, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $data_menu[] = $row;
        }
    } else {
        $pesan_error = "Tidak ada data layanan/menu ditemukan.";
    }
} else {
    $pesan_error = "Gagal menjalankan query: " . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Layanan/Menu</title>
    
    <style>
        /* ====================================
            8. STYLE KHUSUS CRUD & DATA TABLE 
            ==================================== */

        /* Mengganti BODY: Ini akan menimpa gaya body Neon hanya di halaman yang memiliki class="crud-page" */
        .crud-page {
            font-family: 'Arial', sans-serif;
            /* Latar belakang terang, hilangkan gambar background neon */
            background-color: #f8f8f8 !important; 
            background-image: none !important; 
            color: #333 !important; /* Warna teks hitam */
            margin: 20px;
        }

        .crud-page h1 {
            color: #007bff; 
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 25px;
        }

        /* Link default di halaman CRUD */
        .crud-page a {
            color: #007bff;
            text-decoration: none;
        }
        .crud-page a:hover {
            text-decoration: underline;
        }

        /* STYLE TABEL (MENU.PHP) */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            background-color: #fff;
        }

        .data-table th, .data-table td {
            border: 1px solid #ddd;
            padding: 12px 15px;
            text-align: left;
        }

        .data-table th {
            background-color: #007bff; /* Biru */
            color: white;
            text-transform: uppercase;
            font-size: 14px;
        }

        .data-table tr:nth-child(even) {
            background-color: #f4f7f9;
        }

        .data-table tr:hover {
            background-color: #e9ecef;
        }

        .data-table td:last-child {
            text-align: center;
            width: 120px
        }

        /* STYLE FORMULIR (TAMBAH & EDIT) */
        .form-container {
            max-width: 600px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .form-container label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
            color: #555;
            margin-bottom: 5px;
        }

        .form-container input[type="text"], 
        .form-container textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; 
            font-size: 16px;
        }

        .form-container textarea {
            resize: vertical;
        }

        /* STYLE TOMBOL CRUD */

        /* Tombol Simpan (di form) */
        .form-container button[type="submit"] {
            background-color: #f8e10eff; /* Hijau */
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
            font-size: 16px;
            transition: background-color 0.3s;
            width: 100%; /* Lebar penuh di form */
        }

        .form-container button[type="submit"]:hover {
            background-color: #f8e10eff;
        }

        /* Tombol Tambah Menu (di menu.php) */
        .btn-tambah {
            display: inline-block;
            background-color: var(--ruangguru-yellow-accent); /* Kuning Aksen Ruangguru */
            color: var(--ruangguru-white) !important; /* Teks putih untuk kontras */
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 25px;
            font-weight: 700;
            transition: background-color 0.3s, transform 0.2s;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2); /* Shadow yang lebih generik */
            text-decoration: none; /* Pastikan tidak ada underline */
        }

        .btn-tambah:hover {
            background-color: #e0a800; /* Sedikit lebih gelap saat hover */
            transform: translateY(-1px);
            text-decoration: none;
        }
        
        /* Menargetkan ikon "+" secara spesifik jika itu adalah bagian dari teks */
        .btn-tambah .icon-plus { 
            color: var(--ruangguru-white); /* Memastikan ikon juga putih */
            margin-right: 5px; /* Sedikit spasi antara ikon dan teks */
        }
        

        /* Tombol Aksi di Tabel (link Edit/Hapus) */
        .btn-edit {
            color: #f8e10eff; /* Kuning/Oranye */
            font-weight: bold;
            margin-right: 5px;
        }

        .btn-hapus {
            color: #dc3545; /* Merah */
            font-weight: bold;
        }
    </style>
</head>

<body class="crud-page"> 
    <h1>Daftar Layanan/Menu Bengkel</h1>
    
    <a href="form_tambah_menu.php" class="btn-tambah">➕ Tambah Menu Baru</a>

    <?php if ($pesan_error): ?>
        <p class="error">⚠️ <?php echo $pesan_error; ?></p>
    <?php endif; ?>

    <?php if (!empty($data_menu)): ?>
        <table class="data-table"> 
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Layanan</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Slot Stok</th>
                    <th>Estimasi Kerja</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($data_menu as $menu) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($menu['id_menu']) . "</td>";
                    echo "<td>" . htmlspecialchars($menu['name']) . "</td>";
                    echo "<td>" . nl2br(htmlspecialchars(strip_tags($menu['description']))) . "</td>";
                    echo "<td>" . htmlspecialchars($menu['price']) . "</td>"; 
                    echo "<td>" . htmlspecialchars($menu['stock_slot']) . "</td>";
                    echo "<td>" . htmlspecialchars($menu['estimated_work_time']) . "</td>";
                    
                    echo "<td>";
                    echo "<a href='form_edit_menu.php?id=" . $menu['id_menu'] . "' class='btn-edit'>Edit</a> | ";
                    echo "<a href='hapus_menu.php?id=" . $menu['id_menu'] . "' class='btn-hapus' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>Hapus</a>";
                    echo "</td>";
                    
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    <?php endif; ?>

</body>
</html>