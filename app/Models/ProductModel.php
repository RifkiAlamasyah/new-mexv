<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $allowedFields = ['kode_product', 'nama_product', 'harga_product', 'gambar_product','deskripsi_product','discount_product']; // Sesuaikan dengan kolom yang ada dalam tabel
    
}
