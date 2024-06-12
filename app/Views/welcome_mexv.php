<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<!-- Product Cards -->
<section class="py-12">
    <div class="container mx-auto px-4 bg-white p-5 rounded">
        <div class="text-center mb-10">
            <h1 class="text-4xl font-extrabold text-gray-800">
                <span class="text-indigo-600">
                    Miliki Produk Premium Terbaru dari Megumi Exclusive. Elegant, Comfortable, & High Quality
                </span>
            </h1>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 justify-center">
            <?php foreach ($products as $product): ?>
                <a href="<?= base_url('/product/order/' . $product['kode_product']) ?>" class="flex justify-center">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden w-full">
                        <img class="w-full h-64 object-cover object-center" src="<?= base_url('img_product/'.$product['gambar_product']) ?>" alt="Product Image">
                        <div class="p-4">
                            <h2 class="text-xl font-semibold text-gray-800"><?= $product['nama_product'] ?></h2>
                            <p class="text-gray-600"><?= $product['harga_product'] ?></p>
                            <button class="mt-2 w-full px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md transition duration-300">Tambah ke Keranjang</button>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
