<?php
include 'header.php';

//get list guru
$query_guru = "SELECT * FROM guru WHERE id_level = 3";
$result_guru = mysqli_query($conn, $query_guru);

//get last id
$query = "SELECT id_kelas FROM kelas ORDER BY id_kelas DESC LIMIT 1";
$result = mysqli_query($conn, $query);
$last_id = null;
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $last_id = $row['id_kelas'];
}
?>

    <div class="row">
        <div class="col-md-12">
            <h1>DATA KELAS > TAMBAH DATA KELAS</h1>
            <p>Tambah data kelas.</p>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-5">
            <form action="proses_tambah_kelas.php" method="post">
                <div class="form-group">
                    <label for="id_kelas">ID Kelas</label>
                    <input type="text" class="form-control" id="id_kelas" name="id_kelas" value="<?php echo $last_id+1;?>" required>
                </div>
                <div class="form-group mb-2">
                    <label for="nama_kelas">Nama Kelas</label>
                    <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" required autofocus>
                </div>
                <div class="form-group mb-2">
                    <label for="kd_guru">Wali Kelas</label>
                    <select class="form-control" id="kd_guru" name="kd_guru" required>
                        <option value="">-- Pilih Guru --</option>
                        <?php while ($guru = mysqli_fetch_assoc($result_guru)): ?>
                            <option value="<?php echo $guru['kd_guru']; ?>">
                                <?php echo htmlspecialchars($guru['nama_guru']); ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>

<?php
include 'footer.php';
?>