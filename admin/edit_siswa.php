<?php
include 'header.php';
//Tangkap Parameter nis
$nis = isset($_GET['nis']) ? $_GET['nis'] : '';

//get data from table siswa
$sql = "SELECT nis, nama_siswa, id_kelas FROM siswa WHERE nis = '$nis'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

//get data from table kelas
$sql_kelas = "SELECT id_kelas, nama_kelas FROM kelas";
$result_kelas = mysqli_query($conn, $sql_kelas);
?>
        <div class="row">
            <div class="col-md-12">
                <h1>DATA SISWA > EDIT DATA SISWA</h1>
                <p>Edit data siswa.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mt-3">
                <form action="update_siswa.php" method="post">
                    <input type="hidden" name="nis" value="<?php echo htmlspecialchars($data['nis']); ?>">
                    <div class="mb-3">
                        <label for="nama_siswa" class="form-label">Nama Siswa</label>
                        <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="<?php echo htmlspecialchars($data['nama_siswa']); ?>" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="id_kelas" class="form-label">Kelas</label>
                        <select class="form-control" id="id_kelas" name="id_kelas" required>
                            <?php
                            // Reset result pointer and loop through all kelas
                            mysqli_data_seek($result_kelas, 0);
                            while ($row = mysqli_fetch_assoc($result_kelas)) {
                                $selected = ($row['id_kelas'] == $data['id_kelas']) ? 'selected' : '';
                                echo '<option value="' . htmlspecialchars($row['id_kelas']) . '" ' . $selected . '>' . htmlspecialchars($row['nama_kelas']) . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="data_siswa.php" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>

<?php
include 'footer.php';
?>