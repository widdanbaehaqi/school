<?php
include '../conn/koneksi.php';

$nis = isset($_POST['nis']) ? $_POST['nis'] : '';
$nama_siswa = isset($_POST['nama_siswa']) ? $_POST['nama_siswa'] : '';
$tentang_siswa = isset($_POST['tentang_siswa']) ? $_POST['tentang_siswa'] : '';
$masalah_siswa = isset($_POST['masalah_siswa']) ? $_POST['masalah_siswa'] : '';
$target_siswa = isset($_POST['target_siswa']) ? $_POST['target_siswa'] : '';

$sql = "UPDATE siswa SET 
    nama_siswa = '$nama_siswa', 
    tentang_siswa = '$tentang_siswa', 
    masalah_siswa = '$masalah_siswa', 
    target_siswa = '$target_siswa' 
    WHERE nis = '$nis'";

if (mysqli_query($conn, $sql)) {
    header("Location: profil.php");
    exit();
} else {
    echo "Gagal memperbarui profil.";
}
?>