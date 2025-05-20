<?php
include '../conn/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_kelas = mysqli_real_escape_string($conn, $_POST['id_kelas']);
    $nama_kelas = mysqli_real_escape_string($conn, $_POST['nama_kelas']);
    $kd_guru = mysqli_real_escape_string($conn, $_POST['kd_guru']);

    $insert = "INSERT INTO kelas (id_kelas,nama_kelas,kd_guru) VALUES ('$id_kelas','$nama_kelas','$kd_guru')";
    if (mysqli_query($conn, $insert)) {
            mysqli_query($conn, "UPDATE guru SET id_level = 2 WHERE kd_guru = '$kd_guru'");
            header("Location: data_kelas.php?msg=added");
            exit;
        } else {
            $error = "Gagal menambah data kelas.";
        }
}

?>