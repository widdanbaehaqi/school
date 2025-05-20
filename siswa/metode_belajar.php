<?php
    include '../conn/koneksi.php';
    session_start();
    if($_SESSION['status'] != "Login"){
        header("Location: ../login_siswa_html");
    }

    $nis = $_SESSION['nis'];
    $query = "SELECT metode_siswa FROM siswa WHERE nis = '$nis'";
    $result = mysqli_query($conn, $query);
    $metode_siswa = '';
    if ($row = mysqli_fetch_assoc($result)) {
        $metode_siswa = $row['metode_siswa'];
    }

    $visual = '';
    $auditory = '';
    $reading = '';
    $kinesthetic = '';
    if ($metode_siswa == 'Visual') {
        $visual = "checked";
    }elseif ($metode_siswa == 'Auditory') {
        $auditory = "checked";
    }elseif ($metode_siswa == 'Reading') {
        $reading = "checked";
    }elseif ($metode_siswa == 'Kinesthetic') {
        $kinesthetic = "checked";
    }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pilih Metode Belajar Favorit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #011A27 0%, #063852 100%);
            font-family: 'Segoe UI', 'Arial', sans-serif;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header text-center bg-primary text-white">
                        <h3>Pilih Metode Belajar Favorit</h3>
                        <p class="mb-0">Tentukan pilihan metode belajar yang sesuai dengan gaya belajar Anda.</p>
                    </div>
                    <div class="card-body">
                        <form action="proses_metode.php" method="post">
                            <input type="hidden" name="nis" value="<?= htmlspecialchars($_SESSION['nis']) ?>">
                            <div class="row g-4">
                                <div class="col-md-6 col-lg-3">
                                    <div class="card h-100 border-primary">
                                        <div class="card-body text-center">
                                            <input type="radio" class="btn-check" name="metode" id="visual" value="Visual" <?= $visual ?> required>
                                            <label class="btn btn-outline-primary w-100" for="visual">
                                                <i class="bi bi-eye" style="font-size:2rem;"></i><br>
                                                Visual
                                            </label>
                                            <p class="mt-2 small">Belajar dengan gambar, diagram, warna.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="card h-100 border-success">
                                        <div class="card-body text-center">
                                            <input type="radio" class="btn-check" name="metode" id="auditory" value="Auditory" <?= $auditory ?> required>
                                            <label class="btn btn-outline-success w-100" for="auditory">
                                                <i class="bi bi-ear" style="font-size:2rem;"></i><br>
                                                Auditory
                                            </label>
                                            <p class="mt-2 small">Belajar dengan mendengar, diskusi, musik.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="card h-100 border-warning">
                                        <div class="card-body text-center">
                                            <input type="radio" class="btn-check" name="metode" id="reading" value="Reading" <?= $reading ?> required>
                                            <label class="btn btn-outline-warning w-100" for="reading">
                                                <i class="bi bi-book" style="font-size:2rem;"></i><br>
                                                Reading
                                            </label>
                                            <p class="mt-2 small">Belajar dengan membaca dan menulis.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="card h-100 border-danger">
                                        <div class="card-body text-center">
                                            <input type="radio" class="btn-check" name="metode" id="kinesthetic" value="Kinesthetic" <?= $kinesthetic ?> required>
                                            <label class="btn btn-outline-danger w-100" for="kinesthetic">
                                                <i class="bi bi-lightning-charge" style="font-size:2rem;"></i><br>
                                                Kinesthetic
                                            </label>
                                            <p class="mt-2 small">Belajar dengan praktik, aktivitas fisik.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary px-5">Pilih Metode</button>
                                <a href="index.php" class="btn btn-secondary px-4 ms-2">Kembali ke Menu</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS & Icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</body>
</html>