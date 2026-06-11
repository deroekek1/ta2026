<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk - Koko Cetak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f4f4; margin: 0; overflow-x: hidden; }
        
        /* Sidebar Flex Layout */
        .sidebar {
            width: 250px; height: 100vh; background-color: #f7ff00;
            position: fixed; left: 0; top: 0; padding: 20px 0; z-index: 1000;
            display: flex; flex-direction: column; justify-content: space-between;
            box-shadow: 2px 0 5px rgba(0,0,0,0.05);
        }
        .sidebar-brand { text-align: center; font-weight: 800; font-size: 1.1rem; padding: 0 10px 10px; text-transform: uppercase; line-height: 1.2; border-bottom: 2px solid #000; margin: 0 10px 15px; color: #000; }
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
        
        /* Header Title */
        .header-title { 
            background-color: #f7ff00; padding: 12px; text-align: center; 
            font-weight: 800; border-radius: 10px; width: 50%; 
            margin: 0 auto 30px; text-transform: uppercase; 
            box-shadow: 0 4px 6px rgba(0,0,0,0.1); font-size: 1.4rem; letter-spacing: 1px; color: #000;
        }

        /* Form Card Style */
        .form-panel { background: #fff; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); overflow: hidden; }
        .form-panel-header { background-color: #d1d1d1; padding: 12px 20px; font-weight: 700; font-size: 1.1rem; border-bottom: 1px solid #ccc; color: #000; }
        .form-panel-body { padding: 30px; }

        .form-label { font-weight: 600; font-size: 0.9rem; color: #333; margin-bottom: 8px; }
        .form-control, .form-select { border-radius: 8px; padding: 10px; border: 1px solid #ccc; }
        .form-control:focus, .form-select:focus { border-color: #5a5a00; box-shadow: 0 0 0 0.2rem rgba(90, 90, 0, 0.15); }

        /* Preview Gambar Style */
        .preview-img-container { margin-top: 10px; padding: 10px; background: #f9f9f9; border: 1px dashed #ccc; border-radius: 8px; display: inline-block; }

        /* Buttons Style */
        .btn-custom { font-weight: 700; padding: 10px 25px; border-radius: 8px; border: none; transition: 0.3s; text-transform: uppercase; font-size: 0.9rem; }
        .btn-save { background-color: #000; color: #f7ff00; }
        .btn-save:hover { background-color: #333; color: #fff; }
        .btn-cancel { background-color: #6c757d; color: #fff; text-decoration: none; display: inline-block; text-align: center; }
        .btn-cancel:hover { background-color: #5a6268; color: #fff; }
    </style>
</head>
<body>

    <div class="sidebar shadow">
        <div>
            <div class="sidebar-brand">SISTEM<br>PEMESANAN</div>
            <nav class="nav flex-column">
                <a class="nav-link" href="index_admin.php"><i class="bi bi-speedometer2"></i> Dashboard</a>
                <a class="nav-link active" href="produk_admin.php"><i class="bi bi-box-seam"></i> Produk</a>
                <a class="nav-link" href="pembelian_admin.php"><i class="bi bi-cart3"></i> Pembelian</a>
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
            <div class="header-title">EDIT PRODUK</div>

            <div class="form-panel">
                <div class="form-panel-header"><i class="bi bi-pencil-square me-2"></i>Ubah Detail Produk</div>
                <div class="form-panel-body">
                    
                    <form id="formEditProduk" onsubmit="prosesUpdateProduk(event)">
                        <div class="row g-4">
                            <div class="col-md-8">
                                <label class="form-label" for="edit_nama_barang">Nama Barang</label>
                                <input type="text" id="edit_nama_barang" class="form-control" placeholder="Masukkan nama barang produk..." required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label" for="edit_harga_barang">Harga (Angka Saja)</label>
                                <input type="number" id="edit_harga_barang" class="form-control" placeholder="Contoh: 60000" min="0" required>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label" for="edit_foto_barang">Upload Gambar Produk Baru</label>
                                <input type="file" id="edit_foto_barang" class="form-control" accept="image/*">
                                <div class="mt-2 text-muted" style="font-size: 0.85rem;">
                                    <i class="bi bi-info-circle me-1"></i>Biarkan kosong jika tidak ingin mengubah gambar produk saat ini.
                                </div>
                                <div class="preview-img-container d-none" id="containerPreview">
                                    <span class="d-block mb-1 fw-semibold text-secondary" style="font-size: 0.8rem;">Preview File Terpilih:</span>
                                    <span id="textPreviewNamaFile" class="badge bg-secondary"></span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label" for="edit_deskripsi_barang">Deskripsi Produk</label>
                                <textarea id="edit_deskripsi_barang" class="form-control" rows="8" placeholder="Tuliskan spesifikasi produk..." required></textarea>
                            </div>

                            <div class="col-md-12 d-flex gap-3 mt-4">
                                <button type="submit" class="btn-custom btn-save">
                                    <i class="bi bi-check-lg me-1"></i> Update Produk
                                </button>
                                <a href="produk_admin.php" class="btn-custom btn-cancel">
                                    <i class="bi bi-x-lg me-1"></i> Batal
                                </a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let idProdukSistem = null;
        let namaFileLama = ""; 

        window.onload = function() {
            // 1. Sinkronisasi Nama Admin Aktif
            const namaUser = sessionStorage.getItem('current_user');
            if (namaUser) {
                document.getElementById('user-aktif').innerText = namaUser;
            }

            // 2. Ambil parameter ID asli dari URL
            const urlParams = new URLSearchParams(window.location.search);
            idProdukSistem = urlParams.get('id');

            // Listener preview nama file upload gambar
            document.getElementById('edit_foto_barang').addEventListener('change', function(e) {
                const container = document.getElementById('containerPreview');
                const text = document.getElementById('textPreviewNamaFile');
                if(this.files && this.files.length > 0) {
                    container.classList.remove('d-none');
                    text.innerText = this.files[0].name;
                } else {
                    container.classList.add('d-none');
                }
            });

            if (idProdukSistem !== null) {
                const daftarProduk = JSON.parse(localStorage.getItem('daftar_produk')) || [];
                
                // Cari objek produk berdasarkan properti ID uniknya
                const produk = daftarProduk.find(item => item.id.toString() === idProdukSistem.toString());

                if (produk) {
                    // Masukkan data lama produk ke dalam form field (Konsisten menggunakan properti standar)
                    document.getElementById('edit_nama_barang').value = produk.nama || "";
                    
                    // Bersihkan harga dari simbol text jika ada, pastikan murni integer angka
                    const hargaMentah = produk.harga ? produk.harga.toString().replace(/[^0-9]/g, '') : "0";
                    document.getElementById('edit_harga_barang').value = hargaMentah;
                    
                    namaFileLama = produk.gambar || "img/emon.png"; 
                    
                    // Mengubah <br> kembali ke baris baru (\n) agar nyaman diedit di textarea
                    let deskripsiMentah = produk.deskripsi || "";
                    deskripsiMentah = deskripsiMentah.replace(/<br\s*\/?>/gi, '\n');
                    document.getElementById('edit_deskripsi_barang').value = deskripsiMentah;
                } else {
                    alert("Data produk tidak ditemukan di database!");
                    window.location.href = "produk_admin.php";
                }
            } else {
                alert("Tidak ada ID produk yang dipilih untuk diedit!");
                window.location.href = "produk_admin.php";
            }
        };

        function prosesUpdateProduk(event) {
            // Mencegah halaman reload karena form submit
            event.preventDefault();

            const nama = document.getElementById('edit_nama_barang').value;
            const harga = document.getElementById('edit_harga_barang').value;
            const inputFile = document.getElementById('edit_foto_barang');
            const deskripsi = document.getElementById('edit_deskripsi_barang').value;

            let pathFotoFinal = namaFileLama; 
            if (inputFile.files && inputFile.files.length > 0) {
                pathFotoFinal = "img/" + inputFile.files[0].name;
            }

            let daftarProduk = JSON.parse(localStorage.getItem('daftar_produk')) || [];

            // Cari index data yang akan diupdate berdasarkan kesamaan ID
            const indexData = daftarProduk.findIndex(item => item.id.toString() === idProdukSistem.toString());
            
            if (indexData !== -1) {
                // Perbarui record field data lama dengan data inputan baru
                daftarProduk[indexData].nama = nama;
                daftarProduk[indexData].harga = parseInt(harga);
                daftarProduk[indexData].gambar = pathFotoFinal; // Konsisten simpan di key gambar
                daftarProduk[indexData].deskripsi = deskripsi.replace(/\n/g, '<br>'); // Simpan format line break HTML ke local storage

                localStorage.setItem('daftar_produk', JSON.stringify(daftarProduk));

                alert("Data produk sukses diperbarui secara permanen!");
                window.location.href = "produk_admin.php"; 
            } else {
                alert("Gagal memperbarui data! ID Produk ilegal atau hilang.");
            }
        }
    </script>
</body>
</html>