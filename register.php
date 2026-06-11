<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - Koko Cetak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700;900&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f7ff00;
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .reg-container {
            background-color: #4a5400;
            border-radius: 25px;
            color: white;
            padding: 40px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
        }

        .reg-title {
            color: #f7ff00;
            font-weight: 900;
            text-align: center;
            letter-spacing: 2px;
            margin-bottom: 30px;
            text-transform: uppercase;
        }

        .input-group {
            border-bottom: 2px solid rgba(255, 255, 255, 0.5);
            margin-bottom: 25px;
            align-items: center;
        }

        .input-group-text {
            background: transparent;
            border: none;
            font-size: 1.2rem;
            padding-left: 0;
            color: white;
        }

        .form-control {
            background: transparent;
            border: none;
            color: white !important;
            padding: 10px;
        }

        .form-control:focus {
            background: transparent;
            box-shadow: none;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
        }

        .btn-reg {
            background-color: #cedb00;
            border: none;
            color: black;
            font-weight: 900;
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            margin-top: 10px;
            text-transform: uppercase;
            transition: 0.3s;
        }

        .btn-reg:hover {
            background-color: #e9f500;
            transform: translateY(-2px);
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            font-size: 0.85rem;
        }

        .login-link a {
            color: #f7ff00;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center">
    <div class="reg-container">
        <h2 class="reg-title">REGISTRASI</h2>
        
        <form id="regForm">
            <div class="input-group">
                <span class="input-group-text">👤</span>
                <input type="text" id="regUsername" class="form-control" placeholder="Username / Nama Lengkap" required>
            </div>

            <div class="input-group">
                <span class="input-group-text">✉️</span>
                <input type="email" id="regEmail" class="form-control" placeholder="Email" required>
            </div>

            <div class="input-group">
                <span class="input-group-text">📞</span>
                <input type="text" id="regTelepon" class="form-control" placeholder="No. Telepon / HP" required>
            </div>

            <div class="input-group">
                <span class="input-group-text">🔒</span>
                <input type="password" id="regPassword" class="form-control" placeholder="Password" required>
            </div>

            <div class="input-group">
                <span class="input-group-text">🔒</span>
                <input type="password" id="confirmPassword" class="form-control" placeholder="Confirm Password" required>
            </div>
            
            <button type="button" onclick="simpanRegistrasi()" class="btn btn-reg">REGISTRASI</button>
        </form>

        <div class="login-link">
            Sudah punya akun? <a href="login.php">Login di sini</a>
        </div>
    </div>
</div>

<script>
    function simpanRegistrasi() {
        const username = document.getElementById('regUsername').value.trim();
        const email = document.getElementById('regEmail').value.trim();
        const telepon = document.getElementById('regTelepon').value.trim();
        const password = document.getElementById('regPassword').value;
        const confirmPass = document.getElementById('confirmPassword').value;

        // Validasi Kolom Kosong
        if (username === "" || email === "" || telepon === "" || password === "") {
            alert("Harap isi semua kolom!");
            return;
        }

        // Validasi Kesesuaian Password
        if (password !== confirmPass) {
            alert("Konfirmasi password tidak cocok!");
            return;
        }

        // --- BAGIAN SINKRONISASI KE HALAMAN ADMIN ---
        // 1. Ambil database pelanggan dari LocalStorage
        let daftarPelanggan = JSON.parse(localStorage.getItem('daftar_pelanggan_koko'));

        // PERBAIKAN: Jika kosong, buat array kosongan tanpa data dummy Cyndi/Amron lama agar sistem bersih total
        if (!daftarPelanggan) {
            daftarPelanggan = [];
        }

        // 2. PERBAIKAN CORE: Dorong objek akun lengkap BESERTA PASSWORD ke database array terpusat
        daftarPelanggan.push({
            nama: username,
            email: email,
            telepon: telepon,
            password: password // Password tersimpan sempurna ke dalam array master
        });

        // 3. Simpan kembali array ter-update ke LocalStorage
        localStorage.setItem('daftar_pelanggan_koko', JSON.stringify(daftarPelanggan));

        // --- BAGIAN SINKRONISASI AUTENTIKASI LOGIN FALLBACK ---
        localStorage.setItem('user_koko', username);
        localStorage.setItem('pass_koko', password);

        alert("Registrasi Berhasil!\nAkun Anda telah terdaftar. Silakan login menggunakan password baru Anda.");
        
        // Alihkan halaman ke login.php
        window.location.href = "login.php";
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>