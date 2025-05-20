<?php
include '../conn/koneksi.php';

$nis = isset($_POST['nis']) ? $_POST['nis'] : '';
$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$kelas = isset($_POST['kelas']) ? $_POST['kelas'] : '';

$sql = "INSERT INTO siswa (nis, nama_siswa, password_siswa, id_kelas) VALUES ('$nis', '$nama', '$password', '$kelas')";
if (mysqli_query($conn, $sql)) {
    header("Location: ../login_siswa.html");
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}

?>