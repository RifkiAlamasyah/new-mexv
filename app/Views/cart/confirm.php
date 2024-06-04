<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<h1 class="text-lg font-bold mb-4 text-center">Konfirmasi Pesanan</h1>

<div class="container mx-auto p-4 max-w-md">
    <div class="bg-white rounded-lg shadow-md p-4">
        <img class="w-full object-cover object-center mb-4" src="<?= base_url('img_product/'.$transaction['gambar_product']) ?>" alt="Product Image"> 
        
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Detail Pesanan</h2>
        <form action="<?= base_url('cart/update-order') ?>" method="post">
            <input type="hidden" name="id" value="<?= $transaction['id'] ?>">

            <div class="mb-4">
                <label for="pembeli" class="block text-sm font-medium text-gray-700">Nama Pembeli</label>
                <input type="text" id="pembeli" name="pembeli" value="<?= $transaction['pembeli'] ?>" class="block w-full mt-1 p-2 border border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                <textarea id="alamat" name="alamat" rows="3" class="block w-full mt-1 p-2 border border-gray-300 rounded-md"><?= $transaction['alamat'] ?></textarea>
            </div>

            <div class="mb-4">
                <label for="telp" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                <input type="text" id="telp" name="telp" value="<?= $transaction['telp'] ?>" class="block w-full mt-1 p-2 border border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <p class="text-sm text-gray-700">Total Harga: <?= $transaction['total_harga'] ?></p>
                <p class="text-sm text-gray-700">Metode Pembayaran: <?= $transaction['metode_bayar'] ?></p>
            </div>

            <div class="flex space-x-2">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Konfirmasi Pesanan</button>
                <a href="<?= base_url('cart') ?>" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Kembali</a>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
