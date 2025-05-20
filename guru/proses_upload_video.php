<?php
include '../conn/koneksi.php';

session_start();
if($_SESSION['status'] != "Login"){
    header("Location: ../conn/login_guru.php");
}

$judul = isset($_POST['judul']) ? $_POST['judul'] : '';
$link = isset($_POST['link']) ? $_POST['link'] : '';
$kelas = isset($_POST['kelas']) ? $_POST['kelas'] : '';
$kd_guru = isset($_POST['kd_guru']) ? $_POST['kd_guru'] : '';

$sql = "INSERT INTO video (judul_video, link_video, upload_at, kelas, kd_guru) VALUES ('$judul', '$link', NOW(), '$kelas', '$kd_guru')";
if(mysqli_query($conn, $sql)){
    header("Location: upload_video.php");
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}
?>