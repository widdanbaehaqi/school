<?php
include '../conn/koneksi.php';

//default
$passDefault = '123';
$levelDefault = 3;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kd_guru = mysqli_real_escape_string($conn, $_POST['kd_guru']);
    $nama_guru = mysqli_real_escape_string($conn, $_POST['nama_guru']);
    $id_mapel = mysqli_real_escape_string($conn, $_POST['id_mapel']);

    $insert = "INSERT INTO guru (kd_guru,nama_guru,id_mapel,password_guru,id_level) VALUES ('$kd_guru','$nama_guru','$id_mapel','$passDefault',$levelDefault)";
    if (mysqli_query($conn, $insert)) {
            header("Location: data_guru.php?msg=added");
            exit;
        } else {
            $error = "Gagal menambah data kelas.";
        }
}
?>