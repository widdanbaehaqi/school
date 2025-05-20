<?php include 'header.php';

$nis = $_SESSION['nis'];
$query = "SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas = kelas.id_kelas WHERE nis = '$nis'";
$result = mysqli_query($conn, $query);
$siswa = mysqli_fetch_assoc($result);

$nis_url = str_replace(' ', '+', $siswa['nama_siswa']);
?>

    <div class="card-header bg-primary text-white text-center">
        <h4 class="mb-0">Edit Profil</h4>
    </div>
    <div class="card-body">
        <div class="text-center mb-4">
            <img src="https://ui-avatars.com/api/?name=<?php echo $nis_url; ?>&background=0D8ABC&color=fff&size=100" class="rounded-circle" alt="Foto Profil" width="100" height="100">
        </div>
        <form action="update_profil.php" method="post">
            <table class="table table-hover">
            <tr>
                <th>NIS</th>
                <td>
                <input type="text" name="nis" class="form-control" value="<?php echo htmlspecialchars($siswa['nis']); ?>" readonly>
                </td>
            </tr>
            <tr>
                <th>Nama</th>
                <td>
                <input type="text" name="nama_siswa" class="form-control" value="<?php echo htmlspecialchars($siswa['nama_siswa']); ?>" required>
                </td>
            </tr>
            <tr>
                <th>Kelas</th>
                <td>
                <input type="text" name="nama_kelas" class="form-control" value="<?php echo htmlspecialchars($siswa['nama_kelas']); ?>" readonly>
                </td>
            </tr>
            <tr>
                <th>Tentang Siswa</th>
                <td>
                <textarea name="tentang_siswa" class="form-control" rows="2"><?php echo htmlspecialchars($siswa['tentang_siswa']); ?></textarea>
                </td>
            </tr>
            <tr>
                <th>Masalah Siswa</th>
                <td>
                <textarea name="masalah_siswa" class="form-control" rows="2"><?php echo htmlspecialchars($siswa['masalah_siswa']); ?></textarea>
                </td>
            </tr>
            <tr>
                <th>Target Siswa</th>
                <td>
                <textarea name="target_siswa" class="form-control" rows="2"><?php echo htmlspecialchars($siswa['target_siswa']); ?></textarea>
                </td>
            </tr>
            </table>
            <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="profil.php" class="btn btn-secondary">Kembali ke profil</a>
            </div>
        </form>
    
    <?php include 'footer.php'; ?>