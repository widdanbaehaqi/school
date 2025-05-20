<?php
include '../conn/koneksi.php';

// Tangkap parameter id_kelas dari URL (GET)
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Ambil data kelas beserta guru terkait
$sql = "SELECT * FROM kelas INNER JOIN guru ON kelas.kd_guru = guru.kd_guru WHERE id_kelas = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

//query ubah level guru
$kd_guru = $row['kd_guru'];
$query_level = "UPDATE guru SET id_level = 3 WHERE kd_guru = '$kd_guru'";
mysqli_query($conn,$query_level);


if ($id) {
    $query = "DELETE FROM kelas WHERE id_kelas = $id";
    if (mysqli_query($conn, $query)) {
        header("Location: data_kelas.php?msg=deleted");
        exit();
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    echo "ID kelas tidak ditemukan.";
}
?>