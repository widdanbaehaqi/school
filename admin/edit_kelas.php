<?php
include 'header.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$sql = "SELECT * FROM kelas WHERE id_kelas = $id";
$result = mysqli_query($conn, $sql);
$kelas = mysqli_fetch_assoc($result);
?>

<!-- Konten edit kelas di sini -->
        <div class="row">
            <div class="col-md-12">
                <h1>DATA KELAS > EDIT DATA KELAS</h1>
                <p>Edit data kelas.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <form action="update_kelas.php" method="post">
                    <input type="hidden" name="id_kelas" value="<?php echo htmlspecialchars($kelas['id_kelas']); ?>">
                    <div class="form-group">
                        <label for="nama_kelas">Nama Kelas</label>
                        <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="<?php echo htmlspecialchars($kelas['nama_kelas']); ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="old_kd_guru" value="<?php echo htmlspecialchars($kelas['kd_guru']); ?>">
                        <label for="kd_guru">Wali Kelas (Guru)</label>
                        <select class="form-control" id="kd_guru" name="kd_guru" required>
                            <?php
                            $guru_query = mysqli_query($conn, "SELECT kd_guru, nama_guru FROM guru WHERE id_level = 3");
                            while ($guru = mysqli_fetch_assoc($guru_query)) {
                                $selected = ($guru['kd_guru'] == $kelas['kd_guru']) ? 'selected' : '';
                                echo "<option value=\"" . htmlspecialchars($guru['kd_guru']) . "\" $selected>" . htmlspecialchars($guru['nama_guru']) . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
                    <a href="data_kelas.php" class="btn btn-secondary mt-3">Batal</a>
                </form>
            </div>
        </div>

<?php
include 'footer.php';
?>