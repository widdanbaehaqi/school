<?php
include '../conn/koneksi.php';

$sql = "SELECT * FROM kelas";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Akun Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Daftar Akun Siswa</h4>
                    </div>
                    <div class="card-body">
                        <form id="formRegister" method="post" action="proses_register.php">
                            <div class="mb-3">
                                <label for="nis" class="form-label">NIS</label>
                                <input type="number" class="form-control" id="nis" name="nis" autofocus required>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="kelas" class="form-label">Kelas</label>
                                <select class="form-select" id="kelas" name="kelas" required>
                                    <option value="" selected disabled>Pilih Kelas</option>
                                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                        <option value="<?php echo htmlspecialchars($row['id_kelas']); ?>">
                                            <?php echo htmlspecialchars($row['nama_kelas']); ?>
                                        </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Daftar</button>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <small>Sudah punya akun? <a href="../login_siswa.html">Login di sini</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>