<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Produk - Koko Cetak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f4f4; margin: 0; overflow-x: hidden; }
        
        /* ==================== SINKRONISASI PERFECT SIDEBAR ==================== */
        .sidebar {
            width: 250px; height: 100vh; background-color: #f7ff00;
            position: fixed; left: 0; top: 0; padding: 20px 0; z-index: 1000;
            display: flex; flex-direction: column; justify-content: space-between;
            box-shadow: 2px 0 5px rgba(0,0,0,0.05);
        }
        .sidebar-brand { 
            text-align: center; font-weight: 800; font-size: 1.1rem; 
            padding: 0 10px 10px; text-transform: uppercase; line-height: 1.2; 
            border-bottom: 2px solid #000; margin: 0 10px 15px; color: #000;
        }
        .sidebar-menu-container { margin-top: 20px; }
        .nav-link { padding: 12px 25px; color: #000; font-weight: 600; display: flex; align-items: center; text-decoration: none; transition: 0.3s; }
        .nav-link i { font-size: 1.3rem; margin-right: 15px; }
        .nav-link:hover, .nav-link.active { background-color: rgba(0,0,0,0.05); }
        .logo-container { padding: 20px 0; width: 100%; text-align: center; }
        /* ========================================================================== */

        /* Main Content & Top Bar */
        .main-content { margin-left: 250px; width: calc(100% - 250px); min-height: 100vh; }
        .top-bar { 
            background-color: #000; color: #fff; padding: 12px 30px; 
            display: flex; justify-content: space-between; align-items: center;
            position: sticky; top: 0; z-index: 999;
        }
        .logo-top-left { display: flex; align-items: center; gap: 15px; }
        .top-bar h5 { color: #f7ff00; font-weight: 800; margin: 0; font-size: 1.2rem; }
        .welcome-user { color: #f7ff00; font-size: 0.85rem; }

        /* Content Area */
        .content-body { padding: 30px; }
        .list-header {
            background-color: #f7ff00; padding: 12px; text-align: center; font-weight: 800;
            border-radius: 10px; width: 50%; margin: 0 auto 40px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1); text-transform: uppercase; color: #000;
            font-size: 1.4rem; letter-spacing: 1px;
        }

        /* Product Card */
        .product-card {
            background: white; border: none; padding: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: 0.3s;
            border-radius: 8px; height: 100%; display: flex; flex-direction: column;
            text-decoration: none; cursor: pointer;
        }
        .product-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
        
        .img-container { background-color: #f7ff00; padding: 10px; border-radius: 5px; text-align: center; }
        .img-container img { width: 100%; aspect-ratio: 1/1; object-fit: cover; border-radius: 3px; }
        
        .product-title { font-size: 0.95rem; font-weight: 700; margin-top: 12px; color: #333; flex-grow: 1; text-align: left; }
        .product-price { color: #ff0055; font-weight: 800; font-size: 1.1rem; margin: 5px 0; text-align: left; }
        .product-info { font-size: 0.75rem; color: #777; display: flex; justify-content: space-between; align-items: center; }
        .rating-box { background: #fff8e1; color: #ffc107; padding: 2px 6px; border-radius: 4px; font-weight: bold; }
    </style>
</head>
<body>

<div class="sidebar shadow">
    <div>
        <div class="sidebar-brand">SISTEM<br>PEMESANAN</div>
        <nav class="nav flex-column sidebar-menu-container">
            <a class="nav-link" href="index_pelanggan.php"><i class="bi bi-speedometer2"></i> Dashboard</a>
            <a class="nav-link active" href="list_produk.php"><i class="bi bi-box-seam"></i> Produk</a>
            <a class="nav-link" href="pemesanan.php"><i class="bi bi-cart3"></i> Pemesanan</a>
            <a class="nav-link" href="riwayat.php"><i class="bi bi-journal-text"></i> Riwayat Pesanan</a>
            <a class="nav-link" href="login.php"><i class="bi bi-box-arrow-left"></i> LogOut</a>
        </nav>
    </div>
    <div class="logo-container">
        <img src="img/logo_koko.png" class="rounded-circle" width="200" alt="Logo">
    </div>
</div>

<div class="main-content">
    <div class="top-bar shadow-sm">
        <div class="logo-top-left">
            <img src="img/logo_koko.png" class="rounded-circle shadow-sm" width="55" alt="Logo">
            <h5>KOKO CETAK UV PRINTING</h5>
        </div>
        <div class="welcome-user">
            Selamat Datang <span id="user-aktif">Pelanggan</span> <i class="bi bi-person-circle ms-2"></i>
        </div>
    </div>

    <div class="content-body">
        <div class="list-header">LIST PRODUK</div>

        <div class="container-fluid">
            <div class="row g-4 mb-5" id="container-produk"></div>
        </div>
    </div>
</div>

<script>
    // Data Fallback (Default) dengan struktur ID murni
    const produkAwal = [
        { id: 1, nama: "E-toll E-money Custom", harga: 60000, gambar: "img/emon.png", rating: "4.9", terjual: "6RB+", deskripsi: "Jenis Kartu: E-Money<br>Catatan:<br><ul><li>Saldo Rp. 0,-</li><li>Gratis Plastik Kartu</li></ul>Proses Cetak: UV Printing (BUKAN menggunakan stiker/garskin, jadi gambar lebih tajam, berkualitas, bertekstur & tahan lama)<br>Kegunaan E-toll untuk pembayaran:<br><ul><li>Toll</li><li>Parkir</li><li>Tempat hiburan</li><li>SPBU</li><li>Pembayaran transportasi umum: transjakarta, angkot Jak lingko, kereta, dll.</li><li>Belanja dan pembayaran umum seperti di indomaret/alfamart, dsb.</li></ul>" },
        { id: 2, nama: "Tali Lanyard Custom", harga: 15000, gambar: "img/lanyard.png", rating: "4.8", terjual: "7RB+", deskripsi: "Bahan: Tisue Lembut Premium<br>Ukuran: 2cm<br>Cetak: 2 Sisi bolak-balik kualitas UV printing high-resolution.<br>Cocok untuk ID Card kantor, kepanitiaan, atau event." },
        { id: 3, nama: "E-toll Flazz Custom", harga: 60000, gambar: "img/flazz.png", rating: "4.8", terjual: "4RB+", deskripsi: "Jenis Kartu: Flazz BCA Gen 2<br>Cetak murni mesin cetak UV bertekstur tinta premium.<br>Dapat di-top up langsung via NFC m-banking." },
        { id: 4, nama: "Pop Socket HP Custom", harga: 3000, gambar: "img/pop.png", rating: "4.7", terjual: "1RB+", deskripsi: "Aksesoris pegangan HP anti-slip.<br>Bisa dicetak gambar/logo custom permukaan flat.<br>Perekat super kuat tidak mudah lepas." },
        { id: 5, nama: "Flashdisk Kartu Custom 16 GB", harga: 27000, gambar: "img/fd.png", rating: "4.9", terjual: "1RB+", deskripsi: "Kapasitas murni: 16 GB Chip Sandisk/Setara.<br>Model tipis seukuran kartu ATM fit masuk ke dompet.<br>Cetak full-color dua sisi bebas foto/logo." },
        { id: 6, nama: "Kartu PVC Custom", harga: 60000, gambar: "img/pvc.png", rating: "4.9", terjual: "4RB+", deskripsi: "Bahan: Plastik PVC tebal standard ID Card.<br>Biasa digunakan untuk cetak Kartu Anggota, Kartu Pengunjung, atau ID Card Karyawan." }
    ];

    window.onload = function() {
        // 1. Sinkronisasi Nama User Aktif
        const namaUser = sessionStorage.getItem('current_user');
        if (namaUser) {
            document.getElementById('user-aktif').innerText = namaUser;
        }

        // 2. Ambil data produk dari localStorage
        let dataProdukAdmin = JSON.parse(localStorage.getItem('daftar_produk'));

        // Jika localStorage kosong, buat data default awal
        if (!dataProdukAdmin || dataProdukAdmin.length === 0) {
            localStorage.setItem('daftar_produk', JSON.stringify(produkAwal));
            dataProdukAdmin = produkAwal;
        }

        // 3. Render Data ke UI Pelanggan
        const container = document.getElementById('container-produk');
        container.innerHTML = ""; 

        dataProdukAdmin.forEach(produk => {
            const formatHarga = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(produk.harga);

            const ratingFix = produk.rating || "5.0";
            const terjualFix = produk.terjual || "0";
            const gambarFix = produk.gambar || produk.foto || "img/emon.png";

            // PERBAIKAN: Fungsi klik mengirimkan parameter ID murni (produk.id)
            const cardHTML = `
                <div class="col-md-4 col-lg-3">
                    <div onclick="pilihProduk('${produk.id}')" class="product-card">
                        <div class="img-container">
                            <img src="${gambarFix}" alt="${produk.nama}" onerror="this.onerror=null; this.src='img/emon.png';">
                        </div>
                        <div class="product-title">${produk.nama}</div>
                        <div class="product-price">${formatHarga}</div>
                        <div class="product-info">
                            <span class="rating-box">⭐ ${ratingFix}</span>
                            <span>${terjualFix} terjual</span>
                        </div>
                    </div>
                </div>
            `;
            container.innerHTML += cardHTML;
        });
    };

    // PERBAIKAN SINKRONISASI: Mengirimkan parameter ID ke URL halaman detail_produk.php
    function pilihProduk(idProduk) {
        window.location.href = "detail_produk.php?id=" + idProduk; 
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>