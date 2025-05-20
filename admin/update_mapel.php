<?php
include '../conn/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_mapel = isset($_POST['id_mapel']) ? intval($_POST['id_mapel']) : 0;
    $nama_mapel = isset($_POST['nama_mapel']) ? mysqli_real_escape_string($conn, $_POST['nama_mapel']) : '';

    if ($id_mapel > 0 && !empty($nama_mapel)) {
        $sql = "UPDATE mapel SET nama_mapel='$nama_mapel' WHERE id_mapel=$id_mapel";
        if (mysqli_query($conn, $sql)) {
            header("Location: data_mapel.php?update=success");
            exit;
        } else {
            echo "Gagal mengupdate data: " . mysqli_error($conn);
        }
    } else {
        echo "Data tidak lengkap.";
    }
}

?>