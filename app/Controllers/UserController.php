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
       // Jika formulir disubmit
       if ($this->request->getMethod() === 'post') {
        // Ambil data dari formulir
        $nama = $this->request->getPost('nama');
        $alamat = $this->request->getPost('alamat');
        $jenis_kelamin = $this->request->getPost('jenis_kelamin');
        $no_telp = $this->request->getPost('no_telp');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Load helper validation
        helper('form');

        // Load validation library
        $validation = \Config\Services::validation();

        // Ambil aturan validasi dari konfigurasi Validasi
        $config = new \Config\Validation();
        $validation->setRules($config->userRegister, $config->validationMessages);
        
        // Menggunakan aturan validasi dan pesan kesalahan dari file konfigurasi Validation
        if (!$validation->run($this->request->getPost())) {
            // Jika validasi gagal, kembalikan ke halaman registrasi dengan pesan kesalahan
            return redirect()->to('/register')->withInput()->with('errors', $validation->getErrors());
        }
        // Simpan data ke database
        $userModel = new UserModel();

        // Hash password sebelum disimpan
        $hashedPassword = sha1($password);

        // Data yang akan disimpan
        $data = [
            'nama' => $nama,
            'alamat' => $alamat,
            'jenis_kelamin' => $jenis_kelamin,
            'telp' => $no_telp,
            'username' => $username,
             'role' => 'customer',
            'password' => $hashedPassword // Simpan password yang sudah di-hash
        ];

        // Insert data ke dalam tabel user
        $userModel->insert($data);

        session()->setFlashdata('success', 'Anda berhasil daftar. Silahkan login.');
        // Redirect ke halaman lain setelah berhasil menyimpan data
        return redirect()->to('/login');
    }

    // Tampilkan halaman registrasi (formulir)
    return view('user/register');
    }
}
