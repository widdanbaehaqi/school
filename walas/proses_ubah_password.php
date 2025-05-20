<?php
include '../conn/koneksi.php';

session_start();

// Tangkap data dari form
$password_lama = isset($_POST['password_lama']) ? $_POST['password_lama'] : '';
$password_baru = isset($_POST['password_baru']) ? $_POST['password_baru'] : '';
$konfirmasi_password = isset($_POST['konfirmasi_password']) ? $_POST['konfirmasi_password'] : '';

$kd_guru = $_SESSION['kdguru'];

echo $kd_guru;

$query = "SELECT password_guru FROM guru WHERE kd_guru = '$kd_guru'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if ($password_lama === $row['password_guru']) {
    if ($password_baru === $konfirmasi_password) {
        $update = "UPDATE guru SET password_guru = '$password_baru' WHERE kd_guru = '$kd_guru'";
        if (mysqli_query($conn, $update)) {
            header("Location: ubah_password.php?success");
            exit;
        } else {
            header("Location: ubah_password.php?error=Gagal mengubah password");
        }
    } else {
        header("Location: ubah_password.php?error=Konfirmasi password tidak cocok");
    }
} else {
    echo "Password lama salah.";
}
?>