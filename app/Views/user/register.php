<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row justify-content-between align-items-center min-vh-100">

        <!-- Gambar di sebelah kiri -->
        <div class="col-md-7">
        <img src="/assets/icon/login.png" alt="Gambar Kiri" class="img-fluid rounded-start">
        </div>

        <!-- Formulir login di sebelah kanan -->
        <div class="col-md-5 mt-5">
            <div class="card">
                <div class="card-body">
         
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php foreach ($error as $err): ?>
                            <p><?= $err ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                    <?= form_open('/register', ['class' => 'form']); ?>
                    
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama:</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat :</label>
                        <input type="text" name="alamat" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="no_telepon" class="form-label">No Telepon :</label>
                        <input type="number" name="no_telepon" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                        <div class = "d-flex flex">
                        <div class="form-check me-3">
                            <input type="radio" name="jenis_kelamin" value="laki-laki" class="form-check-input" required>
                            <label class="form-check-label">Laki-Laki</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="jenis_kelamin" value="perempuan" class="form-check-input" required>
                            <label class="form-check-label">Perempuan</label>
                        </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Konfirmasi Password:</label>
                        <input type="password" name="confirm_password" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Sign, in</button>
                    <?= form_close(); ?>

                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection() ?>