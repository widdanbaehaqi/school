<?php
    include '../conn/koneksi.php';
    session_start();
    if($_SESSION['status'] != "Login"){
        header("Location: ../conn/login_guru.php");
    }

    $kd_guru = $_SESSION['kdguru'];
    $query_kelas = mysqli_query($conn, "SELECT * FROM kelas WHERE kd_guru = '$kd_guru'");
    $data_kelas = mysqli_fetch_assoc($query_kelas);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wali Kelas Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background-color:rgb(255, 255, 255);
        }
        .sidebar {
            min-width: 220px;
            max-width: 220px;
            min-height: 100vh;
            background: #2A3132;
            color: #fff;
        }
        .sidebar .nav-link {
            color:rgb(255, 255, 255);
        }
        .sidebar .nav-link.active, .sidebar .nav-link:hover {
            color: #fff;
            background: #90AFC5;
        }
        .content {
            padding: 2rem;
        }
    </style>
</head>
<body>
<div class="d-flex">
    <nav class="sidebar d-flex flex-column p-3">
        <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-4">Wali Kelas <?= $data_kelas['nama_kelas']; ?></span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="index.php" class="nav-link" aria-current="page">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-speedometer2 me-2" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5v4.707l2.146 2.147a.5.5 0 0 1-.708.708l-2.2-2.2A.5.5 0 0 1 7.5 9V4.5A.5.5 0 0 1 8 4z"/>
                        <path fill-rule="evenodd" d="M6.664 15.889A8 8 0 1 1 9.336.111a8 8 0 0 1-2.672 15.778zm.671-1.003A7 7 0 1 0 8 1a7 7 0 0 0-.665 13.886z"/>
                    </svg>
                    Beranda
                </a>
            </li>
            <li>
                <a href="data_siswa.php" class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-people me-2" viewBox="0 0 16 16">
                        <path d="M13 7c0 1.105-.672 2-1.5 2S10 8.105 10 7s.672-2 1.5-2S13 5.895 13 7zm-7 0c0 1.105-.672 2-1.5 2S3 8.105 3 7s.672-2 1.5-2S6 5.895 6 7zm7 4c0-1.105-2.239-2-5-2s-5 .895-5 2v1h10v-1z"/>
                    </svg>
                    Data Siswa <?= $data_kelas['nama_kelas']; ?>
                </a>
            </li>
            <li>
                <a href="saran_siswa.php" class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chat-dots me-2" viewBox="0 0 16 16">
                        <path d="M2 2a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2h2.586l2.707 2.707a1 1 0 0 0 1.414 0L11.414 13H14a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zm0 1h12a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-2.586l-2.707 2.707a.5.5 0 0 1-.707 0L4.586 12H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1z"/>
                        <circle cx="4.5" cy="7.5" r="1"/>
                        <circle cx="8" cy="7.5" r="1"/>
                        <circle cx="11.5" cy="7.5" r="1"/>
                    </svg>
                    Saran Siswa <?= $data_kelas['nama_kelas']; ?>
                </a>
            </li>
            <li>
                <a href="data_kelas.php" class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-building me-2" viewBox="0 0 16 16">
                        <path d="M6.5 15.5v-2h3v2a.5.5 0 0 0 1 0v-13a.5.5 0 0 0-.5-.5h-7a.5.5 0 0 0-.5.5v13a.5.5 0 0 0 1 0v-2h3v2a.5.5 0 0 0 1 0zm-4-13h7v13h-7v-13zm2 2.5a.5.5 0 0 1 1 0v1a.5.5 0 0 1-1 0v-1zm0 3a.5.5 0 0 1 1 0v1a.5.5 0 0 1-1 0v-1zm0 3a.5.5 0 0 1 1 0v1a.5.5 0 0 1-1 0v-1zm2-6a.5.5 0 0 1 1 0v1a.5.5 0 0 1-1 0v-1zm0 3a.5.5 0 0 1 1 0v1a.5.5 0 0 1-1 0v-1zm0 3a.5.5 0 0 1 1 0v1a.5.5 0 0 1-1 0v-1z"/>
                    </svg>
                    Data Kelas
                </a>
            </li>
            <li>
                <a href="upload_modul.php" class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-puzzle me-2" viewBox="0 0 16 16">
                        <path d="M3 1a2 2 0 0 1 2 2v1h1a1 1 0 0 1 1 1v1h1a2 2 0 1 1 0 4h-1v1a1 1 0 0 1-1 1H5v1a2 2 0 1 1-4 0v-1h1a1 1 0 0 1 1-1h1v-1a2 2 0 1 1 0-4h1V4a1 1 0 0 1 1-1h1V3a2 2 0 0 1 2-2z"/>
                    </svg>
                    Upload Modul
                </a>
            </li>
            <li>
                <a href="upload_video.php" class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-camera-video me-2" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M0 5a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v1.5l3.553-2.132A.5.5 0 0 1 16 4.5v7a.5.5 0 0 1-.447.5L11 9.5V11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5zm2-1a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H2zm12 2.118-3 1.8v2.164l3 1.8V6.118z"/>
                    </svg>
                    Upload Video
                </a>
            </li>
            <li>
                <a href="ubah_password.php" class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-key me-2" viewBox="0 0 16 16">
                        <path d="M3 8a5 5 0 1 1 9.9 1H15a1 1 0 0 1 0 2h-1v1a1 1 0 0 1-2 0v-1h-1v1a1 1 0 0 1-2 0v-1H8.9A5 5 0 0 1 3 8zm5-4a4 4 0 1 0 0 8 4 4 0 0 0 0-8z"/>
                        <path d="M7 8a1 1 0 1 1 2 0 1 1 0 0 1-2 0z"/>
                    </svg>
                    Ubah Password
                </a>
            </li>
        </ul>
        <hr>
        <div>
            <a href="../conn/logout.php" class="d-flex align-items-center text-white text-decoration-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-right me-2" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M6 3a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 6 3zm0 8a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 6 11zm-4-5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 2 6zm0 4a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 2 10zm10.146-2.354a.5.5 0 0 1 0 .708l-3 3a.5.5 0 1 1-.708-.708L10.293 9H3.5a.5.5 0 0 1 0-1h6.793l-2.147-2.146a.5.5 0 1 1 .708-.708l3 3z"/>
                </svg>
                <span>Logout</span>
            </a>
        </div>
    </nav>
    <div class="container-fluid mx-5 my-5">