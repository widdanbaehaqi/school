<?php
include 'header.php';

$id_kelas = $data_kelas['id_kelas'];
$query = "SELECT * FROM siswa WHERE id_kelas = $id_kelas ORDER BY nama_siswa";
$result = mysqli_query($conn, $query);

?>

<!-- Main content goes here -->
        <div class="row">
            <div class="col-md-12">
                <h1>Data Siswa Kelas - <?= $data_kelas['nama_kelas']; ?></h1>
                <p></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>NIS</th>
                            <th>Tentang Siswa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= htmlspecialchars($row['nama_siswa']) ?></td>
                            <td><?= htmlspecialchars($row['nis']) ?></td>
                            <td><?= htmlspecialchars($row['tentang_siswa']) ?></td>
                            <td>
                                <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#Modal<?= htmlspecialchars($row['nis']) ?>">Detail</a>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="Modal<?= htmlspecialchars($row['nis']) ?>" tabindex="-1" aria-labelledby="Modal<?= htmlspecialchars($row['nis']) ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header text-bg-warning p-3">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Siswa</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row mt-2 text-bg-light p-3">
                                        <div class="col-md-5"><span class="badge text-bg-warning">Nama Lengkap</span></div>
                                        <div class="col-md-7"><?= htmlspecialchars($row['nama_siswa']) ?></div>
                                    </div>
                                    <div class="row mt-2 text-bg-light p-3">
                                        <div class="col-md-5"><span class="badge text-bg-warning">Nomor Induk Siswa</span></div>
                                        <div class="col-md-7"><?= htmlspecialchars($row['nis']) ?></div>
                                    </div>
                                    <div class="row mt-2 text-bg-light p-3">
                                        <div class="col-md-12"><span class="badge text-bg-warning">Tentang Siswa</span></div>
                                    </div>
                                    <div class="row text-bg-light p-3">
                                        <div class="col-md-12"><?= htmlspecialchars($row['tentang_siswa']) ?></div>
                                    </div>
                                    <div class="row mt-2 text-bg-light p-3">
                                        <div class="col-md-12"><span class="badge text-bg-warning">Masalah Siswa</span></div>
                                    </div>
                                    <div class="row text-bg-light p-3">
                                        <div class="col-md-12"><?= htmlspecialchars($row['masalah_siswa']) ?></div>
                                    </div>
                                    <div class="row mt-2 text-bg-light p-3">
                                        <div class="col-md-12"><span class="badge text-bg-warning">Target Siswa</span></div>
                                    </div>
                                    <div class="row text-bg-light p-3">
                                        <div class="col-md-12"><?= htmlspecialchars($row['target_siswa']) ?></div>
                                    </div>
                                    <div class="row mt-2 text-bg-light p-3">
                                        <div class="col-md-5"><span class="badge text-bg-warning">Metode Belajar</span></div>
                                        <div class="col-md-7"><?= htmlspecialchars($row['metode_siswa']) ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                            </div>
                        </div>
                        </div>

                        <?php $no++; endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>

<?php
include 'footer.php';
?>