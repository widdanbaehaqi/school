<?php
// update.siswa.php

// Include database connection
include '../conn/koneksi.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get POST data and sanitize
    $nis     = isset($_POST['nis']) ? trim($_POST['nis']) : '';
    $nama_siswa    = isset($_POST['nama_siswa']) ? trim($_POST['nama_siswa']) : '';
    $id_kelas   = isset($_POST['id_kelas']) ? trim($_POST['id_kelas']) : '';

    // Validate required fields
    if ($nis && $nama_siswa && $id_kelas) {
        // Escape input for SQL
        $nis    = mysqli_real_escape_string($conn, $nis);
        $nama_siswa   = mysqli_real_escape_string($conn, $nama_siswa);
        $id_kelas  = mysqli_real_escape_string($conn, $id_kelas);

        // Update query (order: nis, nama_siswa, id_kelas)
        $sql = "UPDATE siswa SET nama_siswa='$nama_siswa', id_kelas='$id_kelas' WHERE nis='$nis'";
        if (mysqli_query($conn, $sql)) {
            header("Location: data_siswa.php?msg=updated");
            exit;
        } else {
            $error = "Gagal memperbarui data siswa.";
        }
    } else {
        $error = "Semua field wajib diisi.";
    }
}