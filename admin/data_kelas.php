<?php
include 'header.php';
$query = "SELECT * FROM kelas";
$result = mysqli_query($conn, $query);
?>
    <div class="row">
        <div class="col-md-12">
            <h1>DATA KELAS</h1>
            <p>Pengelolaan data kelas.</p>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-5">
            <a href="tambah_kelas.php" class="btn btn-primary mb-3">Tambah Data Kelas</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID Kelas</th>
                        <th>Nama Kelas</th>
                        <th>Wali Kelas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <tr>

                            <?php
                                // Ambil nama_guru berdasarkan id_guru pada setiap baris kelas
                                $kd_guru = $row['kd_guru'];
                                $nama_guru = '';
                                if ($kd_guru) {
                                    $q_guru = mysqli_query($conn, "SELECT nama_guru FROM guru WHERE kd_guru = '$kd_guru'");
                                    if ($guru = mysqli_fetch_assoc($q_guru)) {
                                        $nama_guru = $guru['nama_guru'];
                                    }
                                }
                                // Ganti nilai nama_guru pada $row agar kolom berikutnya tetap jalan
                                $row_guru['nama_guru'] = $nama_guru;
                            ?>

                        <td><?php echo htmlspecialchars($row['id_kelas']); ?></td>
                        <td><?php echo htmlspecialchars($row['nama_kelas']); ?></td>
                        <td><?php echo htmlspecialchars($row_guru['nama_guru']); ?></td>
                        <td>
                            <a href="edit_kelas.php?id=<?php echo $row['id_kelas']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="hapus_kelas.php?id=<?php echo $row['id_kelas']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

<?php
include 'footer.php';
?>