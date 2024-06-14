<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<!-- Container utama dengan background abu-abu -->
<div class="container mx-auto p-8 min-h-screen">
    <section class="py-12">
        <!-- Stylish Heading -->
        <div class="text-center mb-10">
            <h1 class="text-4xl font-extrabold text-gray-900">
                <span class="text-indigo-600">
                    Troli Pesanan
                </span>
            </h1>
            <p class="mt-4 text-lg text-gray-700">
                Nikmati pengalaman berbelanja yang mudah dan cepat dengan MEXV. Pilih produk fashion terbaik dan buat penampilanmu semakin stylish.
            </p>
            <div class="mt-2 border-b-4 border-indigo-500 w-24 mx-auto"></div>
        </div>

        <!-- Pesan sukses -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="bg-green-500 text-white p-4 rounded mb-4 text-center">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <div class="space-y-8">
            <?php foreach ($transactions as $transaction): ?>
                <div class="bg-white border border-blue-600 rounded-lg shadow-md p-4 flex items-center">
                    <div class="flex-1">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-2"><?= $transaction['nama_produk'] ?></h2>
                        <p class="text-gray-600">Warna: <?= $transaction['warna'] ?></p>
                        <p class="text-gray-600">Ukuran: <?= $transaction['ukuran'] ?></p>
                        <p class="text-gray-600">Kuantitas: <?= $transaction['quantity'] ?></p>
                        <p class="text-gray-600">Total Harga: <?= $transaction['total_harga'] ?></p>
                        <p class="text-gray-600">Metode Pembayaran: <?= $transaction['metode_bayar'] ?></p>
                        <p class="text-gray-600">Status: <?= $transaction['status_description'] ?></p>
                        <?php if ($transaction['status'] == '1'): ?>
                            <p class="text-gray-600">Ticket Transaksi: <?= $transaction['ticket_transaksi'] ?></p>
                        <?php endif; ?>

                        <!-- Tombol konfirmasi dan batalkan -->
                        <div class="flex space-x-2 mt-4">
                            <?php if ($transaction['status'] == '0'): ?>
                                <a href="<?= base_url('cart/confirm/'.$transaction['id']) ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Konfirmasi</a>
                                <button onclick="confirmCancel(<?= $transaction['id'] ?>)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Batalkan
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="w-32 h-32 ml-4">
                        <img class="w-full h-full object-cover object-center rounded" src="<?= base_url('img_product/'.$transaction['gambar_product']) ?>" alt="Product Image">
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</div>

<script>  
    // Definisikan fungsi confirmCancel di luar DOMContentLoaded
    function confirmCancel(transactionId) {
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Apakah Anda yakin ingin membatalkan pesanan ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Batalkan',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect or submit form here
                window.location.href = '<?= base_url('cart/cancel-order/') ?>' + transactionId;
            }
        });
    }

    document.addEventListener("DOMContentLoaded", function() {
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
