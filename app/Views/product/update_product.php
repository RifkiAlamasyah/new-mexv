<!-- extend layout -->
<?= $this->extend('layout/page_layout') ?>

<!-- section content -->
<?= $this->section('content') ?>

<h1 class="text-lg font-bold mb-4">Update Produk</h1>

<form action="<?= base_url('product/update/'.$product['id']) ?>" method="post" enctype="multipart/form-data">
    <!-- Nama Produk -->
    <div class="mb-4">
        <label for="nama_product" class="block text-sm font-medium text-gray-700">Nama Produk</label>
        <input type="text" name="nama_product" id="nama_product" class="mt-1 p-2 w-full border border-gray-300 rounded-md" value="<?= $product['nama_product'] ?>">
    </div>

    <!-- Harga Produk -->
    <div class="mb-4">
        <label for="harga_product" class="block text-sm font-medium text-gray-700">Harga Produk</label>
        <input type="text" name="harga_product" id="harga_product" class="mt-1 p-2 w-full border border-gray-300 rounded-md" value="<?= $product['harga_product'] ?>">
    </div>

   <!-- Gambar Produk -->
<div class="mb-4">
    <label for="gambar_produk" class="block text-sm font-medium text-gray-700">Gambar Produk</label>
    <input type="file" name="gambar_produk" id="gambar_produk" class="mt-1 p-2 w-full border border-gray-300 rounded-md" onchange="previewImage(this)">
    <!-- Pratinjau Gambar Produk Sebelumnya -->
    <div id="preview-container" class="mt-2 flex items-center space-x-2"></div>
</div>

    <!-- Deskripsi Produk -->
    <div class="mb-4">
        <label for="deskripsi_product" class="block text-sm font-medium text-gray-700">Deskripsi Produk</label>
        <textarea name="deskripsi_product" id="deskripsi_product" rows="3" class="mt-1 p-2 w-full border border-gray-300 rounded-md"><?= $product['deskripsi_product'] ?></textarea>
    </div>

    <!-- Discount Produk -->
    <div class="mb-4">
        <label for="discount_produk" class="block text-sm font-medium text-gray-700">Discount Produk</label>
        <input type="text" name="discount_produk" id="discount_produk" class="mt-1 p-2 w-full border border-gray-300 rounded-md" value="<?= $product['discount_product'] ?>">
    </div>

    <!-- Tombol Submit -->
    <div class="mb-4">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Produk</button>
    </div>
</form>

<script>
   // Preview image
   function previewImage(input) {
        var previewContainer = document.getElementById('preview-container');
        previewContainer.innerHTML = ''; // Bersihkan konten sebelumnya

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                var imgElement = document.createElement('img');
                imgElement.setAttribute('src', e.target.result);
                imgElement.setAttribute('class', 'max-w-xs');
                previewContainer.appendChild(imgElement);

                // Tambahkan tombol hapus
                var deleteButton = document.createElement('button');
                deleteButton.setAttribute('class', 'text-red-500 hover:text-red-700');
                deleteButton.setAttribute('type', 'button');
                deleteButton.innerHTML = '<svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>Remove';
                deleteButton.onclick = function() {
                    input.value = ''; // Hapus nilai input file
                    previewContainer.innerHTML = ''; // Hapus pratinjau gambar
                };
                previewContainer.appendChild(deleteButton);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>



<?= $this->endSection() ?>
