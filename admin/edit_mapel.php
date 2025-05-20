<?php
include 'header.php';
$id = isset($_GET['id']) ? $_GET['id'] : null;
$sql = "SELECT * FROM mapel WHERE id_mapel = $id";
$result = mysqli_query($conn, $sql);
$mapel = mysqli_fetch_assoc($result);
?>

<!-- Konten halaman edit_mapel.php di sini -->
        <div class="row">
            <div class="col-md-12">
                <h1>DATA MAPEL > EDIT DATA MAPEL</h1>
                <p>Edit data mapel.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <form action="update_mapel.php" method="post">
                    <div class="form-group">
                        <label for="id_mapel">ID Mapel</label>
                        <input type="text" class="form-control" id="id_mapel" name="id_mapel" value="<?php echo htmlspecialchars($mapel['id_mapel']); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama_mapel">Nama Mapel</label>
                        <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" value="<?php echo htmlspecialchars($mapel['nama_mapel']); ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="data_mapel.php" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>


<?php
include 'footer.php';
?>