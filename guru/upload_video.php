<?php
include 'header.php';
$kd_guru = $_SESSION['kdguru'];
$sql = "SELECT * FROM guru INNER JOIN mapel ON guru.id_mapel = mapel.id_mapel WHERE guru.kd_guru = '$kd_guru'";
$query = mysqli_query($conn, $sql);
$data_guru = mysqli_fetch_assoc($query);
?>

<!-- Main content goes here -->
        <div class="row">
            <div class="col-md-12">
                <h1>Upload Video Pembelajaran (<?= $data_guru['nama_mapel']; ?>)</h1>
                <p>Upload video pembelajaran interaktif.</p>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="alert alert-warning" role="alert">
                    Upload terlebih dahulu file video pembelajaran ke <a href="https://youtube.com" target="_blank">Youtube</a>, kemudian salin link video ke sini.
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <form action="proses_upload_video.php" method="post">
                    <input type="hidden" name="kd_guru" value="<?= htmlspecialchars($kd_guru); ?>">
                    <div class="form-group">
                        <label for="judul">Judul Video</label>
                        <input type="text" class="form-control" id="judul" name="judul" autofocus required>
                    </div>
                    <div class="form-group mt-2">
                        <label for="link">Link Video Youtube</label>
                        <input type="url" class="form-control" id="link" name="link" placeholder="https://youtube.com/..." required>
                    </div>
                    <div class="form-group mt-2">
                        <label for="kelas">Untuk Kelas</label>
                        <select class="form-control" id="kelas" name="kelas" required>
                            <option value="">Pilih Kelas</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Upload Video</button>
                </form>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <h1>Video terupload</h1>
                <?php
                $sql_video = "SELECT * FROM video WHERE kd_guru = '$kd_guru' ORDER BY id_video DESC";
                $query_video = mysqli_query($conn, $sql_video);

                if (mysqli_num_rows($query_video) > 0): ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Judul Video</th>
                                <th>Link Video</th>
                                <th>Kelas</th>
                                <th>Tanggal Upload</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($query_video)): ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['judul_video']); ?></td>
                                    <td><a href="<?= htmlspecialchars($row['link_video']); ?>" target="_blank">Lihat Video</a></td>
                                    <td><?= htmlspecialchars($row['kelas']); ?></td>
                                    <td><?= htmlspecialchars($row['upload_at']); ?></td>
                                    <td>
                                        <form action="hapus_video.php" method="post" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus video ini?');">
                                            <input type="hidden" name="id_video" value="<?= htmlspecialchars($row['id_video']); ?>">
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="alert alert-info">Belum ada video yang diupload.</div>
                <?php endif; ?>
            </div>
        </div>

<?php include 'footer.php'; ?>