<!-- extend layout -->
<?= $this->extend('layout/page_layout') ?>

<!-- section content -->
<?= $this->section('content') ?>


<?php if (session()->getFlashdata('success')) : ?>
    <div class=" p-4 mb-4 mt-2 bg-green-100 border border-green-400 text-green-700 rounded relative" role="alert">
        <span class="block sm:inline"><?= session()->getFlashdata('success') ?></span>
    </div>
<?php endif; ?>

<h1 class="text-lg font-bold text-center">Manage Product</h1>
<div class="p-8">
<a href="<?= base_url('product/add') ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah Product</a>    
<div class="relative overflow-x-auto rounded-lg mt-2.5 border">
<table class="w-full divide-y divide-gray-200">
    <thead class="bg-blue-400">
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Nama Product</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Harga</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Diskon</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Aksi</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        <?php foreach ($products as $product): ?>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap"><?= $product['nama_product'] ?></td>
                <td class="px-6 py-4 whitespace-nowrap"><?= $product['harga_product'] ?></td>
                <td class="px-6 py-4 whitespace-nowrap"><?= $product['discount_product'] == 0 ? '-' : $product['discount_product'] . '%' ?></td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="<?= base_url('product/edit/' . $product['id']) ?>" class="text-indigo-600 hover:text-indigo-900">Ubah</a>
                    <form action="<?= base_url('product/delete/' . $product['id']) ?>" method="post" class="inline">
                        <button type="submit" class="text-red-600 hover:text-red-900 ml-2">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
</div>



<?= $this->endSection() ?>
