<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="p-5">
    <div class="bg-white rounded-lg shadow-md overflow-hidden max-w-lg mx-auto">
        <div class="relative">
            <img class="w-full h-64 object-cover object-center" src="<?= base_url('img_product/'.$product['gambar_product']) ?>" alt="Product Image">
            <div class="absolute top-4 left-4 bg-white bg-opacity-75 rounded-full p-2">
                <span class="text-gray-800 text-sm font-semibold"><?= $product['discount_product'] ?>% OFF</span>
            </div>
        </div>
        <div class="p-6"> 
            <h2 class="text-2xl font-bold text-gray-800 mb-2"><?= $product['nama_product'] ?></h2>
            <p class="text-gray-600 mb-2">Kode Produk: <?= $product['kode_product'] ?></p>
            <p class="text-gray-600 mb-2">Harga: <?= $product['harga_product'] ?></p>
            <p class="text-gray-600 mb-2">Deskripsi: <?= $product['deskripsi_product'] ?></p>

            <form action="<?= base_url('product/submit-order') ?>" method="post" class="space-y-4">
                <input type="hidden" name="product_id" value="<?= $product['kode_product'] ?>">

                <!-- Select untuk ukuran -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Ukuran</label>
                    <div class="mt-2 space-x-4">
                        <?php foreach ($sizes as $size): ?>
                            <label class="inline-flex items-center">
                                <input type="radio" name="ukuran" value="<?= $size ?>" class="form-radio text-indigo-600" require>
                                <span class="ml-2 text-gray-700"><?= $size ?></span>
                            </label>
                        <?php endforeach; ?>
                        <?php if (session('errors') && isset(session('errors')['ukuran'])) : ?>
                        <p class="text-red-500 text-xs italic"><?= session('errors')['ukuran'] ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Input number untuk kuantitas -->
                <div>
                    <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                    <input type="number" id="quantity" name="quantity" class="block w-full mt-1 p-2 border border-gray-300 rounded-md" min="1">
                    <?php if (session('errors') && isset(session('errors')['quantity'])) : ?>
                    <p class="text-red-500 text-xs italic"><?= session('errors')['quantity'] ?></p>
                <?php endif; ?>
                </div>

                <!-- Select untuk warna -->
                <div>
                    <label for="warna" class="block text-sm font-medium text-gray-700">Warna</label>
                    <select id="warna" name="warna" class="block w-full mt-1 p-2 border border-gray-300 rounded-md" require>
                        <option value="hitam">Hitam</option>
                        <option value="silver">Silver</option>
                    </select>
                    <?php if (session('errors') && isset(session('errors')['kode_produk'])) : ?>
                        <p class="text-red-500 text-xs italic"><?= session('errors')['kode_produk'] ?></p>
                    <?php endif; ?>
                </div>

                <!-- Input untuk metode pembayaran -->
                <div>
                    <label for="metode_pembayaran" class="block text-sm font-medium text-gray-700">Metode Pembayaran</label>
                    <select id="metode_pembayaran" name="metode_pembayaran" class="block w-full mt-1 p-2 border border-gray-300 rounded-md" require>
                        <option value="Transfer Bank">Transfer Bank</option>
                        <option value="COD">COD</option>
                    </select>
                </div>

                <!-- Tombol Submit -->
                <div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full">Order Produk</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
