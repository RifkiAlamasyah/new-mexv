<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<!-- Banner Cards -->
<section class="bg-gray-200 py-12">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Banner Card 1 -->
            <div class="p-6 bg-white rounded-lg shadow-md flex items-center space-x-4">
                <div class="flex-shrink-0">
                    <img class="h-12 w-12" src="https://via.placeholder.com/150" alt="Banner Image">
                </div>
                <div>
                    <h2 class="text-lg font-semibold text-gray-800">Hari Belanja Online Nasional!</h2>
                    <p class="text-sm text-gray-600">Diskon hingga 50% untuk semua produk fashion!</p>
                    <a href="#" class="inline-block mt-2 px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md transition duration-300">Beli Sekarang</a>
                </div>
            </div>
            <!-- Banner Card 2 -->
            <div class="p-6 bg-white rounded-lg shadow-md flex items-center space-x-4">
                <div class="flex-shrink-0">
                    <img class="h-12 w-12" src="https://via.placeholder.com/150" alt="Banner Image">
                </div>
                <div>
                    <h2 class="text-lg font-semibold text-gray-800">Promo Akhir Tahun!</h2>
                    <p class="text-sm text-gray-600">Dapatkan diskon hingga 70% untuk produk pilihan!</p>
                    <a href="#" class="inline-block mt-2 px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md transition duration-300">Lihat Promo</a>
                </div>
            </div>
            <!-- Banner Card 3 -->
            <div class="p-6 bg-white rounded-lg shadow-md flex items-center space-x-4">
                <div class="flex-shrink-0">
                    <img class="h-12 w-12" src="https://via.placeholder.com/150" alt="Banner Image">
                </div>
                <div>
                    <h2 class="text-lg font-semibold text-gray-800">Koleksi Musim Panas</h2>
                    <p class="text-sm text-gray-600">Temukan gayamu dengan koleksi terbaru kami!</p>
                    <a href="#" class="inline-block mt-2 px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md transition duration-300">Lihat Koleksi</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Cards -->
    <section class="py-12">
        <div class="container mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
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