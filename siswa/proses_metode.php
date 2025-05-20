<?php
include '../conn/koneksi.php';

$nis = isset($_POST['nis']) ? $_POST['nis'] : '';
$metode = isset($_POST['metode']) ? $_POST['metode'] : '';

if ($nis && $metode) {
    $nis = mysqli_real_escape_string($conn, $nis);
    $metode = mysqli_real_escape_string($conn, $metode);

    $query = "UPDATE siswa SET metode_siswa = '$metode' WHERE nis = '$nis'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal mengupdate metode.";
    }
} else {
    echo "Data tidak lengkap.";
}

?>