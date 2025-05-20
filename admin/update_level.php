<?php
include '../conn/koneksi.php';

$kd_guru = isset($_POST['kd_guru']) ? $_POST['kd_guru'] : '';
$nama_level = isset($_POST['nama_level']) ? $_POST['nama_level'] : '';

if (!empty($kd_guru) && !empty($nama_level)) {
    $sql = "UPDATE guru SET id_level = '$nama_level' WHERE kd_guru = '$kd_guru'";
    mysqli_query($conn, $sql);
    header("Location: level_users.php");
    exit();
}

?>