<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{

    public function __construct()
    {
        helper('form'); // Memuat helper form
    }

    public function index()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();

        return view('user/index', $data);
    }
    public function login()
    {
        $data = [];

        if ($this->request->getMethod() === 'post') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $userModel = new UserModel();
            $user = $userModel->validateLogin($username, $password);
            

            if ($user) {
                // Login berhasil, lakukan sesuatu, misalnya, set session
                session()->set('user_id', $user['id']);
                session()->set('user_data', $user);
                session()->setFlashdata('success', 'Anda berhasil Login.');
                return redirect()->to('/dashboard'); // Ganti dengan halaman setelah login
            } else {
                // Login gagal, tampilkan pesan error
                $data['error'] = 'Invalid username or password';
            }
        }

        return view('user/login', $data); // Ganti dengan halaman login yang sesuai
    }

    public function dashboard()
    {
        // Periksa apakah pengguna sudah login
        if (!session()->has('user_id')) {
             // Set flashdata untuk pesan error
        session()->setFlashdata('error', 'Anda harus login terlebih dahulu.');
        // Redirect ke halaman login
        return redirect()->to('/login');// Redirect ke halaman login jika belum login
        }

        // Ambil data pengguna dari session
        $userData = session()->get('user_data');

        // Tampilkan view dashboard dengan data pengguna
        return view('user/dashboard', ['user' => $userData]);
    }

    public function logout()
    {
        // Membersihkan session
        session()->destroy();

        // Redirect ke halaman login
        return redirect()->to('/login');
    }
}
