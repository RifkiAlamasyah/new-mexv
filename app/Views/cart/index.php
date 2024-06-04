<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<h1 class="text-lg font-bold mb-4 text-center">Troli Pesanan</h1>

<?php if (session()->getFlashdata('success')): ?>
    <div class="bg-green-500 text-white p-4 rounded mb-4 text-center">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<div class="container mx-auto p-4">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <?php foreach ($transactions as $transaction): ?>
            <div class="bg-white rounded-lg shadow-md p-4">
                <img class="w-full h-32 object-cover object-center mb-4" src="<?= base_url('img_product/'.$transaction['gambar_product']) ?>" alt="Product Image">
                <h2 class="text-xl font-semibold text-gray-800"><?= $transaction['nama_produk'] ?></h2>
                <p class="text-gray-600">Warna: <?= $transaction['warna'] ?></p>
                <p class="text-gray-600">Ukuran: <?= $transaction['ukuran'] ?></p>
                <p class="text-gray-600">Kuantitas: <?= $transaction['quantity'] ?></p>
                <p class="text-gray-600">Total Harga: <?= $transaction['total_harga'] ?></p>
                <p class="text-gray-600">Status: <?= $transaction['status'] == '0' ? 'Pending' : 'Completed' ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->endSection() ?>