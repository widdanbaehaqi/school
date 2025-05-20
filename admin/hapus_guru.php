<?php
include '../conn/koneksi.php';

// Tangkap parameter id_kelas dari URL (GET)
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id) {
    $query = "DELETE FROM guru WHERE kd_guru = '$id'";
    if (mysqli_query($conn, $query)) {
        header("Location: data_guru.php?msg=deleted");
        exit();
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    echo "ID kelas tidak ditemukan.";
}
?>