<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<!-- Konten dashboard pengguna -->
<div class="container mx-auto px-4 py-8">

<?php if (session()->getFlashdata('success')): ?>
    <!-- Tampilkan pesan selamat datang -->
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <h1 class="font-bold">Selamat datang <?= $user['nama']?></h1>
    </div>
<?php endif; ?>


    <div class="max-w-4xl mx-auto mb-5">
        <h1 class="text-3xl font-semibold mb-4">Hallo <?= $user['nama']; ?></h1>
        <!-- Konten dashboard lainnya -->
        <p class="text-lg">Selamat datang di dashboard Anda. Ini adalah tempat di mana Anda dapat melihat informasi penting tentang akun Anda dan mengelola pesanan Anda.</p>
        <!-- Tambahkan elemen lainnya sesuai dengan kebutuhan -->
    </div>

    <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-4">
        <!-- Card 1: Order Pesanan -->
        <a href="<?= base_url('/product') ?>" class="bg-white shadow rounded-lg p-6 flex flex-col justify-between hover:bg-gray-100 transition duration-300 ease-in-out">
            <h2 class="text-lg font-semibold mb-4">Order Pesanan</h2>
            <!-- Gambar dummy untuk Order Pesanan -->
            <img src="https://via.placeholder.com/300" alt="Order Pesanan" class="w-full h-32 object-cover">
        </a>
        <!-- Card 2: Kelola Pesanan -->
        <a href="<?= base_url('manage') ?>" class="bg-white shadow rounded-lg p-6 flex flex-col justify-between hover:bg-gray-100 transition duration-300 ease-in-out">
            <h2 class="text-lg font-semibold mb-4">Kelola Pesanan</h2>
            <!-- Gambar dummy untuk Kelola Pesanan -->
            <img src="https://via.placeholder.com/300" alt="Kelola Pesanan" class="w-full h-32 object-cover">
        </a>
        <!-- Card 3: Pengaturan Akun -->
        <a href="<?= base_url('settings') ?>" class="bg-white shadow rounded-lg p-6 flex flex-col justify-between hover:bg-gray-100 transition duration-300 ease-in-out">
            <h2 class="text-lg font-semibold mb-4">Pengaturan Akun</h2>
            <!-- Gambar dummy untuk Pengaturan Akun -->
            <img src="https://via.placeholder.com/300" alt="Pengaturan Akun" class="w-full h-32 object-cover">
        </a>
    </div>
</div>



<?= $this->endSection() ?>
