<?php
include 'header.php';
$kd_guru = isset($_GET['kd_guru']) ? $_GET['kd_guru'] : '';

$sql = "SELECT * FROM guru INNER JOIN level ON guru.id_level = level.id_level WHERE kd_guru = '$kd_guru'";
$result = mysqli_query($conn, $sql);


?>

<!-- Konten halaman edit_level.php di sini -->
        <div class="row">
            <div class="col-md-12">
                <h1>DATA LEVEL USER > EDIT LEVEL USER</h1>
                <p>Edit data level user.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <?php if ($row = mysqli_fetch_assoc($result)): ?>
                <form action="update_level.php" method="post">
                    <div class="form-group">
                        <label for="kd_guru">Kode Guru</label>
                        <input type="text" class="form-control" id="kd_guru" name="kd_guru" value="<?php echo htmlspecialchars($row['kd_guru']); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama_guru">Nama Guru</label>
                        <input type="text" class="form-control" id="nama_guru" name="nama_guru" value="<?php echo htmlspecialchars($row['nama_guru']); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama_level">Level User</label>
                        <select class="form-control" id="nama_level" name="nama_level" <?php if ($row['id_level'] == 2) echo 'disabled'; ?>>
                            <option value="1" <?php if ($row['id_level'] == 1) echo 'selected'; ?>>Administrator</option>
                            <option value="3" <?php if ($row['id_level'] == 3) echo 'selected'; ?>>Guru</option>
                        </select>
                        <?php if ($row['id_level'] == 2): ?>
                            <input type="hidden" name="nama_level" value="2">
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                </form>
                <?php else: ?>
                    <div class="alert alert-danger">Data tidak ditemukan.</div>
                <?php endif; ?>
            </div>
        </div>
<?php
include 'footer.php';
?>