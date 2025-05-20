<?php
// Koneksi ke database
include "../conn/koneksi.php";

// Ambil data dari form
$kd_guru = $_POST['kd_guru'];
$nama_guru = $_POST['nama_guru'];
$id_mapel = $_POST['id_mapel'];

// Update data ke tabel kelas (procedural)
$sql = "UPDATE guru SET nama_guru = '$nama_guru', id_mapel = $id_mapel WHERE kd_guru = '$kd_guru'";
if (mysqli_query($conn, $sql)) {
    header("Location: data_guru.php?pesan=update_sukses");
    exit();
} else {
    echo "Gagal mengupdate data: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
