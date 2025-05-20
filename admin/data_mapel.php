<?php
include 'header.php';

$query = "SELECT * FROM mapel";
$result = mysqli_query($conn, $query);
?>

<!-- Konten utama halaman data_mapel.php -->
    <div class="row">
        <div class="col-md-12">
            <h1>DATA MAPEL</h1>
            <p>Pengelolaan data mapel.</p>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-5">
            <a href="tambah_mapel.php" class="btn btn-primary mb-3">Tambah Data Mapel</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID Mapel</th>
                        <th>Nama Mapel</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id_mapel']); ?></td>
                        <td><?php echo htmlspecialchars($row['nama_mapel']); ?></td>
                        <td>
                            <a href="edit_mapel.php?id=<?php echo $row['id_mapel']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="hapus_mapel.php?id=<?php echo $row['id_mapel']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
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