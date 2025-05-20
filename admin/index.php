<?php
include 'header.php';

$sql_siswa = "SELECT * FROM siswa";
$sql_guru = "SELECT * FROM guru";
$sql_kelas = "SELECT * FROM kelas";
$sql_mapel = "SELECT * FROM mapel";
$sql_modul = "SELECT * FROM modul";
$sql_level = "SELECT * FROM level";

$result_siswa = mysqli_query($conn, $sql_siswa);
$result_guru = mysqli_query($conn, $sql_guru);
$result_kelas = mysqli_query($conn, $sql_kelas);
$result_mapel = mysqli_query($conn, $sql_mapel);
$result_modul = mysqli_query($conn, $sql_modul);
$result_level = mysqli_query($conn, $sql_level);

$jml_siswa = mysqli_num_rows($result_siswa);
$jml_guru = mysqli_num_rows($result_guru);
$jml_kelas = mysqli_num_rows($result_kelas);
$jml_mapel = mysqli_num_rows($result_mapel);
$jml_modul = mysqli_num_rows($result_modul);
$jml_level = mysqli_num_rows($result_level);

?>
    <div class="row">
        <div class="col-md-12">
            <h1>Selamat Datang, <?php echo $_SESSION['nama_guru']; ?></h1>
            <p>Di beranda administrator, gunakan menu disamping sebagai navigasi.</p>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <h5 class="card-header text-bg-primary">Akun Terdaftar</h5>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $jml_siswa; ?> Siswa & <?php echo $jml_guru; ?> Guru</h5>
                    <p class="card-text"><?php echo $jml_siswa+$jml_guru; ?> akun total yang telah terdaftar.</p>
                    <a href="data_siswa.php" class="btn btn-secondary">Kelola Data Siswa</a>
                    <a href="data_guru.php" class="btn btn-secondary">Kelola Data Guru</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <h5 class="card-header text-bg-success">Kelas</h5>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $jml_kelas; ?> Kelas </h5>
                    <p class="card-text">total yang telah terdaftar.</p>
                    <a href="data_kelas.php" class="btn btn-secondary">Kelola Data Kelas</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
            <div class="col-md-6">
                <div class="card">
                <h5 class="card-header text-bg-warning">Mata Pelajaran dan Modul</h5>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $jml_mapel; ?> Mata Pelajaran & <?php echo $jml_modul; ?> Modul</h5>
                    <p class="card-text">yang telah terupload.</p>
                    <a href="data_mapel.php" class="btn btn-secondary">Kelola Data mapel</a>
                    <a href="data_modul.php" class="btn btn-secondary">Kelola Data modul</a>
                </div>
                </div>
            </div>
            <div class="col-md-6">
            <div class="card">
                <h5 class="card-header text-bg-danger">Level Users</h5>
                <div class="card-body">
                    <h5 class="card-title">Ada <?php echo $jml_level; ?> Level Pengguna</h5>
                    <a href="data_level.php" class="btn btn-secondary">Kelola Data Level</a>
                </div>
            </div>
            </div>
    </div>

<?php
include 'footer.php';
?>