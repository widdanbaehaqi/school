<?php
include 'header.php';
?>

<!-- Konten utama modul data di sini -->
    <div class="row">
        <div class="col-md-12">
            <h1>DATA MODUL</h1>
            <p>Pengelolaan data modul.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Modul</th>
                        <th>File</th>
                        <th>Guru</th>
                        <th>Mapel</th>
                        <th>Tgl Upload</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = mysqli_query($conn, "SELECT * FROM modul INNER JOIN guru ON modul.kd_guru = guru.kd_guru ORDER BY uploaded_at DESC");
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $kd_guru = $row['kd_guru'];
                        $sql_mapel = mysqli_query($conn, "SELECT * FROM guru INNER JOIN mapel ON guru.id_mapel = mapel.id_mapel WHERE kd_guru = '$kd_guru'");
                        $row_mapel = mysqli_fetch_assoc($sql_mapel);
                        echo "<tr>
                            <td>{$no}</td>
                            <td>{$row['judul']}</td>
                            <td><a href='../uploads/{$row['filename']}' target='_blank'>Download</a></td>
                            <td>{$row['nama_guru']}</td>
                            <td>{$row_mapel['nama_mapel']}</td>
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