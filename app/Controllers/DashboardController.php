<?php

namespace App\Controllers;

class DashboardController extends BaseController{
public function index()
{
    // Periksa apakah pengguna sudah login
    if (!session()->has('user_id')) {
        $data['error'] = 'Anda harus login terlebih dahulu.';
        return view('user/login', $data); // Redirect ke halaman login jika belum login
    }

    // Ambil data pengguna dari session
    $userData = session()->get('user_data');

    // Lakukan hal-hal lain yang perlu dilakukan di halaman dashboard

    // Kemudian tampilkan view dashboard dengan data pengguna
    return view('user/dashboard', ['user' => $userData]);
}
}