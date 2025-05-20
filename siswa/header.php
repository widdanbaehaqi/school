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
    <title>Siswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #011A27 0%, #063852 100%);
            font-family: 'Segoe UI', 'Arial', sans-serif;
        }
        .card-header h1 {
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
            box-shadow: 0 4px 16px rgba(255, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
            background: #fff;
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
<div class="container my-3">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">