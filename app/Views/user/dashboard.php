<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<?php if (session()->getFlashdata('success')): ?>
    <!-- Tampilkan pesan popup menggunakan JavaScript -->

    <div class="alert alert-success" role="alert">
        <h1>Selamat datang <?= $user['username']?></h1>
    </div>
<?php endif; ?>


<h1>Hallo <?= $user['username']; ?></h1>

<a href="<?= base_url('logout'); ?>">Logout</a>

<?= $this->endSection() ?>