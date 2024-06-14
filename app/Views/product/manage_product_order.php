<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<section class=" py-12 px-8">
    <div class="container mx-auto py-12">
        <h1 class="text-3xl font-bold mb-6 text-center">Manage Product Orders</h1>
        <div class="bg-white shadow-md rounded-lg p-6">
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

            <!-- Grafik Chart.js untuk jumlah order per bulan -->
            <!-- <div class="mt-8">
                <canvas id="orderChart"></canvas>
            </div> -->

            <?php if (!empty($transactions) && is_array($transactions)): ?>
                <div class="overflow-x-auto mt-8">
                    <table class="w-full divide-y divide-gray-200">
                        <!-- Tabel data transaksi -->
                        <thead class="bg-blue-500">
                            <tr>
                                <th colspan="2" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Change Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">No Order</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Customer Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Customer Address</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Customer Number</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Product Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Price</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Quantity</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Order date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Metode Bayar</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php foreach ($transactions as $transaction): ?>
                                <tr>
                                    <td colspan="2" class="px-6 py-4 whitespace-nowrap">
                                        <form action="<?= base_url('/product/update-status-order/' . $transaction['id']) ?>" method="post" class="flex items-center">
                                            <input type="hidden" name="ticket_transaksi" value="<?= esc($transaction['ticket_transaksi']) ?>">
                                            <select id="status" name="status" class="block w-48 mt-1 p-2 border border-gray-300 rounded-md" required>
                                                <?php foreach ($statuses as $status): ?>
                                                    <option value="<?= esc($status['id']) ?>" <?= $transaction['status'] == $status['id'] ? 'selected' : '' ?>>
                                                        <?= esc($status['keterangan']) ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <button type="submit" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Ubah</button>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap"><?= esc($transaction['ticket_transaksi']) ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap"><?= esc($transaction['pembeli']) ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap"><?= esc($transaction['alamat']) ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap"><?= esc($transaction['telp']) ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap"><?= esc($transaction['nama_produk']) ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap"><?= esc($transaction['total_harga']) ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap"><?= esc($transaction['quantity']) ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap"><?= esc($transaction['status_description']) ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap"><?= esc($transaction['created_at']) ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap"><?= esc($transaction['metode_bayar']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="text-red-500 text-center">Tidak ada data</div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Sisipkan Chart.js melalui CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Inisialisasi Chart.js
    document.addEventListener('DOMContentLoaded', function () {
        // Ambil data untuk chart dari PHP
        const months = <?= json_encode($months) ?>;
        const orders = <?= json_encode(array_values($orderCounts)) ?>; // Ambil nilai orderCounts

        // Buat chart
        var ctx = document.getElementById('orderChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: months,
                datasets: [{
                    label: 'Orders per Month',
                    data: orders,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0 // Menampilkan nilai bilangan bulat saja
                    }
                }
            }
        });
    });
</script>

<?= $this->endSection() ?>
