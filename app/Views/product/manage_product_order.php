<!-- extend layout -->
<?= $this->extend('layout/page_layout') ?>

<!-- section content -->
<?= $this->section('content') ?>

<section class="h-screen py-12 px-8">
<h1>OK</h1>
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
