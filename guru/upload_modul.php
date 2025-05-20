<?php
include 'header.php';
$kd_guru = $_SESSION['kdguru'];
$sql = "SELECT * FROM guru INNER JOIN mapel ON guru.id_mapel = mapel.id_mapel WHERE guru.kd_guru = '$kd_guru'";
$query = mysqli_query($conn, $sql);
$data_guru = mysqli_fetch_assoc($query);
?>

<!-- Main content goes here -->
        <div class="row">
            <div class="col-md-12">
                <h1>Upload Modul Pembelajaran (<?= $data_guru['nama_mapel']; ?>)</h1>
                <p>File yang dapat di upload hanya file .pdf</p>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <?php
                if (!$conn) {
                    die("Koneksi gagal: " . mysqli_connect_error());
                }

                // Proses upload file
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["modul"])) {
                    
                    $judul = mysqli_real_escape_string($conn, $_POST["judul"]);
                    $kelas = mysqli_real_escape_string($conn, $_POST["kelas"]);
                    $file = $_FILES["modul"];
                    $allowed = ['pdf'];
                    $ext = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));

                    if (in_array($ext, $allowed) && $file["type"] == "application/pdf") {
                        $filename = uniqid() . "_" . basename($file["name"]);
                        $target = "../uploads/" . $filename;
                        if (!is_dir("../uploads")) mkdir("../uploads");
                        if (move_uploaded_file($file["tmp_name"], $target)) {
                            $sql = "INSERT INTO modul (judul, filename, uploaded_at, kelas, kd_guru) VALUES ('$judul', '$filename', NOW(), '$kelas', '$kd_guru')";
                            if (mysqli_query($conn, $sql)) {
                                echo '<div class="alert alert-success">Modul berhasil diupload.</div>';
                            } else {
                                echo '<div class="alert alert-danger">Gagal menyimpan ke database.</div>';
                            }
                        } else {
                            echo '<div class="alert alert-danger">Gagal mengupload file.</div>';
                        }
                    } else {
                        echo '<div class="alert alert-danger">Hanya file PDF yang diperbolehkan.</div>';
                    }
                }
                ?>

                <form method="post" enctype="multipart/form-data" class="mb-4">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Modul</label>
                        <input type="text" name="judul" id="judul" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="modul" class="form-label">File PDF</label>
                        <input type="file" name="modul" id="modul" class="form-control" accept="application/pdf" required>
                    </div>
                    <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas</label>
                        <select name="kelas" id="kelas" class="form-control" required>
                            <option value="">Pilih Kelas</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Modul</th>
                            <th>File</th>
                            <th>Kelas</th>
                            <th>Tanggal Upload</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM modul WHERE kd_guru = '$kd_guru' ORDER BY uploaded_at DESC");
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                <td>{$no}</td>
                                <td>{$row['judul']}</td>
                                <td><a href='../uploads/{$row['filename']}' target='_blank'>Download</a></td>
                                <td>{$row['kelas']}</td>
                                <td>{$row['uploaded_at']}</td>
                            </tr>";
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>



<?php
include 'footer.php';
?>