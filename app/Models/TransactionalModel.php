<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionalModel extends Model
{
    protected $table = 'transactional_product';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama_produk',
        'warna',
        'ukuran',
        'quantity',
        'pembeli',
        'alamat',
        'metode_bayar',
        'total_harga',
        'user_login',
        'status',
        'gambar_product'
    ];
}
