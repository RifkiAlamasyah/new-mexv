<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<section class=" py-12 bg-gray-200">
    <div class="max-w-lg mx-auto border border-2 p-8 rounded bg-white shadow-lg">
        <h1 class="text-center font-medium text-xl mb-5">Register</h1>

        <?= form_open('/register'); ?>
        <div class="mb-5">
            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukan Nama</label>
            <input type="text" name="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Nama" required />
        </div>
        <div class="mb-5">
            <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukan Alamat</label>
            <input type="text" name="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Alamat" required />
        </div>
        <div class="mb-5">
            <label for="Jenis Kelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
            <div class="flex items-center">
                <input id="jenis_kelamin_L" type="radio" name="jenis_kelamin" value="laki-laki" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                <label for="jenis_kelamin_L" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Laki-Laki</label>
                <input id="jenis_kelamin_P" type="radio" name="jenis_kelamin" value="perempuan" class="ml-4 w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                <label for="jenis_kelamin_P" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Perempuan</label>
            </div>
        </div>
        <div class="mb-5">
            <label for="no_telp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Telepon</label>
            <input type="text" name="no_telp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan No. Telepon" required onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" maxlength='13' />
            <?php if (session('errors') && isset(session('errors')['no_telp'])) : ?>
                <p class="text-red-500 text-xs italic"><?= session('errors')['no_telp'] ?></p>
            <?php endif; ?>
        </div>
        <div class="mb-5">
            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
            <input type="text" name="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Username" required />
            <?php if (session('errors') && isset(session('errors')['username'])) : ?>
                <p class="text-red-500 text-xs italic"><?= session('errors')['username'] ?></p>
            <?php endif; ?>
        </div>
        <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Password" required />
        </div>
        <div class="flex items-start mb-5">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register</button>
        </div>
        <?= form_close(); ?>
    </div>
</section>

<?= $this->endSection() ?>
