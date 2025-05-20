<?php
// saran_belajar.php
include '../conn/koneksi.php';
session_start();
if($_SESSION['status'] != "Login"){
    header("Location: ../login_siswa_html");
}

// Proses form jika disubmit
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $saran = trim($_POST['saran'] ?? '');
    $guru = trim($_POST['guru'] ?? '');
    if ($saran && $guru) {
        // Simpan ke database
        $nis = $_SESSION['nis'];
        date_default_timezone_set('Asia/Jakarta');
        $waktu = date('Y-m-d H:i:s');

        $sql = "INSERT INTO saran (nis, guru, saran, waktu) VALUES ('$nis', '$guru', '$saran', '$waktu')";
        mysqli_query($conn, $sql);

        $message = 'Saran berhasil dikirim!';
    } else {
        $message = 'Semua kolom harus diisi.';
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Saran Pembelajaran untuk Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Saran Pembelajaran untuk Guru</h4>
                    </div>
                    <div class="card-body">
                        <?php if ($message): ?>
                            <div class="alert <?= strpos($message, 'berhasil') !== false ? 'alert-success' : 'alert-danger' ?>" role="alert">
                                <?= htmlspecialchars($message) ?>
                            </div>
                        <?php endif; ?>
                        <form method="post">
                            <div class="mb-3">
                                <label for="guru" class="form-label">Nama Guru</label>
                                <input type="text" class="form-control" id="guru" name="guru" required>
                            </div>
                            <div class="mb-3">
                                <label for="saran" class="form-label">Saran Pembelajaran</label>
                                <textarea class="form-control" id="saran" name="saran" rows="4" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Kirim Saran</button>
                            <a href="index.php" class="btn btn-secondary ms-2">Kembali ke Menu</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>