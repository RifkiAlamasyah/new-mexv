<nav class="bg-gray-800 text-white fixed w-full z-10 top-0 shadow" id="navbar">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap">MEXV</span>
    </a>
    <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-black">
        <li>
          <a href="/index.php" class="block py-2 px-3 rounded hover:bg-gray-800 md:hover:bg-transparent md:border-0 md:hover:text-blue-400 md:p-0 <?= (current_url(true)->getPath() == '/index.php/') ? 'text-white bg-blue-700 rounded md:bg-transparent md:text-blue-400' : '' ?>" aria-current="page">Home</a>
        </li>
        <li>
          <?php if (session()->has('isLoggedIn')): ?>
            <a href="/dashboard" class="block py-2 px-3 rounded hover:bg-gray-800 md:hover:bg-transparent md:border-0 md:hover:text-blue-400 md:p-0 <?= (current_url(true)->getPath() == '/index.php/dashboard') ? 'text-white bg-blue-700 rounded md:bg-transparent md:text-blue-400' : '' ?>">Dashboard</a>
          <?php endif; ?>
        </li>
        <li>
          <?php if (session()->has('isLoggedIn')): ?>
            <a href="<?= base_url('logout'); ?>" class="block py-2 px-3 rounded hover:bg-gray-800 md:hover:bg-transparent md:border-0 md:hover:text-blue-400 md:p-0">Logout</a>
          <?php else: ?>
            <a href="/login" class="block py-2 px-3 rounded hover:bg-gray-800 md:hover:bg-transparent md:border-0 md:hover:text-blue-400 md:p-0 <?= (current_url(true)->getPath() == '/index.php/login') ? 'text-white bg-blue-700 rounded md:bg-transparent md:text-blue-400' : '' ?>">Login</a>
          <?php endif; ?>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="pt-16"></div> <!-- This div adds space to compensate for the fixed navbar -->
