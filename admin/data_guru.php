<?php
include 'header.php';

$query = "SELECT * FROM guru INNER JOIN mapel ON guru.id_mapel = mapel.id_mapel ORDER BY guru.kd_guru ASC";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query Error: " . mysqli_error($koneksi));
}
?>

        <div class="row">
            <div class="col-md-12">
                <h1>DATA GURU</h1>
                <p>Pengelolaan data guru.</p>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-5">
                <a href="tambah_guru.php" class="btn btn-primary mb-3">Tambah Data Guru</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Guru</th>
                            <th>Nama</th>
                            <th>Mapel</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo htmlspecialchars($row['kd_guru']); ?></td>
                                <td><?php echo htmlspecialchars($row['nama_guru']); ?></td>
                                <td><?php echo htmlspecialchars($row['nama_mapel']); ?></td>
                                <td>
                                    <a href="edit_guru.php?id=<?php echo urlencode($row['kd_guru']); ?>" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="resetpass_guru.php?id=<?php echo urlencode($row['kd_guru']); ?>" class="btn btn-warning btn-sm" onclick="return confirm('Yakin ingin mereset password data ini?');">Reset Password</a>
                                    <a href="hapus_guru.php?id=<?php echo urlencode($row['kd_guru']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        

<?php
include 'footer.php';
?>