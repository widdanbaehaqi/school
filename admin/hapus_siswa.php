<?php
include '../conn/koneksi.php';

$nis = isset($_GET['nis']) ? $_GET['nis'] : '';
if ($nis != '') {
    $query = "DELETE FROM siswa WHERE nis = '$nis'";
    mysqli_query($conn, $query);
    header("Location: data_siswa.php");
    exit();
}
?>