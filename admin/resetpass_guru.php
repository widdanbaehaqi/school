<?php
include '../conn/koneksi.php';

// Tangkap parameter id_kelas dari URL (GET)
$id = isset($_GET['id']) ? $_GET['id'] : null;

//passdefault
$passDefault = "123";
if ($id !== null) {
    $sql = "UPDATE guru SET password_guru = '$passDefault' WHERE kd_guru = '$id'";
    if (mysqli_query($conn, $sql)) {
        header("Location: data_guru.php?msg=resetpass");
        exit();
    } else {
        echo "Gagal mereset data password.";
    }
}
?>