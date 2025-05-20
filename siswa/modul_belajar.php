<?php
    include '../conn/koneksi.php';
    session_start();
    if($_SESSION['status'] != "Login"){
        header("Location: ../login_siswa_html");
    }

    $nis = $_SESSION['nis'];
    $query = "SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas = kelas.id_kelas WHERE siswa.nis = '$nis'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);

    $firstChar = substr($data['nama_kelas'], 0, 1);


?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Download Modul Belajar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <h2 class="mb-4">Daftar Modul Belajar Kelas <?= $data['nama_kelas'] ?></h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Modul</th>
                    <th>File</th>
                    <th>Guru</th>
                    <th>Mapel</th>
                    <th>Tgl Upload</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM modul INNER JOIN guru ON modul.kd_guru = guru.kd_guru WHERE kelas = '$firstChar' ORDER BY uploaded_at DESC");
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    $kd_guru = $row['kd_guru'];
                    $sql_mapel = mysqli_query($conn, "SELECT * FROM guru INNER JOIN mapel ON guru.id_mapel = mapel.id_mapel WHERE kd_guru = '$kd_guru'");
                    $row_mapel = mysqli_fetch_assoc($sql_mapel);
                    echo "<tr>
                        <td>{$no}</td>
                        <td>{$row['judul']}</td>
                        <td><a href='../uploads/{$row['filename']}' target='_blank'>Download</a></td>
                        <td>{$row['nama_guru']}</td>
                        <td>{$row_mapel['nama_mapel']}</td>
                        <td>{$row['uploaded_at']}</td>
                    </tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
        <a href="index.php" class="btn btn-secondary mt-3"><i class="bi bi-arrow-left"></i> Kembali</a>
        </div>
    </div>
    <!-- Bootstrap Icons (optional, for download icon) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>