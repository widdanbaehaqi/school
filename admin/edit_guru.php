<?php
include 'header.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;

$sql = "SELECT * FROM guru INNER JOIN mapel ON guru.id_mapel = mapel.id_mapel WHERE guru.kd_guru = '$id'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
?>

<!-- Konten halaman edit guru di sini -->
        <div class="row">
            <div class="col-md-12">
                <h1>DATA GURU > EDIT DATA GURU</h1>
                <p>Edit data guru.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <form action="update_guru.php" method="post">
                    <input type="hidden" name="kd_guru" value="<?php echo htmlspecialchars($data['kd_guru']); ?>">
                    <div class="form-group">
                        <label for="nama_guru">Nama Guru</label>
                        <input type="text" class="form-control" id="nama_guru" name="nama_guru" value="<?php echo htmlspecialchars($data['nama_guru']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="id_mapel">Mata Pelajaran</label>
                        <select class="form-control" id="id_mapel" name="id_mapel" required>
                            <?php
                            $mapel_query = mysqli_query($conn, "SELECT * FROM mapel");
                            while ($mapel = mysqli_fetch_assoc($mapel_query)) {
                                $selected = ($mapel['id_mapel'] == $data['id_mapel']) ? 'selected' : '';
                                echo "<option value=\"".htmlspecialchars($mapel['id_mapel'])."\" $selected>".htmlspecialchars($mapel['nama_mapel'])."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                </form>
            </div>
        </div>

<?php
include 'footer.php';
?>