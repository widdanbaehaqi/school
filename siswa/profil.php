<?php include 'header.php';

$nis = $_SESSION['nis'];
$query = "SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas = kelas.id_kelas WHERE nis = '$nis'";
$result = mysqli_query($conn, $query);
$siswa = mysqli_fetch_assoc($result);

$nis_url = str_replace(' ', '+', $siswa['nama_siswa']);
?>

    <div class="card-header bg-primary text-white text-center">
        <h4 class="mb-0">Profil Akun Siswa</h4>
    </div>
    <div class="card-body">
        <div class="text-center mb-4">
            <img src="https://ui-avatars.com/api/?name=<?php echo $nis_url; ?>&background=0D8ABC&color=fff&size=100" class="rounded-circle" alt="Foto Profil" width="100" height="100">
        </div>
        <table class="table table-hover">
            <tr>
            <th>NIS</th>
            <td><?php echo htmlspecialchars($siswa['nis']); ?></td>
            </tr>
            <tr>
            <th>Nama</th>
            <td><?php echo htmlspecialchars($siswa['nama_siswa']); ?></td>
            </tr>
            <tr>
            <th>Kelas</th>
            <td><?php echo htmlspecialchars($siswa['nama_kelas']); ?></td>
            </tr>
            <tr>
            <th>Tentang</th>
            <td><?php echo htmlspecialchars($siswa['tentang_siswa']); ?></td>
            </tr>
            <tr>
            <th>Masalah</th>
            <td><?php echo htmlspecialchars($siswa['masalah_siswa']); ?></td>
            </tr>
            <tr>
            <th>Target</th>
            <td><?php echo htmlspecialchars($siswa['target_siswa']); ?></td>
            </tr>
        </table>
        <div class="d-grid gap-2 mt-5">
            <a href="edit_profil.php" class="btn btn-warning">Edit Profil</a>
            <a href="index.php" class="btn btn-secondary">Kembali ke menu</a>
        </div>
    
    <?php include 'footer.php'; ?>