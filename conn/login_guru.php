<?php
include 'koneksi.php';

$kdguru = $_POST['kdguru'];
$password = $_POST['password'];

$query = "SELECT * FROM guru WHERE kd_guru='$kdguru' AND password_guru='$password'";
$result = mysqli_query($conn, $query);
$cek = mysqli_num_rows($result);


if ($cek > 0) {

    $row = mysqli_fetch_assoc($result);

    if ($row["id_level"] == 1) {
        // Admin
        session_start();
        $_SESSION['kdguru'] = $row['kd_guru'];
        $_SESSION['nama_guru'] = $row['nama_guru'];
        $_SESSION['id_level'] = $row['id_level'];
        $_SESSION['status'] = "Login";
        header("Location: ../admin/index.php");
        exit();
    }elseif ($row["id_level"] == 2) {
        // Walas
        session_start();
        $_SESSION['kdguru'] = $row['kd_guru'];
        $_SESSION['nama_guru'] = $row['nama_guru'];
        $_SESSION['id_level'] = $row['id_level'];
        $_SESSION['status'] = "Login";
        header("Location: ../walas/index.php");
        exit();
    }elseif ($row["id_level"] == 3) {
        // Guru
        session_start();
        $_SESSION['kdguru'] = $row['kd_guru'];
        $_SESSION['nama_guru'] = $row['nama_guru'];
        $_SESSION['id_level'] = $row['id_level'];
        $_SESSION['status'] = "Login";
        header("Location: ../guru/index.php");
        exit();
    }else {
        echo "Level tidak tersedia!";
    }

}else {
    $error = "Periksa kembali kode guru dan password atau hubungi Administrator";
    header("Location: login_gagal.php?error=" . urlencode($error));
    exit();
}
?>