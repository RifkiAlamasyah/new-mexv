<!-- extend layout -->
<?= $this->extend('layout/page_layout') ?>

<!-- section content -->
<?= $this->section('content') ?>

<section class="p-8">
 <div class="bg-white p-8 rounded">
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
        <li class="mr-2">
            <span class="text-gray-400">></span> 
        </li>
        <li class="mr-2">
            <span class="text-gray-500">Tambah Produk</span>
        </li>
    </ol>
</nav>

    <div class="border border-2 rounded border-blue-300 p-5">
    <h1 class="text-lg font-bold mb-4">Tambah Produk</h1>

    <form action="<?= base_url('/product/add') ?>" method="post" enctype="multipart/form-data" class="add-form">
    <!-- Kode Produk -->
    <div class="mb-4">
        <label for="kode_produk" class="block text-sm font-medium text-gray-700">Kode Produk</label>
        <input type="text" name="kode_produk" id="kode_produk" class="mt-1 p-2 w-full border border-gray-300 rounded-md">
        <?php if (session('errors') && isset(session('errors')['kode_produk'])) : ?>
        <p class="text-red-500 text-xs italic"><?= session('errors')['kode_produk'] ?></p>
    <?php endif; ?>
    </div>

    <!-- Nama Produk -->
    <div class="mb-4">
        <label for="nama_produk" class="block text-sm font-medium text-gray-700">Nama Produk</label>
        <input type="text" name="nama_produk" id="nama_produk" class="mt-1 p-2 w-full border border-gray-300 rounded-md">
        <?php if (session('errors') && isset(session('errors')['nama_produk'])) : ?>
        <p class="text-red-500 text-xs italic"><?= session('errors')['nama_produk'] ?></p>
    <?php endif; ?>
    </div>

    <!-- Harga Produk -->
    <div class="mb-4">
        <label for="harga_produk" class="block text-sm font-medium text-gray-700">Harga Produk</label>
        <input type="text" name="harga_produk" id="harga_produk" class="mt-1 p-2 w-full border border-gray-300 rounded-md"  onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
        <?php if (session('errors') && isset(session('errors')['harga_produk'])) : ?>
        <p class="text-red-500 text-xs italic"><?= session('errors')['harga_produk'] ?></p>
    <?php endif; ?>
    </div>

    <!-- Gambar Produk -->
   <div class="mb-4">
        <label for="gambar_produk" class="block text-sm font-medium text-gray-700">Gambar Produk</label>
        <input type="file" name="gambar_produk" id="gambar_produk" class="mt-1 p-2 w-full border border-gray-300 rounded-md" onchange="previewImage(this)">
        <!-- Pratinjau Gambar -->
        <div id="preview-container" class="mt-2 flex items-center space-x-2"></div>
        <?php if (session('errors') && isset(session('errors')['gambar_produk'])) : ?>
        <p class="text-red-500 text-xs italic"><?= session('errors')['gambar_produk'] ?></p>
    <?php endif; ?>
    </div>

    <!-- Deskripsi Produk -->
    <div class="mb-4">
        <label for="deskripsi_produk" class="block text-sm font-medium text-gray-700">Deskripsi Produk</label>
        <textarea name="deskripsi_produk" id="deskripsi_produk" rows="3" class="mt-1 p-2 w-full border border-gray-300 rounded-md"></textarea>
        <?php if (session('errors') && isset(session('errors')['deskripsi_produk'])) : ?>
        <p class="text-red-500 text-xs italic"><?= session('errors')['deskripsi_produk'] ?></p>
    <?php endif; ?>
    </div>

    <!-- Discount Produk -->
    <div class="mb-4">
    <label for="discount_produk" class="block text-sm font-medium text-gray-700">Discount Produk</label>
    <div class="relative">
        <input type="text" name="discount_produk" id="discount_produk" class="mt-1 p-2 w-full border border-gray-300 rounded-md" oninput="addPercentageSymbol(this)" onkeypress="return (event.charCode != 8 && event.charCode == 0) || (event.charCode >= 48 && event.charCode <= 57)" maxlength="2">
        <span class="absolute inset-y-0 right-0 pr-5 flex items-center text-gray-700">%</span>
    </div>
</div>
    <!-- Tombol Submit -->
    <div class="mb-4">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah Produk</button>
    </div>
</form>
    </div>

 </div>   

</section>

<!-- Script JavaScript untuk pratinjau gambar -->
<script>
      document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.add-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const form = this;
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah Anda yakin ingin menambahkan produk ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Tambahkan',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });  

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
