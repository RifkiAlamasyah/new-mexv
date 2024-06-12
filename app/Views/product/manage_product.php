<!-- extend layout -->
<?= $this->extend('layout/page_layout') ?>

<!-- section content -->
<?= $this->section('content') ?>

<section class="h-screen py-12 px-8">
<div class="bg-white p-8 rounded">
    <?php if (session()->getFlashdata('success')) : ?>
        <div class=" p-4 mb-4 mt-2 bg-green-100 border border-green-400 text-green-700 rounded relative" role="alert">
            <span class="block sm:inline"><?= session()->getFlashdata('success') ?></span>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class=" p-4 mb-4 mt-2 bg-red-100 border border-red-400 text-red-700 rounded relative" role="alert">
            <span class="block sm:inline"><?= session()->getFlashdata('error') ?></span>
        </div>
    <?php endif; ?>
    <nav class="text-sm pb-5" aria-label="Breadcrumb">
        <ol class="list-none p-0 inline-flex">
            <li class="mr-2">
                <a href="/dashboard" class="text-gray-400 hover:text-gray-500">Dashboard</a>
            </li>
            <li class="mr-2">
                <span class="text-gray-400">></span> 
            </li>
            <li class="mr-2">
                <a href="/product/manage-product" class="text-gray-400 hover:text-gray-500">Kelola Product</a>
            </li>
        </ol>
    </nav>

    <h1 class="text-lg font-bold text-center">Manage Product</h1>
    <div class="p-2">
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
                        <a href="<?= base_url('product/update/' . $product['id']) ?>" class="text-indigo-600 hover:text-indigo-900">Ubah</a>
                        <form action="<?= base_url('product/delete/' . $product['id']) ?>" method="post" class="inline delete-form">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="text-red-600 hover:text-red-900 ml-2">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    </div>
</div>
</section>

<script>  
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const form = this;
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah Anda yakin ingin menghapus produk ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

        // Cek apakah ada flash data dengan pesan sukses
        const successMessage = '<?= session()->getFlashdata('success') ?>';
        if (successMessage) {
            // Tampilkan SweetAlert dengan pesan sukses
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: successMessage
            });
        }

        // Cek apakah ada flash data dengan pesan error
        const errorMessage = '<?= session()->getFlashdata('error') ?>';
        if (errorMessage) {
            // Tampilkan SweetAlert dengan pesan error
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: errorMessage
            });
        }
    });
</script>

<?= $this->endSection() ?>
