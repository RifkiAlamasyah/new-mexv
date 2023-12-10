<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'email', 'password', 'nama','jenis_kelamin', 'alamat','role','telp']; // Sesuaikan dengan kolom yang ada dalam tabel
}
