<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Koko Cetak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body{
            background:#f3f000;
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        /* WELCOME TEXT */
        .welcome-text{
            font-size:60px;
            font-weight:700;
            text-align:center;
            margin-bottom:30px;
            width: 100%;
        }

        /* CARD STYLE */
        .login-card{
            background:#5a5a00;
            border-radius:20px;
            padding:40px;
            color:#fff;
            height:100%;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .illustration-card{
            background:#5a5a00;
            border-radius:20px;
            padding:30px;
            height:100%;
            display:flex;
            align-items:center;
            justify-content:center;
        }

        /* LOGIN FORM */
        .form-control{
            background:transparent;
            border:none;
            border-bottom:1px solid #ddd;
            border-radius:0;
            color:#fff !important;
        }

        .form-control::placeholder {
            color: #ccc;
        }

        .form-control:focus{
            box-shadow:none;
            border-bottom:1px solid #f3f000;
            background:transparent;
        }

        .input-group-text{
            background:transparent;
            border:none;
            color:#fff;
        }

        .btn-login{
            background:#f3f000;
            color:#000;
            font-weight:bold;
            border-radius:8px;
            padding: 12px;
            transition: 0.3s;
        }

        .btn-login:hover{
            background:#d6d600;
            transform: translateY(-2px);
        }

        .small-text{
            font-size:14px;
        }
        
        .text-warning-custom {
            color: #f3f000 !important;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="welcome-text">Welcome!</h1>
        <div class="row g-4 justify-content-center">
            <div class="col-md-5">
                <div class="illustration-card">
                    <img src="img/logo_koko.png" 
                        class="rounded-circle" 
                        alt="Logo Koko Cetak"
                        style="max-height:240px; aspect-ratio: 1/1; object-fit: cover;">
                </div>
            </div>
            <div class="col-md-5">
                <div class="login-card">
                    <div class="text-center mb-4">
                        <h4 class="mt-3 fw-bold">SISTEM PEMESANAN<br>KOKO CETAK</h4>
                    </div>
                    <form id="loginForm">
                        <div class="input-group mb-4">
                            <span class="input-group-text">
                                <i class="bi bi-person"></i>
                            </span>
                            <input type="text" id="username" class="form-control" 
                            placeholder="Nama Pelanggan / Username" required>
                        </div>
                        <div class="input-group mb-4">
                            <span class="input-group-text">
                                <i class="bi bi-lock"></i>
                            </span>
                            <input type="password" id="password" class="form-control" 
                            placeholder="Password" required>
                        </div>
                        <button type="button" onclick="prosesLogin()" class="btn btn-login fw-bold w-100 mb-3">
                            LOGIN
                        </button>
                        <div class="text-center small-text">
                            Belum Ada Akun ? <a href="register.php" class="text-warning-custom fw-bold">Daftar disini</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function prosesLogin() {
            const userInput = document.getElementById('username').value.trim();
            const passInput = document.getElementById('password').value;

            if (userInput === "" || passInput === "") {
                alert("Silahkan isi username dan password!");
                return;
            }

            // 1. Validasi Hardcode Statis untuk Akses Utama Admin
            if (userInput === "admin" && passInput === "admin123") {
                sessionStorage.setItem('current_user', 'Admin'); 
                window.location.href = "index_admin.php"; 
                return;
            } 

            // 2. Validasi Hardcode Statis untuk Simulasi Akun Pelanggan Default
            if (userInput === "pelanggan" && passInput === "pelanggan123") {
                sessionStorage.setItem('current_user', 'Pelanggan');
                window.location.href = "index_pelanggan.php"; 
                return;
            }

            // 3. VALIDASI LOGIN BERBASIS DATA DINAMIS ARRAY ADMIN
            let daftarPelanggan = JSON.parse(localStorage.getItem('daftar_pelanggan_koko')) || [];
            const akunDitemukan = daftarPelanggan.find(pelanggan => pelanggan.nama === userInput);

            if (akunDitemukan) {
                if (passInput === akunDitemukan.password) {
                    sessionStorage.setItem('current_user', akunDitemukan.nama); 
                    alert("Login Berhasil! Selamat datang " + akunDitemukan.nama);
                    window.location.href = "index_pelanggan.php";
                    return;
                } else {
                    alert("Password yang Anda masukkan salah!");
                    return;
                }
            }

            // 4. PERBAIKAN CORE: SINKRONISASI COCOK PASA REGISTER MANDIRI TERAKHIR
            const savedUser = localStorage.getItem('user_koko');
            const savedPass = localStorage.getItem('pass_koko');

            if (userInput === savedUser && savedUser !== null) {
                if (passInput === savedPass) {
                    sessionStorage.setItem('current_user', userInput);
                    alert("Login Berhasil! Selamat datang " + userInput);
                    window.location.href = "index_pelanggan.php";
                    return;
                } else {
                    alert("Password hasil registrasi salah!");
                    return;
                }
            }

            // Jika semua skenario pencarian di atas gagal
            alert("Username tidak terdaftar! Periksa kembali ejaan nama atau registrasi ulang.");
        }

        // Jalankan login otomatis saat user menekan tombol Enter di keyboard
        document.addEventListener('keypress', function (e) {
            if (e.key === 'Enter') {
                prosesLogin();
            }
        });
    </script>
</body>
</html>