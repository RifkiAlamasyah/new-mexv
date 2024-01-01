<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'email', 'password', 'nama','jenis_kelamin', 'alamat','role','no_telepon']; // Sesuaikan dengan kolom yang ada dalam tabel

    public function validateLogin($username, $password)
    {
        $user = $this->where('username', $username)->first();
    
        // Menggunakan sha1 untuk memverifikasi password
    
        if ($user && sha1($password) === $user['password']) {
            return $user;
        } else {
            return null;
        }
    }

    public function validateRegister($nama, $alamat, $noTelepon, $jenisKelamin, $username, $password, $confirmPassword)
    {
        $validationErrors = [];

        // Validasi input, misalnya cek apakah password dan konfirmasi password sama
        if ($password !== $confirmPassword) {
            $validationErrors[] = 'Password dan konfirmasi password tidak cocok.';
        }
        // Cek apakah username sudah terdaftar
        if ($this->isUsernameTaken($username)) {
            $validationErrors[] = 'Username sudah terdaftar. Silakan pilih username lain.';
        }

        // Tambahkan validasi lain sesuai kebutuhan

        return $validationErrors;
    }

    public function isUsernameTaken($username)
    {
        return $this->where('username', $username)->countAllResults() > 0;
    }
    
}
