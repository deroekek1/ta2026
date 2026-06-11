<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran - Koko Cetak</title>
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
        .top-bar { background-color: #000; color: #fff; padding: 12px 30px; display: flex; justify-content: space-between; align-items: center; }
        .logo-top-left { display: flex; align-items: center; gap: 15px; }
        .top-bar h5 { color: #f7ff00; font-weight: 800; margin: 0; font-size: 1.2rem; }
        .admin-text { color: #f7ff00; font-size: 0.85rem; }

        /* Content Area */
        .content-body { padding: 30px; }

        /* Header Title Melengkung Kuning */
        .header-title { 
            background-color: #f7ff00; padding: 12px; text-align: center; 
            font-weight: 800; border-radius: 10px; width: 100%; 
            margin-bottom: 30px; text-transform: uppercase; 
            box-shadow: 0 4px 6px rgba(0,0,0,0.1); font-size: 1.4rem; letter-spacing: 1px;
            color: #000;
        }

        /* Card Content Style */
        .panel-box { background: #fff; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); overflow: hidden; }
        .panel-header { background-color: #d1d1d1; padding: 12px 20px; font-weight: 700; font-size: 1.1rem; border-bottom: 1px solid #ccc; color: #000; }
        .panel-body { padding: 30px; }
        
        /* Table Detail Info */
        .table-info-pembayaran { width: 100%; margin-bottom: 25px; }
        .table-info-pembayaran th { padding: 12px 15px; font-weight: 600; font-size: 0.95rem; color: #000; width: 35%; border-bottom: 1px solid #edf2f7; }
        .table-info-pembayaran td { padding: 12px 15px; font-size: 0.95rem; color: #333; border-bottom: 1px solid #edf2f7; }

        /* Media Container Layout */
        .media-title { font-size: 0.9rem; font-weight: 700; color: #475569; text-transform: uppercase; margin-bottom: 10px; text-align: center; background: #e2e8f0; padding: 6px; border-radius: 4px; }
        .bukti-img-container { text-align: center; padding: 10px; background: #fafafa; border: 1px dashed #cbd5e1; border-radius: 8px; height: 100%; min-height: 280px; display: flex; flex-direction: column; justify-content: center; align-items: center; }
        .bukti-img { max-width: 100%; max-height: 280px; border-radius: 6px; box-shadow: 0 4px 8px rgba(0,0,0,0.05); object-fit: contain; }

        /* Form Controls */
        .form-label { font-weight: 600; font-size: 0.9rem; color: #475569; margin-bottom: 8px; }
        .form-select { border-radius: 6px; padding: 10px; border: 1px solid #cbd5e1; font-size: 0.95rem; }

        /* Action Buttons */
        .btn-update { background-color: #007bff; color: #fff; border: none; font-weight: 600; padding: 10px 20px; border-radius: 6px; transition: 0.2s; text-transform: uppercase; font-size: 0.9rem; }
        .btn-update:hover { background-color: #0069d9; }
        .btn-back { background-color: #6c757d; color: #fff; border: none; font-weight: 600; padding: 10px 20px; border-radius: 6px; text-decoration: none; transition: 0.2s; display: inline-block; text-transform: uppercase; font-size: 0.9rem; }
        .btn-back:hover { background-color: #5a6268; color: #fff; }
    </style>
</head>
<body>

<div class="sidebar shadow">
    <div>
        <div class="sidebar-brand">SISTEM<br>PEMESANAN</div>
        <nav class="nav flex-column sidebar-menu-container">
            <a class="nav-link" href="index_admin.php"><i class="bi bi-speedometer2"></i> Dashboard</a>
            <a class="nav-link" href="produk_admin.php"><i class="bi bi-box-seam"></i> Produk</a>
            <a class="nav-link active" href="pembelian_admin.php"><i class="bi bi-cart3"></i> Pembelian</a>
            <a class="nav-link" href="pelanggan.php"><i class="bi bi-people"></i> Pelanggan</a>
            <a class="nav-link" href="laporan.php"><i class="bi bi-journal-text"></i> Laporan</a>
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
            <img src="img/logo_koko.png" class="rounded-circle shadow-sm" width="55">
            <h5>KOKO CETAK UV PRINTING</h5>
        </div>
        <div class="admin-text">
            Selamat Datang <span id="user-aktif">Admin</span> <i class="bi bi-person-circle ms-2"></i>
        </div>
    </div>

    <div class="content-body">
        <div class="header-title">VALIDASI PEMBAYARAN</div>

        <div class="panel-box">
            <div class="panel-header">Verifikasi Data Transaksi Pelanggan</div>
            <div class="panel-body">
                <div class="row g-4">
                    
                    <div class="col-lg-6">
                        <table class="table-info-pembayaran">
                            <tbody>
                                <tr>
                                    <th>Nama Penyetor</th>
                                    <td id="info-nama">-</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Masuk</th>
                                    <td id="info-tanggal">-</td>
                                </tr>
                                <tr>
                                    <th>Item Cetak</th>
                                    <td id="info-produk" class="fw-semibold text-primary">-</td>
                                </tr>
                                <tr>
                                    <th>Kuantitas</th>
                                    <td id="info-qty">-</td>
                                </tr>
                                <tr>
                                    <th>Jumlah Tagihan</th>
                                    <td id="info-tagihan" class="fw-bold text-danger">-</td>
                                </tr>
                                <tr>
                                    <th>Catatan Khusus</th>
                                    <td id="info-catatan" class="text-secondary-emphasis fst-italic">-</td>
                                </tr>
                                <tr>
                                    <th>Status Saat Ini</th>
                                    <td><span id="info-status" class="badge bg-dark text-warning text-lowercase">-</span></td>
                                </tr>
                            </tbody>
                        </table>

                        <form id="formUpdateStatus" class="mt-4">
                            <div class="row">
                                <div class="col-md-10 mb-4">
                                    <label class="form-label" for="status_pembelian">Ubah Status Transaksi</label>
                                    <select id="status_pembelian" class="form-select">
                                        <option value="sudah kirim bukti">Sudah Kirim Bukti</option>
                                        <option value="diproses">Diproses</option>
                                        <option value="selesai">Selesai</option>
                                        <option value="dibatalkan">Dibatalkan</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="d-flex gap-2">
                                <button type="button" onclick="updateStatusVisual()" class="btn-update"><i class="bi bi-save me-1"></i> Perbarui</button>
                                <a href="pembelian_admin.php" class="btn-back">Kembali</a>
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <div class="media-title"><i class="bi bi-image me-1"></i> File Desain</div>
                                <div class="bukti-img-container">
                                    <img src="img/mockup_design.png" id="img-desain" class="bukti-img" alt="File Desain Pelanggan" onerror="this.src='https://placehold.co/400x500?text=Design+Cetak'">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="media-title"><i class="bi bi-receipt me-1"></i> Struk Transfer</div>
                                <div class="bukti-img-container">
                                    <img src="img/struk_bri.png" id="img-bukti" class="bukti-img" alt="Bukti Transfer Mandiri/BRI" onerror="this.src='https://placehold.co/400x500?text=Struk+Transfer'">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Variabel global untuk menyimpan data transaksi yang sedang aktif dicari
    let orderIdClean = null;

    window.onload = function() {
        // 1. Sinkronisasi Nama Admin Aktif
        const namaUser = sessionStorage.getItem('current_user') || "Admin";
        document.getElementById('user-aktif').innerText = namaUser;

        // 2. Tangkap Kode Unik Parameter URL (?id=X)
        const urlParams = new URLSearchParams(window.location.search);
        const idParam = urlParams.get('id');

        if (idParam !== null) {
            // Bersihkan parameter ID dari tanda '#' agar pencarian string akurat
            orderIdClean = idParam.replace('#', '').trim();
            
            let daftarPembelian = JSON.parse(localStorage.getItem('daftar_pembelian_koko')) || [];
            let riwayatPelanggan = JSON.parse(localStorage.getItem('riwayat_koko')) || [];

            // Cari data di master admin menggunakan fungsi .find() berdasarkan no_pesanan
            const dataAdmin = daftarPembelian.find(item => {
                let noPesananClean = item.no_pesanan ? String(item.no_pesanan).replace('#', '').trim() : "";
                return noPesananClean === orderIdClean;
            });

            if (dataAdmin) {
                // Render data dasar teks
                document.getElementById('info-nama').innerText = dataAdmin.nama || '-';
                document.getElementById('info-tanggal').innerText = dataAdmin.tanggal || '-';
                document.getElementById('info-tagihan').innerText = dataAdmin.total || 'Rp 0';
                document.getElementById('info-status').innerText = dataAdmin.status || '-';
                if(dataAdmin.status) {
                    document.getElementById('status_pembelian').value = dataAdmin.status.toLowerCase().trim();
                }

                // Cari kecocokan data detail transaksi dari riwayat pelanggan
                const dataDetail = riwayatPelanggan.find(item => {
                    let noPesananRiwayatClean = item.no_pesanan ? String(item.no_pesanan).replace('#', '').trim() : "";
                    if(noPesananRiwayatClean !== "") {
                        return noPesananRiwayatClean === orderIdClean;
                    }
                    return item.penerima === dataAdmin.nama && item.total === dataAdmin.total;
                }) || dataAdmin;

                document.getElementById('info-produk').innerText = dataDetail.produk ? dataDetail.produk : (dataAdmin.produk || "Produk Cetak Custom");
                document.getElementById('info-qty').innerText = dataDetail.jumlah ? dataDetail.jumlah + " Pcs" : (dataAdmin.jumlah ? dataAdmin.jumlah + " Pcs" : "1 Pcs");
                document.getElementById('info-catatan').innerText = dataDetail.catatan ? `"${dataDetail.catatan}"` : "Tidak ada catatan khusus.";

                // Sinkronisasi pemuatan visual gambar Base64 secara real-time
                if (dataAdmin.gambar_desain) {
                    document.getElementById('img-desain').src = dataAdmin.gambar_desain;
                } else if (dataDetail.gambar_desain) {
                    document.getElementById('img-desain').src = dataDetail.gambar_desain;
                } else {
                    document.getElementById('img-desain').src = "img/mockup_design.png";
                }

                if (dataAdmin.gambar_bukti) {
                    document.getElementById('img-bukti').src = dataAdmin.gambar_bukti;
                } else if (dataDetail.gambar_bukti) {
                    document.getElementById('img-bukti').src = dataDetail.gambar_bukti;
                } else {
                    document.getElementById('img-bukti').src = "img/struk_bri.png";
                }
            } else {
                alert("Data transaksi tidak valid atau tidak ditemukan!");
                window.location.href = "pembelian_admin.php";
            }
        } else {
            alert("ID Parameter Transaksi tidak ditemukan!");
            window.location.href = "pembelian_admin.php";
        }
    };

    function updateStatusVisual() {
        const statusBaru = document.getElementById('status_pembelian').value;
        let daftarPembelian = JSON.parse(localStorage.getItem('daftar_pembelian_koko')) || [];
        let riwayatPelanggan = JSON.parse(localStorage.getItem('riwayat_koko')) || [];

        if (daftarPembelian.length > 0 && orderIdClean !== null) {
            
            // 1. Cari indeks data pada master admin menggunakan findIndex()
            const adminIndex = daftarPembelian.findIndex(item => {
                let noPesananClean = item.no_pesanan ? String(item.no_pesanan).replace('#', '').trim() : "";
                return noPesananClean === orderIdClean;
            });

            if (adminIndex !== -1) {
                const namaTerpilih = daftarPembelian[adminIndex].nama;
                const totalTerpilih = daftarPembelian[adminIndex].total;

                // Perbarui status master pada array admin
                daftarPembelian[adminIndex].status = statusBaru.toLowerCase().trim();
                localStorage.setItem('daftar_pembelian_koko', JSON.stringify(daftarPembelian));
                
                // 2. Perbarui status dua arah pada array riwayat histori pelanggan
                riwayatPelanggan.forEach(item => {
                    let noPesananRiwayatClean = item.no_pesanan ? String(item.no_pesanan).replace('#', '').trim() : "";
                    
                    // Validasi kecocokan berdasarkan nomor pesanan unik atau fallback nama & total
                    let isMatch = false;
                    if(noPesananRiwayatClean !== "") {
                        isMatch = (noPesananRiwayatClean === orderIdClean);
                    } else {
                        isMatch = (item.penerima === namaTerpilih && item.total === totalTerpilih);
                    }

                    if (isMatch) {
                        if (statusBaru === "sudah kirim bukti") {
                            item.status = "Pending";
                        } else if (statusBaru === "diproses") {
                            item.status = "dalam proses";
                        } else {
                            item.status = statusBaru;
                        }
                    }
                });
                localStorage.setItem('riwayat_koko', JSON.stringify(riwayatPelanggan));

                document.getElementById('info-status').innerText = statusBaru.toLowerCase();
                
                alert("Status pembayaran berhasil divalidasi dan diperbarui menjadi: " + statusBaru.toUpperCase());
                window.location.href = "pembelian_admin.php";
            } else {
                alert("Gagal memperbarui! Data tidak ditemukan di sistem.");
            }
        }
    }
</script>
</body>
</html>