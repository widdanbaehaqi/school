<?php
include 'header.php';

$sql_guru = "SELECT * FROM guru INNER JOIN level ON guru.id_level = level.id_level";
$result_guru = mysqli_query($conn, $sql_guru);

$sql = "SELECT * FROM level";
$result = mysqli_query($conn, $sql);

?>

<!-- Konten halaman level_users.php di sini -->
    <div class="row">
        <div class="col-md-12">
            <h1>DATA LEVEL USERS</h1>
            <p>Informasi level users</p>
                <div class="alert alert-warning" role="alert">
                    Jika status level sebagai walikelas, tidak dapat diubah menjadi administrator.
                </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID Level</th>
                        <th>Nama Level</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$row['id_level']}</td>";
                        echo "<td>{$row['nama_level']}</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-9">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Kode Guru</th>
                        <th>Nama Guru</th>
                        <th>Nama Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result_guru)) {
                        ?>
                        <tr>
                            <td><?= htmlspecialchars($row['kd_guru']) ?></td>
                            <td><?= htmlspecialchars($row['nama_guru']) ?></td>
                            <td><?= htmlspecialchars($row['nama_level']) ?></td>
                            <td>
                                <?php if ($row['id_level'] == 2): ?>
                                    <button class="btn btn-warning btn-sm" disabled>Edit</button>
                                <?php else: ?>
                                    <a href="edit_level.php?kd_guru=<?= urlencode($row['kd_guru']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<?php
include 'footer.php';
?>