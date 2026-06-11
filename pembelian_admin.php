<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pembelian - Koko Cetak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f4f4; margin: 0; overflow-x: hidden; }
        
        /* Sidebar Flex Layout - DISAMAKAN DENGAN LAPORAN */
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
        .nav-link { padding: 12px 25px; color: #000; font-weight: 600; display: flex; align-items: center; text-decoration: none; transition: 0.3s; }
        .nav-link i { font-size: 1.3rem; margin-right: 15px; }
        .nav-link:hover, .nav-link.active { background-color: rgba(0,0,0,0.05); }
        .logo-container { padding: 20px 0; width: 100%; text-align: center; }

        /* Main Content & Top Bar */
        .main-content { margin-left: 250px; width: calc(100% - 250px); min-height: 100vh; }
        .top-bar { background-color: #000; color: #fff; padding: 12px 30px; display: flex; justify-content: space-between; align-items: center; }
        .logo-top-left { display: flex; align-items: center; gap: 15px; }
        .top-bar h5 { color: #f7ff00; font-weight: 800; margin: 0; font-size: 1.2rem; }
        .admin-text { color: #f7ff00; font-size: 0.85rem; }

        /* Content Area */
        .content-body { padding: 30px; }
        .header-title { 
            background-color: #f7ff00; padding: 12px; text-align: center; 
            font-weight: 800; border-radius: 10px; width: 50%; 
            margin: 0 auto 30px; text-transform: uppercase; 
            box-shadow: 0 4px 6px rgba(0,0,0,0.1); font-size: 1.4rem; letter-spacing: 1px; color: #000;
        }

        /* Card Panel Style Mulus */
        .panel-box { background: #fff; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); overflow: hidden; }
        .panel-header { background-color: #d1d1d1; padding: 12px 20px; font-weight: 700; font-size: 1.1rem; border-bottom: 1px solid #ccc; color: #000; }
        .panel-body { padding: 25px; }

        /* Styling Tabel */
        .table-pembelian { width: 100% !important; border-collapse: collapse; }
        .table-pembelian th { font-weight: 700; color: #333; font-size: 0.9rem; border-bottom: 2px solid #cbd5e1 !important; padding: 12px 10px; text-align: center !important; background-color: #e2e8f0; }
        .table-pembelian td { vertical-align: middle; font-size: 0.88rem; color: #475569; padding: 12px 10px; border-bottom: 1px solid #e2e8f0; }

        /* Badge Status */
        .badge-status { padding: 5px 10px; border-radius: 4px; font-weight: 600; font-size: 0.8rem; text-transform: uppercase; display: inline-block; }
        .bg-bukti { background-color: #d1ecf1; color: #0c5460; }
        .bg-batal { background-color: #f8d7da; color: #721c24; }
        .bg-proses { background-color: #fff3cd; color: #856404; }
        .bg-selesai { background-color: #d4edda; color: #155724; }

        /* Tombol Aksi */
        .btn-action { font-size: 0.85rem; font-weight: 600; padding: 5px 12px; border-radius: 4px; transition: 0.2s; text-decoration: none; display: inline-block; text-align: center; border: none; }
        .btn-dtl { background-color: #17a2b8; color: #fff; }
        .btn-dtl:hover { background-color: #138496; color: #fff; }
        .btn-pay { background-color: #28a745; color: #fff; }
        .btn-pay:hover { background-color: #218838; color: #fff; }

        .page-item.active .page-link { background-color: #000 !important; border-color: #000 !important; color: #f7ff00 !important; }
        .page-link { color: #000; }
    </style>
</head>
<body>

<div class="sidebar shadow">
    <div>
        <div class="sidebar-brand">SISTEM<br>PEMESANAN</div>
        <nav class="nav flex-column">
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
            <img src="img/logo_koko.png" class="rounded-circle shadow-sm" width="55" alt="Logo">
            <h5>KOKO CETAK UV PRINTING</h5>
        </div>
        <div class="admin-text">
            Selamat Datang <span id="user-aktif">Admin</span> <i class="bi bi-person-circle ms-2"></i>
        </div>
    </div>

    <div class="content-body">
        <div class="header-title">PEMBELIAN</div>

        <div class="panel-box">
            <div class="panel-header">Data Pembelian Pelanggan</div>
            <div class="panel-body">
                
                <div class="table-responsive">
                    <table id="tabelPembelian" class="table table-hover table-pembelian">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="23%">Nama Pelanggan</th>
                                <th width="22%">Tanggal Transaksi</th>
                                <th width="20%">Total Pembayaran</th>
                                <th width="15%">Status</th>
                                <th width="15%">Aksi</th> 
                            </tr>
                        </thead>
                        <tbody id="tabel-pembelian-body"></tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function () {
        // 1. Ambil data mentah langsung dari master key data pemesanan pelanggan
        let daftarPembelian = JSON.parse(localStorage.getItem('daftar_pembelian_koko')) || [];

        // 2. Bersihkan space kosong/invalid formatting & pastikan setiap item punya ID transaksi unik
        let dataValid = daftarPembelian.map((item, index) => {
            if (!item.status || item.status.trim() === "") {
                item.status = "dalam proses"; 
            }
            // Tambahkan no_pesanan otomatis jika belum ada sebagai parameter ID yang aman
            if (!item.no_pesanan) {
                item.no_pesanan = "KC-" + (100000 + index);
            }
            return item;
        });
        localStorage.setItem('daftar_pembelian_koko', JSON.stringify(dataValid));

        // 3. Inisialisasi DataTables terlebih dahulu
        const tabelData = $('#tabelPembelian').DataTable({
            "pageLength": 5, 
            "lengthMenu": [5, 10, 25, 50],
            "ordering": false,
            "language": {
                "search": "Cari Data:",
                "lengthMenu": "Tampilkan _MENU_ data",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                "paginate": { "previous": "Sebelumnya", "next": "Selanjutnya" }
            }
        });

        // 4. Inject data secara aman menggunakan DataTables API row.add()
        tabelData.clear(); 

        dataValid.forEach((item, index) => {
            const nomor = index + 1;
            let statusSistem = item.status ? item.status.toLowerCase().trim() : "dalam proses";
            
            let classBadge = "bg-proses";
            if(statusSistem.includes("bukti") || statusSistem === "pending") { 
                classBadge = "bg-bukti"; 
                statusSistem = "sudah kirim bukti";
            }
            else if(statusSistem === "dibatalkan") { classBadge = "bg-batal"; }
            else if(statusSistem === "selesai") { classBadge = "bg-selesai"; }
            else { statusSistem = "dalam proses"; }

            // Menggunakan identitas no_pesanan sebagai ganti index array murni agar link tidak tertukar saat difilter/search
            const idParam = encodeURIComponent(item.no_pesanan);
            
            let tombolAksi = `<a href="detail_pembayaran.php?id=${idParam}" class="btn-action btn-dtl">Detail</a>`;
            
            if (statusSistem === "sudah kirim bukti" || statusSistem === "dalam proses") {
                tombolAksi = `
                    <div class="d-flex gap-1 justify-content-center">
                        <a href="detail_pembayaran.php?id=${idParam}" class="btn-action btn-dtl">Detail</a>
                        <a href="pembayaran.php?id=${idParam}" class="btn-action btn-pay">Lihat Pembayaran</a>
                    </div>
                `;
            }

            // Handling data null/undefined agar tampilan tidak merusak layout tabel
            const namaPelanggan = item.nama ? item.nama : "Tanpa Nama";
            const tanggalTransaksi = item.tanggal ? item.tanggal : "-";
            const totalBayar = item.total ? item.total : "Rp 0";

            // Tambahkan baris data secara resmi ke engine DataTables
            tabelData.row.add([
                `<div class="text-center fw-bold">${nomor}</div>`,
                `<div><i class="bi bi-person-fill me-2 text-secondary"></i>${namaPelanggan}</div>`,
                `<div class="text-center">${tanggalTransaksi}</div>`,
                `<div class="text-end pe-4 fw-semibold text-danger">${totalBayar}</div>`,
                `<div class="text-center"><span class="badge-status ${classBadge}">${statusSistem}</span></div>`,
                `<div class="text-center">${tombolAksi}</div>`
            ]);
        });

        // Render visual tabel final setelah sinkronisasi array selesai
        tabelData.draw(false);

        const namaUser = sessionStorage.getItem('current_user') || "Admin";
        document.getElementById('user-aktif').innerText = namaUser;
    });
</script>
</body>
</html>