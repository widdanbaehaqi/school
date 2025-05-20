<?php
include '../conn/koneksi.php';

$id_mapel = isset($_POST['id_mapel']) ? $_POST['id_mapel'] : '';
$nama_mapel = isset($_POST['nama_mapel']) ? $_POST['nama_mapel'] : '';

$sql = "INSERT INTO mapel (id_mapel, nama_mapel) VALUES ('$id_mapel', '$nama_mapel')";
    if (mysqli_query($conn, $sql)) {
            header("Location: data_mapel.php?msg=added");
            exit;
        } else {
            $error = "Gagal menambah data kelas.";
        }

?>