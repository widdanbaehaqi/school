<?php
include 'koneksi.php';

$nis = $_POST['nis'];
$password = $_POST['password'];

$query = "SELECT * FROM siswa WHERE nis='$nis' AND password_siswa='$password'";
$result = mysqli_query($conn, $query);
$cek = mysqli_num_rows($result);
?>