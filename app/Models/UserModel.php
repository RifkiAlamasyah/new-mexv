<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'email', 'password', 'nama','jenis_kelamin', 'alamat','role','telp']; // Sesuaikan dengan kolom yang ada dalam tabel

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
    
}
