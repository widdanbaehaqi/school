<?php
include 'header.php';
?>

    <div class="row">
        <div class="col-md-12">
            <h1>Ubah Password</h1>
            <p>Masukkan password lama dan password baru.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?php if (isset($_GET['success'])): ?>
                <div class="alert alert-success">Password berhasil diubah.</div>
            <?php elseif (isset($_GET['error'])): ?>
                <div class="alert alert-danger"><?php echo htmlspecialchars($_GET['error']); ?></div>
            <?php endif; ?>

            <form action="proses_ubah_password.php" method="post">
                <div class="form-group">
                    <label for="password_lama">Password Lama</label>
                    <input type="password" class="form-control" id="password_lama" name="password_lama" required>
                </div>
                <div class="form-group">
                    <label for="password_baru">Password Baru</label>
                    <input type="password" class="form-control" id="password_baru" name="password_baru" required>
                </div>
                <div class="form-group">
                    <label for="konfirmasi_password">Konfirmasi Password Baru</label>
                    <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password" required>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Ubah Password</button>
            </form>
        </div>
    </div>

<?php
include 'footer.php';
?>