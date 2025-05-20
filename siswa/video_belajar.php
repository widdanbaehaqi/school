<?php
// video_belajar.php
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
    <title>Video Pembelajaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <h1 class="text-center mb-5">Video Pembelajaran</h1>
        <div class="row g-4 justify-content-center">
            <?php
                $result = mysqli_query($conn, "SELECT * FROM video INNER JOIN guru ON video.kd_guru = guru.kd_guru WHERE kelas = '$firstChar' ORDER BY id_video DESC");
            ?>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm h-100">
                        <div class="ratio ratio-16x9">
                            <?php
                                // Extract YouTube video ID from the link
                                preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/', $row['link_video'], $matches);
                                $youtube_id = $matches[1] ?? '';
                                if ($youtube_id):
                            ?>
                                <iframe src="https://www.youtube.com/embed/<?php echo htmlspecialchars($youtube_id); ?>" allowfullscreen class="w-100 h-100 border-0"></iframe>
                            <?php else: ?>
                                <div class="text-danger">Invalid YouTube link</div>
                            <?php endif; ?>
                        </div>
                        <div class="card-body">
                            <table class="table table-borderless">
                                <tr>
                                    <td colspan="2">
                                        <h5 class="card-title"><?php echo htmlspecialchars($row['judul_video']); ?></h5>
                                    </td>
                                </tr>
                                <?php 
                                    $mapelResult = mysqli_query($conn, "SELECT nama_mapel FROM guru INNER JOIN mapel ON guru.id_mapel = mapel.id_mapel WHERE kd_guru = '{$row['kd_guru']}'");
                                    $mapelRow = mysqli_fetch_assoc($mapelResult);
                                    ?>
                                    <tr>
                                        <th>Mata Pelajaran</th>
                                        <td><?php echo htmlspecialchars($mapelRow['nama_mapel'] ?? '-'); ?></td>
                                    </tr>
                                    <?php
                                ?>
                                <tr>
                                    <th>Guru</th>
                                    <td><?php echo htmlspecialchars($row['nama_guru']); ?></td>
                                </tr>
                                <tr>
                                    <th>Upload</th>
                                    <td><?php echo htmlspecialchars($row['upload_at']); ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>