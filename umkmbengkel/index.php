<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-SPEED Bengkel - Layanan Servis Cepat & Tepat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <div class="container">
            <div class="logo">
                <img src="../image/umkmlogo.png" alt="Logo E-SPEED Bengkel" class="navbar-logo">
            </div>
            <nav>
                <ul>
                    <li><a href="#hero">Beranda</a></li>
                    <li><a href="#services">Layanan Unggulan</a></li>
                    <li><a href="#about">Tentang Kami</a></li>
                    <li><a href="#booking" class="btn-nav">Pesan Antrian</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="hero" style="
    background-image: url('../image/baground\ umkm.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh;
    color: white;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
">
    <div class="container">
        <h2>Selamat Datang di <span class="text-neon">E-SPEED</span></h2>
        <p>Spesialis Perbaikan Mesin dan Kelistrikan Motor/Mobil Anda. Cepat, Tepat, dan Bergaransi!</p>
        <a href="#booking" class="btn">Pesan Antrian Sekarang</a>
    </div>
</section>

        <section id="services" class="section-padding">
  <div class="container">
    <h3 class="text-neon">Layanan Unggulan Kami</h3>

    <!-- GRID UTAMA -->
    <div class="service-grid">

      <div class="service-item">
        <h3 class="text-neon">Pekerjaan Bubut (Turning)</h3>
        <p>⚙️Bubut poros (shaft turning)</p>
        <p>⚙️Bubut cakram rem</p>
        <p>⚙️Bubut puli (pulley)</p>
        <p>⚙️Bubut drat luar / dalam</p>
        <p>⚙️Bubut rumah bearing</p>
        <p>⚙️Bubut silinder blok</p>
        <p>⚙️Bubut kepala baut / mur custom.</p>
      </div>

      <div class="service-item">
        <h3 class="text-neon">Pekerjaan Frais (Milling)</h3>
        <p>⚙️Frais permukaan</p>
        <p>⚙️Frais alur (slotting)</p>
        <p>⚙️Frais roda gigi (gear cutting)</p>
        <p>⚙️Frais lubang oval / slot panjang</p>
      </div>

      <div class="service-item">
        <h3 class="text-neon">Pekerjaan Bor & Reamer</h3>
        <p>⚙️Bor lubang baru</p>
        <p>⚙️Reamer lubang</p>
        <p>⚙️Tapping (bikin ulir dalam)</p>
        <p>⚙️Counterbore / chamfer</p>
      </div>

      <div class="service-item">
        <h3 class="text-neon">Pengelasan & Rebuild</h3>
        <p>⚙️Pengelasan poros aus</p>
        <p>⚙️Rebuild dudukan bearing</p>
        <p>⚙️Las permukaan logam</p>
        <p>⚙️Perbaikan blok mesin</p>
      </div>

      <div class="service-item">
        <h3 class="text-neon">Pekerjaan Grinding & Finishing</h3>
        <p>⚙️Grinding permukaan rata</p>
        <p>⚙️Finishing poros</p>
        <p>⚙️Poles hasil las</p>
        <p>⚙️Finishing presisi akhir</p>
      </div>

    </div>
  </div>
</section>

       
        <section id="about" class="section-padding">
            <div class="container">
                <h3 class="text-neon">Mengapa Memilih E-SPEED?</h3>
                <p>E-SPEED Bengkel didirikan untuk memberikan solusi perbaikan kendaraan yang cepat dan terpercaya. Kami didukung oleh mekanik profesional bersertifikasi dan peralatan diagnosa terkini, memastikan setiap masalah kendaraan Anda ditangani dengan akurat. Kami berkomitmen pada transparansi biaya dan kualitas pengerjaan.</p>
            </div>
        </section>

<section class="gallery" style="margin-top: 60px; text-align: center;">
    <h2 style="color: #00ffe0; font-size: 2em; margin-bottom: 20px;">Galeri Bengkel Kami</h2>
    <div class="gallery-container" style="
        display: flex; 
        flex-wrap: wrap; 
        justify-content: center; 
        gap: 20px;
        padding: 10px;">
        
        <div class="gallery-item" style="flex: 1 1 250px; max-width: 300px;">
            <img src="../image/Galeri Bengkel 1.jpg" alt="Bengkel 1" style="width: 100%; border-radius: 15px; box-shadow: 0 0 10px #00ffe0;">
        </div>
        <div class="gallery-item" style="flex: 1 1 250px; max-width: 300px;">
            <img src="../image/Galeri Bengkel 2.jpg" alt="Bengkel 2" style="width: 100%; border-radius: 15px; box-shadow: 0 0 10px #00ffe0;">
        </div>
        <div class="gallery-item" style="flex: 1 1 250px; max-width: 300px;">
            <img src="../image/Galeri Bengkel 3.jpg" alt="Bengkel 3" style="width: 100%; border-radius: 15px; box-shadow: 0 0 10px #00ffe0;">
        </div>
        <div class="gallery-item" style="flex: 1 1 250px; max-width: 300px;">
            <img src="../image/Galeri Bengkel 4.jpg" alt="Bengkel 4" style="width: 100%; border-radius: 15px; box-shadow: 0 0 10px #00ffe0;">
        </div>
    </div>
</section>

        <section id="booking" class="section-padding">
            <div class="container">
                <h3 class="text-neon">Pemesanan Antrian Perbaikan Online</h3>
                <div class="form-container">
                    <p style="margin-bottom: 25px; color: #aaa;">Isi formulir di bawah ini untuk memesan slot perbaikan Anda tanpa perlu menunggu lama di bengkel.</p>

                    <form id="antrianForm" action="simpan_antrian.php" method="POST" class="booking-form">

                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama" required>
                    </div>

                    <div class="form-group">
                        <label for="telepon">Nomor Telepon (WA)</label>
                        <input type="tel" id="telepon" name="telepon" required>
                    </div>

                    <div class="form-group">
                        <label for="tanggal">Pilih Tanggal Booking</label>
                        <input type="date" id="tanggal" name="tanggal" required>
                    </div>

                    <div class="form-group">
                        <label for="jenis_perbaikan" class="text-neon">Jenis Perbaikan</label>
                        <select id="jenis_perbaikan" name="jenis_perbaikan" required>
                            <option value="" disabled selected>🛠 Pilih Jenis Perbaikan</option>
                            <option value="turning">🪛 Pekerjaan Bubut (Turning)</option>
                            <option value="milling">🔩 Pekerjaan Frais (Milling)</option>
                            <option value="bor_reamer">🔨 Pekerjaan Bor & Reamer</option>
                            <option value="pengelasan">⚒ Pengelasan & Rebuild</option>
                            <option value="grinding">⚙ Pekerjaan Grinding & Finishing</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="keluhan">Deskripsi Keluhan / Permintaan Servis</label>
                        <textarea id="keluhan" name="keluhan" rows="4" required placeholder="Contoh: Pengelasan poros aus, bubut cakram rem, dll."></textarea>
                    </div>

                    <div class="form-group">
                    </div>

                        <button type="submit" class="btn">Kirim Pesanan Antrian</button>
                    </form>

                    <div id="successMessage" class="success-message">
                        **TERIMA KASIH!** Pesanan antrian Anda telah diterima. Kami akan segera menghubungi Anda melalui WhatsApp untuk konfirmasi detail antrian dan perkiraan waktu servis Anda.
                    </div>
                </div>
            </div>
        </section>

    </main>

    <footer>
        <div class="container">
            <p>&copy; 2025 E-SPEED Bengkel. All Rights Reserved.</p>
            <p>Dsn.Dermo Ds.Mentaos Kec.Gudo Kab.Jombang Jawa Timur</p>
        </div>
    </footer>

    <script src="script.js"></script>

</body>
</html>