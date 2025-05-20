<?php
include '../conn/koneksi.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id !== null) {
    $sql = "DELETE FROM mapel WHERE id_mapel = $id";
    if (mysqli_query($conn, $sql)) {
        header("Location: data_mapel.php");
        exit();
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    echo "ID tidak ditemukan.";
}
?>