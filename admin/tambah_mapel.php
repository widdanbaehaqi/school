<?php
// Include the header file
include 'header.php';

$query = "SELECT id_mapel FROM mapel ORDER BY id_mapel DESC LIMIT 1";
$result = mysqli_query($conn, $query);
$last_id = '';
if ($row = mysqli_fetch_assoc($result)) {
    $last_id = $row['id_mapel'];
}
?>

<!-- Your page content goes here -->
    <div class="row">
        <div class="col-md-12">
            <h1>DATA MAPEL > TAMBAH DATA MAPEL</h1>
            <p>Tambah data mapel.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <form action="proses_tambah_mapel.php" method="post" class="mt-4">
                <div class="mb-3">
                    <label for="id_mapel" class="form-label">ID Mata Pelajaran</label>
                    <input type="text" class="form-control" id="id_mapel" name="id_mapel" value="<?php echo $last_id+1; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="nama_mapel" class="form-label">Nama Mata Pelajaran</label>
                    <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" autofocus required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>


<?php
// Include the footer file
include 'footer.php';
?>