<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>
    <!-- Product Cards -->
    <section class="py-12">
        <h1 class="text-2xl font-semibold text-center mb-5">LIST PRODUCT</h1>
        <div class="p-5 mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <!-- Product Card 1 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img class="w-full h-64 object-cover object-center" src="https://via.placeholder.com/300" alt="Product Image">
                <div class="p-4">
                    <h2 class="text-xl font-semibold text-gray-800">Baju Polos Biru</h2>
                    <p class="text-gray-600">Rp 150.000</p>
                    <button class="mt-2 w-full px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md transition duration-300">Tambah ke Keranjang</button>
                </div>
            </div>
            <!-- Product Card 2 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img class="w-full h-64 object-cover object-center" src="https://via.placeholder.com/300" alt="Product Image">
                <div class="p-4">
                    <h2 class="text-xl font-semibold text-gray-800">Baju Batik Modern</h2>
                    <p class="text-gray-600">Rp 200.000</p>
                    <button class="mt-2 w-full px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md transition duration-300">Tambah ke Keranjang</button>
                </div>
            </div>
            <!-- Product Card 3 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img class="w-full h-64 object-cover object-center" src="https://via.placeholder.com/300" alt="Product Image">
                <div class="p-4">
                    <h2 class="text-xl font-semibold text-gray-800">Baju Kemeja Putih</h2>
                    <p class="text-gray-600">Rp 180.000</p>
                    <button class="mt-2 w-full px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md transition duration-300">Tambah ke Keranjang</button>
                </div>
            </div>
            <!-- Product Card 4 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img class="w-full h-64 object-cover object-center" src="https://via.placeholder.com/300" alt="Product Image">
                <div class="p-4">
                    <h2 class="text-xl font-semibold text-gray-800">Baju Gamis Hitam</h2>
                    <p class="text-gray-600">Rp 250.000</p>
                    <button class="mt-2 w-full px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md transition duration-300">Tambah ke Keranjang</button>
                </div>
            </div>
        </div>
    </section>

<?= $this->endSection() ?>