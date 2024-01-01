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

    public function register()
    {
        $data = [];

        // Jika formulir pendaftaran dikirim
        if ($this->request->getMethod() === 'post') {
            // Ambil data dari formulir
            $nama = $this->request->getPost('nama');
            $alamat = $this->request->getPost('alamat');
            $noTelepon = $this->request->getPost('no_telepon');
            $jenisKelamin = $this->request->getPost('jenis_kelamin');
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $confirmPassword = $this->request->getPost('confirm_password');

            // Validasi input menggunakan model
            $userModel = new UserModel();
            $validationErrors = $userModel->validateRegister($nama, $alamat, $noTelepon, $jenisKelamin, $username, $password, $confirmPassword);

            if (empty($validationErrors)) {
                // Semua validasi berhasil, lakukan pendaftaran
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                
                $userData = [
                    'nama' => $nama,
                    'alamat' => $alamat,
                    'jenis_kelamin' => $jenisKelamin,
                    'no_telepon' => $noTelepon,
                    'username' => $username,
                    'password' => $hashedPassword,
                    'role' => 'customer'
                ];

                $userModel->insert($userData);
                session()->setFlashdata('success', 'Anda berhasil Daftar.');
                return redirect()->to('/login'); // Ganti dengan halaman setelah login
            } else {
                $data['error'] = $validationErrors;
            }
        }

        // Tampilkan halaman pendaftaran dengan pesan kesalahan jika ada
      
        return view('user/register', $data);
    }
}
