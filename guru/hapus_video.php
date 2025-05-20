<?php

include '../conn/koneksi.php';

session_start();
if($_SESSION['status'] != "Login"){
    header("Location: ../conn/login_guru.php");
}

$id_video = isset($_POST['id_video']) ? $_POST['id_video'] : '';

if (!empty($id_video)) {
    $query = "DELETE FROM video WHERE id_video = $id_video";
    if (mysqli_query($conn, $query)) {
        header("Location: upload_video.php");
        exit();
    } else {
        echo "Gagal menghapus video.";
    }
} else {
    echo "ID video tidak ditemukan.";
}
