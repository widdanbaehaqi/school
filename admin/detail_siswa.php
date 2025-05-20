<?php
include 'header.php';

$nis = isset($_GET['nis']) ? $_GET['nis'] : '';
$query = "SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas = kelas.id_kelas WHERE nis = '$nis'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
?>

        <div class="row">
            <div class="col-md-12">
                <h1>DATA SISWA > DETAIL DATA SISWA</h1>
                <p>Detail data siswa.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <tr>
                        <th>NIS</th>
                        <td><?php echo htmlspecialchars($data['nis']); ?></td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td><?php echo htmlspecialchars($data['nama_siswa']); ?></td>
                    </tr>
                    <tr>
                        <th>Kelas</th>
                        <td><?php echo htmlspecialchars($data['nama_kelas']); ?></td>
                </table>
                <a href="data_siswa.php" class="btn btn-primary">Kembali</a>
            </div>
        </div>


<?php
include 'footer.php';
?>