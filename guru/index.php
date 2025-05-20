<?php
include 'header.php';

$sql = "SELECT * FROM kelas INNER JOIN guru ON kelas.kd_guru = guru.kd_guru ORDER BY kelas.nama_kelas ASC";
$data_kelas = mysqli_query($conn, $sql);

?>

<!-- Main content goes here -->
        <div class="row">
            <div class="col-md-12">
                <h1>Beranda</h1>
                <p>Selamat datang Guru, <?= $data_mapel['nama_mapel']; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <ol class="list-group list-group-numbered">
                <?php while ($row = mysqli_fetch_assoc($data_kelas)): ?>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold"><?= htmlspecialchars($row['nama_kelas']) ?></div>
                        Wali Kelas: <?= htmlspecialchars($row['nama_guru']) ?>
                    </div>
                    <?php
                    $id_kelas = $row['id_kelas'];
                    $sql_siswa = "SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas = kelas.id_kelas WHERE siswa.id_kelas = '{$row['id_kelas']}'";
                    $result_siswa = mysqli_query($conn, $sql_siswa);
                    $total_siswa = mysqli_num_rows($result_siswa);
                    ?>
                    <span class="badge text-bg-primary rounded-pill">Total siswa : <?= htmlspecialchars($total_siswa) ?></span>
                </li>
                <?php endwhile; ?>
            </ol>
            </div>
        </div>

<?php
include 'footer.php';
?>