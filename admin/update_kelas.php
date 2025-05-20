<?php
// Koneksi ke database
include "../conn/koneksi.php";

// Ambil data dari form
$old_kd_guru = $_POST['old_kd_guru'];
$id_kelas = $_POST['id_kelas'];
$nama_kelas = $_POST['nama_kelas'];
$kd_guru = $_POST['kd_guru'];

if ($kd_guru != $old_kd_guru) {
    // Update kd_guru di tabel kelas
    $update_guru_sql = "UPDATE kelas SET kd_guru = '$kd_guru' WHERE id_kelas = '$id_kelas'";
    mysqli_query($conn, $update_guru_sql);
    
    // Update level pada table guru
    $update_level_old_guru = "UPDATE guru SET id_level = 3 WHERE kd_guru = '$old_kd_guru'";    
    mysqli_query($conn, $update_level_old_guru);
    $update_level_guru = "UPDATE guru SET id_level = 2 WHERE kd_guru = '$kd_guru'";    
    mysqli_query($conn, $update_level_guru);
}

// Update data ke tabel kelas (procedural)
$sql = "UPDATE kelas SET nama_kelas = '$nama_kelas' WHERE id_kelas = '$id_kelas'";
if (mysqli_query($conn, $sql)) {
    header("Location: data_kelas.php?pesan=update_sukses");
    exit();
} else {
    echo "Gagal mengupdate data: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
