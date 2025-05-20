<?php
include 'header.php';
// Query
$id_kelas = $data_kelas['id_kelas'];
$sql = mysqli_query($conn,"SELECT * FROM saran INNER JOIN siswa ON saran.nis = siswa.nis WHERE siswa.id_kelas = $id_kelas ORDER BY saran.waktu DESC;");
?>

<!-- Main content goes here -->
        <div class="row">
            <div class="col-md-12">
                <h1>Saran Siswa</h1>
                <p>Kumpulan saran siswa</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="accordion" id="accordionSaran">
                    <?php while ($row = mysqli_fetch_assoc($sql)): ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#<?= htmlspecialchars($row['id_saran']) ?>" aria-expanded="true" aria-controls="<?= htmlspecialchars($row['id_saran']) ?>">
                                Saran dari #<?= htmlspecialchars($row['nama_siswa']) ?>
                            </button>
                            </h2>
                            <div id="<?= htmlspecialchars($row['id_saran']) ?>" class="accordion-collapse collapse" data-bs-parent="#accordionSaran">
                            <div class="accordion-body">
                                <p><strong>Untuk Pak/Bu Guru <?= htmlspecialchars($row['guru']) ?>,</strong> <?= htmlspecialchars($row['saran']) ?></p><br><br><?= htmlspecialchars($row['waktu']) ?>
                            </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>

<?php
include 'footer.php';
?>