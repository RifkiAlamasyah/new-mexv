<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="max-w-sm mx-auto border border-2 p-5 rounded">
<h1 class="text-center font-medium text-xl">Login</h1>
<?php if (isset($error)): ?>
    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <span class="font-medium"> <?= $error; ?></span>
    </div>
<?php endif; ?>
<?php if (session()->getFlashdata('success')) : ?>
    <div class=" p-4 mb-4 mt-2 bg-green-100 border border-green-400 text-green-700 rounded relative" role="alert">
        <span class="block sm:inline"><?= session()->getFlashdata('success') ?></span>
    </div>
<?php endif; ?>


<?= form_open('/login'); ?>
  <div class="mb-5">
    <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
    <input type="text" name="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Username" required />
  </div>
  <div class="mb-5">
    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">password</label>
    <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Password" required />
  </div>
  <div class="flex items-start mb-5">
  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
  </div>
  <?= form_close(); ?>
  Don't have an account yet? <a href="/register" class="text-blue-400">Sign Up </a>
</div>


<?= $this->endSection() ?>



