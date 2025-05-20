<?php
    include '../conn/koneksi.php';
    session_start();
    if($_SESSION['status'] != "Login"){
        header("Location: ../login_siswa_html");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Siswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #011A27 0%, #063852 100%);
            font-family: 'Segoe UI', 'Arial', sans-serif;
        }
        .dashboard-header h1 {
            color:rgb(255, 255, 255);
            font-size: 2.5em;
            font-weight: bold;
        }
        .dashboard-header p {
            color: #E6DF44;
            font-size: 1.2em;
        }
        .card {
            border-radius: 1rem;
            box-shadow: 0 4px 16px rgba(0,0,0,0.10);
            transition: transform 0.2s, box-shadow 0.2s;
            cursor: pointer;
            text-align: center;
            background: #fff;
        }
        .card:hover {
            transform: translateY(-8px) scale(1.04);
            box-shadow: 0 8px 24px rgba(24,90,157,0.15);
        }
        .card-img-top {
            width: 56px;
            height: 56px;
            margin: 24px auto 0 auto;
        }
        .card-title {
            color: #185a9d;
            font-weight: 600;
            font-size: 1.1em;
        }
        .card-text {
            color: #555;
            font-size: 0.95em;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="dashboard-header text-center mb-5">
            <h1>Selamat Datang, <?php echo $_SESSION['nama_siswa']; ?></h1>
            <p>Akses fitur siswa di Ruang Kosong untuk dapat menemukan metode belajar yang tepat.</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-6 col-sm-4 col-md-3">
                <a href="profil.php" class="text-decoration-none">
                    <div class="card h-100">
                        <img src="https://img.icons8.com/color/96/000000/user-male-circle--v2.png" class="card-img-top" alt="Profil Siswa">
                        <div class="card-body">
                            <h5 class="card-title">Profil Siswa</h5>
                            <p class="card-text">Lihat dan edit profil Anda</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <a href="metode_belajar.php" class="text-decoration-none">
                    <div class="card h-100">
                        <img src="https://img.icons8.com/color/96/000000/idea.png" class="card-img-top" alt="Metode Belajar">
                        <div class="card-body">
                            <h5 class="card-title">Metode Belajar</h5>
                            <p class="card-text">Temukan metode belajar yang sesuai untukmu</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <a href="modul_belajar.php" class="text-decoration-none">
                    <div class="card h-100">
                        <img src="https://img.icons8.com/color/96/000000/book-shelf.png" class="card-img-top" alt="Modul Belajar">
                        <div class="card-body">
                            <h5 class="card-title">Modul Belajar</h5>
                            <p class="card-text">Akses materi dan modul pembelajaran</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <a href="video_belajar.php" class="text-decoration-none">
                    <div class="card h-100">
                        <img src="https://img.icons8.com/color/96/000000/video.png" class="card-img-top" alt="Video Pembelajaran">
                        <div class="card-body">
                            <h5 class="card-title">Video Pembelajaran</h5>
                            <p class="card-text">Tonton video pembelajaran interaktif</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <a href="saran_belajar.php" class="text-decoration-none">
                    <div class="card h-100">
                        <img src="https://img.icons8.com/color/96/000000/speech-bubble.png" class="card-img-top" alt="Saran Pembelajaran">
                        <div class="card-body">
                            <h5 class="card-title">Saran Pembelajaran</h5>
                            <p class="card-text">Sampaikan saranmu kepada walikelas</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <a href="../conn/logout.php" class="text-decoration-none">
                    <div class="card h-100">
                        <img src="https://img.icons8.com/color/96/000000/logout-rounded-up.png" class="card-img-top" alt="Logout">
                        <div class="card-body">
                            <h5 class="card-title">Logout</h5>
                            <p class="card-text">Keluar dari akunmu</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
