<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<!-- Konten dashboard pengguna -->
<div class="container mx-auto px-4 py-12">
<?php  if($user['role'] != 'admin'):?>
    <section id = 'customer' class="bg-white rounded p-5">
    <div class="max-w-4xl mx-auto mb-5">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-5" role="alert">
                <h1 class="font-bold"><?= session()->getFlashdata('success') ?></h1>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')) : ?>
            <div class=" p-4 mb-4 mt-2 bg-red-100 border border-red-400 text-red-700 rounded relative" role="alert">
                <span class="block sm:inline"><?= session()->getFlashdata('error') ?></span>
            </div>
        <?php endif; ?>
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
            <img src="<?= base_url('icon/menu-customer/order-product.jpg') ?>" alt="Order Pesanan" class="w-full h-32 object-cover">
        </a>
        <!-- Card 2: Kelola Pesanan -->
        <a href="<?= base_url('/cart') ?>" class="bg-white shadow rounded-lg p-6 flex flex-col justify-between hover:bg-gray-100 transition duration-300 ease-in-out">
            <h2 class="text-lg font-semibold mb-4">Kelola Pesanan</h2>
            <!-- Gambar dummy untuk Kelola Pesanan -->
            <img src="<?= base_url('icon/menu-customer/troli-manage.png') ?>" alt="Kelola Pesanan" class="w-full h-32 object-cover">
        </a>
        <!-- Card 3: Pengaturan Akun -->
        <a href="<?= base_url('settings') ?>" class="bg-white shadow rounded-lg p-6 flex flex-col justify-between hover:bg-gray-100 transition duration-300 ease-in-out">
            <h2 class="text-lg font-semibold mb-4">Pengaturan Akun</h2>
            <!-- Gambar dummy untuk Pengaturan Akun -->
            <img src="https://via.placeholder.com/300" alt="Pengaturan Akun" class="w-full h-32 object-cover">
        </a>
    </div>
    </section>
<?php else: ?>
    <section id = 'admin' class="bg-white rounded p-5">
    <div class="max-w-4xl mx-auto mb-5">
         <?php if (session()->getFlashdata('success')): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-5" role="alert">
                <h1 class="font-bold"><?= session()->getFlashdata('success') ?></h1>
            </div>
        <?php endif; ?>
        <h1 class="text-3xl font-semibold mb-4">Hallo <?= $user['nama']; ?></h1>
        <!-- Konten dashboard lainnya -->
        <p class="text-lg">Selamat datang di dashboard Anda. Ini adalah tempat di mana Anda dapat melihat informasi penting tentang Product, Customer dan mengelola pesanan Customer. selamat bekerja.</p>
        <!-- Tambahkan elemen lainnya sesuai dengan kebutuhan -->
    </div>

    <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-4">
        <!-- Card 1: Order Pesanan -->
        <a href="<?= base_url('/product/manage-product') ?>" class="bg-white shadow rounded-lg p-6 flex flex-col justify-between hover:bg-gray-100 transition duration-300 ease-in-out border-2 border-blue-300">
            <h2 class="text-lg font-semibold mb-4">Kelola Product</h2>
            <!-- Gambar dummy untuk Order Pesanan -->
            <img src="<?= base_url('icon/menu-admin/product-manage.png') ?>" alt="Order Pesanan" class="w-full h-32 object-cover">
        </a>
        <!-- Card 2: Kelola Pesanan -->
        <a href="<?= base_url('/product/manage-product-order') ?>" class="bg-white shadow rounded-lg p-6 flex flex-col justify-between hover:bg-gray-100 transition duration-300 ease-in-out border-2 border-blue-300">
            <h2 class="text-lg font-semibold mb-4">Kelola Pesanan Customer</h2>
            <!-- Gambar dummy untuk Kelola Pesanan -->
            <img  src="<?= base_url('icon/menu-admin/order-manage.png') ?>" alt="Kelola Pesanan" class="w-full h-32 object-cover">
        </a>
        <!-- Card 3: Pengaturan Akun -->
        <a href="<?= base_url('settings') ?>" class="bg-white shadow rounded-lg p-6 flex flex-col justify-between hover:bg-gray-100 transition duration-300 ease-in-out border-2 border-blue-300">
            <h2 class="text-lg font-semibold mb-4">Kelola Akun Customer Terdaftar</h2>
            <!-- Gambar dummy untuk Pengaturan Akun -->
            <img  src="<?= base_url('icon/menu-admin/customer-manage.png') ?>" alt="Pengaturan Akun" class="w-full h-32 object-cover">
        </a>
    </div>
    </section>
<?php endif; ?>
</div>

<?= $this->endSection() ?>
