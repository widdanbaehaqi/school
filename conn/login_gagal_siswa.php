<?php
// Tangkap parameter error dari URL jika ada
$error = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : 'Login gagal. Silakan coba lagi.';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Gagal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow" style="min-width: 350px;">
            <div class="card-body text-center">
                <h3 class="card-title text-danger mb-3">Login Gagal</h3>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
                <a href="../login_siswa.html" class="btn btn-warning">Kembali ke Login</a>
            </div>
        </div>
    </div>
</body>
</html>