<?php
include '../conn/koneksi.php';

//Tangkap value form
$nis = isset($_POST['nis']) ? $_POST['nis'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

//sql get match data from table siswa
$query = "SELECT * FROM siswa WHERE nis = $nis AND password_siswa = '$password'";
$result = mysqli_query($conn, $query);

$cek = mysqli_num_rows($result);

if ($cek > 0) {
    $row = mysqli_fetch_assoc($result);
    session_start();
    $_SESSION['nis'] = $row['nis'];
    $_SESSION['nama_siswa'] = $row['nama_siswa'];
    $_SESSION['status'] = 'Login';
    header("Location: ../siswa/index.php");
    exit();
} else {
    $error = "Periksa kembali NIS dan PASSWORD anda atau hubungi administrator";
    header("Location: login_gagal_siswa.php?error=" . urlencode($error));
    exit();
}


?>