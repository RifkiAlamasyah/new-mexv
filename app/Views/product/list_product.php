<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<!-- Container utama dengan background abu-abu -->
<div class="mx-auto p-8 min-h-screen">
    <section class="py-12 container bg-white rounded">
        <div class="p-5">
        <div class="text-center mb-10">
            <h1 class="text-4xl font-extrabold text-gray-900">
                <span class="text-indigo-600">
                    LIST PRODUCT
                </span>
            </h1>
            <p class="mt-4 text-lg text-gray-700">
                Discover the exclusive collection of MEXV fashion products. Elevate your style with our trendy and high-quality designs. Perfect for every occasion and mood.
            </p>
            <div class="mt-2 border-b-4 border-indigo-500 w-24 mx-auto"></div>
        </div>


        <div class="p-5 mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <?php foreach ($products as $product): ?>
                <!-- Product Card -->
                <a href="<?= base_url('/product/order/' . $product['kode_product']) ?>">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
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
        <!-- Stylish Heading -->
   
    </section>
</div>

<?= $this->endSection() ?>
