<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row justify-content-between align-items-center min-vh-100">
        <!-- Gambar di sebelah kiri -->
        <div class="col-md-7">
            <img src="/assets/icon/login.png" alt="Gambar Kiri" class="img-fluid rounded-start">
        </div>

        <!-- Formulir login di sebelah kanan -->
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $error; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    <?php elseif (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>

                    <?= form_open('/login'); ?>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                        
                    <button type="submit" class="btn btn-primary mb-3" style = "width : 100%;">Login</button>
                    <?= form_close(); ?>
                    <span class = "mt-5">Belum punya akun ? <a href="/register">Sign'up</a></span>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection() ?>