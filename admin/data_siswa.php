<?php
include 'header.php';

$search = '';
if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $query = "SELECT siswa.nis, siswa.nama_siswa, kelas.nama_kelas FROM siswa INNER JOIN kelas ON siswa.id_kelas = kelas.id_kelas WHERE nis = $search;";
}else {
    $query = "SELECT siswa.nis, siswa.nama_siswa, kelas.nama_kelas FROM siswa INNER JOIN kelas ON siswa.id_kelas = kelas.id_kelas ORDER BY siswa.id_kelas,siswa.nama_siswa;";
}
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query Error: " . mysqli_error($conn));
}
?>

        <div class="row">
            <div class="col-md-12">
                <h1>DATA SISWA</h1>
                <p>Pengelolaan data siswa.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <form method="GET" action="data_siswa.php">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari siswa berdasarkan NIS..." name="search" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                        <button class="btn btn-outline-secondary" type="submit">Cari</button>
                    </div>
                </form>
            </div>
            <div class="col-md-2">
                <a href="data_siswa.php" class="btn btn-outline-secondary">Refresh</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Contoh data statis, ganti dengan data dari database jika diperlukan -->
                        <?php
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo htmlspecialchars($row['nis']); ?></td>
                                <td><?php echo htmlspecialchars($row['nama_siswa']); ?></td>
                                <td><?php echo htmlspecialchars($row['nama_kelas']); ?></td>
                                <td>
                                    <a href="edit_siswa.php?nis=<?php echo urlencode($row['nis']); ?>" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="detail_siswa.php?nis=<?php echo urlencode($row['nis']); ?>" class="btn btn-warning btn-sm">Detail</a>
                                    <a href="hapus_siswa.php?nis=<?php echo urlencode($row['nis']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus siswa ini?');">Hapus</a>
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