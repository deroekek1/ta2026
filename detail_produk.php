<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk - Koko Cetak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body { 
            font-family: 'Poppins', sans-serif; 
            background-color: #f4f4f4; 
            margin: 0; 
        }

        /* Top Bar */
        .top-bar { 
            background-color: #000; 
            color: #fff; 
            padding: 10px 30px; 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
        }

        /* Logo Pojok Kiri Atas */
        .logo-top-left {
            display: flex;
            align-items: center;
        }
        .top-bar h5 { 
            color: #f7ff00; 
            font-weight: 800; 
            margin: 0; 
            letter-spacing: 1px;
        }

        .welcome-user { color: #f7ff00; font-weight: 600; font-size: 0.9rem; }

        /* Area Konten */
        .content-body { padding: 40px 20px; max-width: 1000px; margin: 0 auto; }

        .header-title {
            background-color: #f7ff00;
            padding: 12px;
            text-align: center;
            font-weight: 800;
            border-radius: 10px;
            width: 80%;
            margin: 0 auto 30px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            text-transform: uppercase;
        }

        /* Detail Card */
        .detail-card {
            background: #fff;
            border-radius: 15px;
            padding: 40px;
            position: relative;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            border: 1px solid #ddd;
        }

        /* Button Keluar / Kembali */
        .btn-exit {
            position: absolute;
            top: -20px;
            left: 20px;
            background-color: #000;
            color: #f7ff00;
            border: none;
            padding: 8px 20px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            display: flex;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .btn-exit:hover { background-color: #333; color: #fff; }

        .product-img {
            width: 100%;
            max-width: 400px;
            border-radius: 8px;
            border: 1px solid #ccc;
            padding: 5px;
            background: #fff;
        }

        .rating-box {
            background: #f7ff00;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: bold;
            color: #000;
            display: inline-block;
        }

        .desc-title {
            font-weight: 800;
            font-size: 1.3rem;
            margin-top: 20px;
            border-bottom: 2px solid #f7ff00;
            padding-bottom: 5px;
            display: inline-block;
        }

        .desc-content {
            font-size: 0.95rem;
            line-height: 1.6;
            color: #333;
            margin-top: 15px;
        }
        .desc-content ul { padding-left: 20px; list-style-type: disc; }
        .desc-content li { margin-bottom: 5px; }
    </style>
</head>
<body>

    <div class="top-bar">
        <div class="logo-top-left">
            <img src="img/logo_koko.png" class="rounded-circle me-3" width="50">
            <h5>KOKO CETAK UV PRINTING</h5>
        </div>
        <div class="welcome-user">
            Selamat Datang <span id="user-aktif">Pengguna</span> <i class="bi bi-person-circle ms-2"></i>
        </div>
    </div>

    <div class="content-body">
        <div class="header-title">DETAIL PRODUK</div>

        <div class="detail-card">
            <a href="list_produk.php" id="btn-kembali" class="btn-exit">
                <i class="bi bi-arrow-left-circle me-2"></i> Kembali
            </a>

            <div id="detail-produk-render" class="row">
                <div class="col-12 text-center py-5">
                    <div class="spinner-border text-warning" role="status">
                        <span class="visually-hidden">Memuat data...</span>
                    </div>
                    <p class="mt-2 text-muted">Mencari detail data produk...</p>
                </div>
            </div>
            
        </div>
    </div>
    
    <script>
        window.onload = function() {
            // 1. Sinkronisasi Nama User Aktif
            const namaUser = sessionStorage.getItem('current_user');
            if (namaUser) {
                document.getElementById('user-aktif').innerText = namaUser;
                
                // Jika yang login Raynaldi (Pelanggan) atau Admin, sesuaikan tombol kembali
                if(namaUser.toLowerCase() === 'admin') {
                    document.getElementById('btn-kembali').href = "produk_admin.php";
                } else {
                    document.getElementById('btn-kembali').href = "list_produk.php";
                }
            }
            
            // 2. Ambil parameter ID dari URL
            const URLParams = new URLSearchParams(window.location.search);
            const idProdukSistem = URLParams.get('id');

            // 3. Ambil database produk lokal, jika belum ada buat data defaultnya
            let daftarProduk = JSON.parse(localStorage.getItem('daftar_produk'));
            
            if (!daftarProduk) {
                // Data default awal sistem agar tidak kosong saat diakses pertama kali
                daftarProduk = [
                    {
                        id: 1,
                        nama: "E-toll Emoney Custom Print",
                        harga: 60000,
                        gambar: "img/emon.png",
                        foto: "img/emon.png",
                        rating: "4.9",
                        terjual: "6RB+",
                        deskripsi: "Jenis Kartu: E-Money<br>Catatan:<br><ul><li>Saldo Rp. 0,-</li><li>Gratis Plastik Kartu</li></ul>Proses Cetak: UV Printing..."
                    }
                ];
                localStorage.setItem('daftar_produk', JSON.stringify(daftarProduk));
            }
            
            // 4. Cari produk dengan konversi toString() agar tipe data (String/Number) selalu cocok
            const produkTerpilih = daftarProduk.find(item => item.id.toString() === idProdukSistem?.toString());

            const containerRender = document.getElementById('detail-produk-render');

            if (produkTerpilih) {
                // Format Mata Uang Rupiah murni dari integer harga
                const formatHarga = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0
                }).format(produkTerpilih.harga);

                let deskripsiFix = produkTerpilih.deskripsi || "";
                if (!deskripsiFix.includes('<br>') && !deskripsiFix.includes('<li>')) {
                    deskripsiFix = deskripsiFix.replace(/\n/g, '<br>');
                }

                const pathFoto = produkTerpilih.gambar || produkTerpilih.foto || "img/emon.png";

                // Suntikkan data ke HTML
                containerRender.innerHTML = `
                    <div class="col-md-5 mb-4 text-center">
                        <img src="${pathFoto}" alt="${produkTerpilih.nama}" class="product-img shadow-sm" onerror="this.onerror=null; this.src='img/emon.png';">
                    </div>

                    <div class="col-md-7">
                        <h3 class="fw-bold text-dark">${produkTerpilih.nama}</h3>
                        <div class="my-3">
                            <span class="rating-box">⭐ ${produkTerpilih.rating || '5.0'}</span>
                            <small class="ms-2 text-muted">${produkTerpilih.terjual || '0'} terjual</small>
                        </div>
                        <h4 class="fw-bold mb-4 text-danger">${formatHarga}</h4>

                        <h5 class="desc-title">Deskripsi Produk</h5>
                        <div class="desc-content">
                            ${deskripsiFix}
                        </div>
                    </div>
                `;
            } else {
                // Tampilan eror jika data memang tidak ada
                containerRender.innerHTML = `
                    <div class="col-12 text-center py-5">
                        <i class="bi bi-exclamation-triangle-fill text-danger display-1"></i>
                        <h4 class="fw-bold mt-3">Produk Tidak Ditemukan!</h4>
                        <p class="text-muted">ID Produk (${idProdukSistem}) tidak terdaftar di sistem penyimpanan lokal.</p>
                    </div>
                `;
            }
        };
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>