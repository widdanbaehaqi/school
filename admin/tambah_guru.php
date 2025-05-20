<?php
include 'header.php';

$query = "SELECT * FROM mapel";
$result = mysqli_query($conn, $query);

$lastGuruQuery = "SELECT kd_guru FROM guru ORDER BY kd_guru DESC LIMIT 1";
$lastGuruResult = mysqli_query($conn, $lastGuruQuery);
$lastKdGuru = 'KD01';
if ($lastGuruResult && mysqli_num_rows($lastGuruResult) > 0) {
    $lastGuruRow = mysqli_fetch_assoc($lastGuruResult);
    $lastKdGuru = $lastGuruRow['kd_guru'];
}
//pecah KD dan 001
$kdGuruPrefix = substr($lastKdGuru, 0, 3);
$kdGuruNumber = substr($lastKdGuru, 3);
//increment dan STR
$kdGuruNumber+1;
$kdGuruBaru = $kdGuruPrefix . str_pad((int)$kdGuruNumber + 1, 2, '0', STR_PAD_LEFT);

?>

<!-- Konten halaman tambah guru di sini -->

    <div class="row">
        <div class="col-md-12">
            <h1>DATA GURU > TAMBAH DATA GURU</h1>
            <p>Tambah data guru.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
                    <form action="proses_tambah_guru.php" method="POST">
            <div class="form-group">
                <label for="kd_guru">Kode Guru</label>
                <input type="text" class="form-control" id="kd_guru" name="kd_guru" value="<?php echo $kdGuruBaru; ?>" required>
            </div>
            <div class="form-group">
                <label for="nama_guru">Nama Guru</label>
                <input type="text" class="form-control" id="nama_guru" name="nama_guru" required>
            </div>
            <div class="form-group">
                <label for="id_mapel">Mata Pelajaran</label>
                <select class="form-control" id="id_mapel" name="id_mapel" required>
                    <option value="">-- Pilih Mata Pelajaran --</option>
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                        <option value="<?php echo htmlspecialchars($row['id_mapel']); ?>">
                            <?php echo htmlspecialchars($row['nama_mapel']); ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Tambah Guru</button>
        </form>
        </div>
    </div>


<?php
include 'footer.php';
?>