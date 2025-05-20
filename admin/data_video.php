<?php
    include 'header.php';
    $sql = "SELECT * FROM video";
    $result = mysqli_query($conn, $sql);
?>

    <div class="row">
        <div class="col-md-12">
            <h1>Data Video</h1>
            <p>Berikut daftar semua video yang telah diupload guru untuk siswa.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Video</th>
                        <th>Link</th>
                        <th>Tanggal Upload</th>
                        <th>Untuk Kelas</th>
                        <th>Nama Guru</th>
                        <th>Mapel</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>".$no++."</td>";
                            echo "<td>".htmlspecialchars($row['judul_video'])."</td>";
                            echo "<td><a href='".htmlspecialchars($row['link_video'])."' target='_blank'>Lihat Video</a></td>";
                            echo "<td>".htmlspecialchars($row['upload_at'])."</td>";
                            echo "<td>".htmlspecialchars($row['kelas'])."</td>";

                            $kd_guru = $row['kd_guru'];

                            $sql_guru = "SELECT nama_guru,id_mapel FROM guru WHERE kd_guru = '$kd_guru'";
                            $result_guru = mysqli_query($conn, $sql_guru);
                            $nama_guru = '';
                            $id_mapel = 0;
                            if ($row_guru = mysqli_fetch_assoc($result_guru)) {
                                $nama_guru = $row_guru['nama_guru'];
                                $id_mapel = $row_guru['id_mapel'];
                            }
                            echo "<td>".htmlspecialchars($nama_guru)."</td>";

                            $sql_mapel = "SELECT nama_mapel FROM mapel WHERE id_mapel = $id_mapel";
                            $result_mapel = mysqli_query($conn, $sql_mapel);
                            $nama_mapel = '';
                            if ($row_mapel = mysqli_fetch_assoc($result_mapel)) {
                                $nama_mapel = $row_mapel['nama_mapel'];
                            }
                            echo "<td>".htmlspecialchars($nama_mapel)."</td>";

                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' class='text-center'>Tidak ada data video.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

<?php
    include 'footer.php';
?>