<?php
include 'header.php';

$query = "SELECT * FROM kelas";
$kelas = mysqli_query($conn, $query);

?>

<!-- Main content goes here -->
        <div class="row">
            <div class="col-md-12">
                <h1>Data Kelas</h1>
                <p>Menyajikan data kecenderungan metode belajar favorit dalam setiap kelas</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card-deck">
                    <?php while ($row = mysqli_fetch_assoc($kelas)) : ?>

                        <!-- Get all siswa sesuai kelas dan hitung record -->
                        <?php
                            $siswa_query = "SELECT metode_siswa FROM siswa WHERE id_kelas = '" . mysqli_real_escape_string($conn, $row['id_kelas']) . "'";
                            $siswa_result = mysqli_query($conn, $siswa_query);

                            $metode_count = [
                                'Visual' => 0,
                                'Auditory' => 0,
                                'Reading' => 0,
                                'Kinesthetic' => 0
                            ];

                            $jumlah_siswa = 0; 

                            while ($siswa = mysqli_fetch_assoc($siswa_result)) {
                                $metode = $siswa['metode_siswa'];
                                if (isset($metode_count[$metode])) {
                                    $metode_count[$metode]++;
                                    $jumlah_siswa++;
                                }
                            }

                            // Hitung persentase, hindari pembagian dengan nol
                            $visual_persen = $jumlah_siswa > 0 ? round(($metode_count['Visual'] / $jumlah_siswa) * 100, 2) : 0;
                            $auditory_persen = $jumlah_siswa > 0 ? round(($metode_count['Auditory'] / $jumlah_siswa) * 100, 2) : 0;
                            $reading_persen = $jumlah_siswa > 0 ? round(($metode_count['Reading'] / $jumlah_siswa) * 100, 2) : 0;
                            $kinesthetic_persen = $jumlah_siswa > 0 ? round(($metode_count['Kinesthetic'] / $jumlah_siswa) * 100, 2) : 0;
                        ?>

                        <div class="card mb-3" style="min-width: 200px;">
                            <div class="card-body">
                                <h5 class="card-title">Kelas <?php echo htmlspecialchars($row['nama_kelas']); ?></h5>
                                <!-- Progress Bar -->
                                 <div class="progress-stacked" style="height: 35px;">
                                    <div class="progress" role="progressbar" aria-label="Visual" aria-valuenow="<?php echo $metode_count['Visual']; ?>" aria-valuemin="0" aria-valuemax="<?php echo $jumlah_siswa; ?>" style="width: <?php echo $visual_persen; ?>%; height: 35px;">
                                        <div class="progress-bar bg-primary">Visual <?php echo $visual_persen; ?>%</div>
                                    </div>
                                    <div class="progress" role="progressbar" aria-label="Auditory" aria-valuenow="<?php echo $metode_count['Auditory']; ?>" aria-valuemin="0" aria-valuemax="<?php echo $jumlah_siswa; ?>" style="width: <?php echo $auditory_persen; ?>%; height: 35px;">
                                        <div class="progress-bar bg-success">Auditory <?php echo $auditory_persen; ?>%</div>
                                    </div>
                                    <div class="progress" role="progressbar" aria-label="Reading" aria-valuenow="<?php echo $metode_count['Reading']; ?>" aria-valuemin="0" aria-valuemax="<?php echo $jumlah_siswa; ?>" style="width: <?php echo $reading_persen; ?>%; height: 35px;">
                                        <div class="progress-bar bg-warning">Reading <?php echo $reading_persen; ?>%</div>
                                    </div>
                                    <div class="progress" role="progressbar" aria-label="Kinesthetic" aria-valuenow="<?php echo $metode_count['Kinesthetic']; ?>" aria-valuemin="0" aria-valuemax="<?php echo $jumlah_siswa; ?>" style="width: <?php echo $kinesthetic_persen; ?>%; height: 35px;">
                                        <div class="progress-bar bg-danger">Kinesthetic <?php echo $kinesthetic_persen; ?>%</div>
                                    </div>
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