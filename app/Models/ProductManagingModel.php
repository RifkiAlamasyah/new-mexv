<?php
namespace App\Models;

use CodeIgniter\Model;

class ProductManagingModel extends Model
{
    protected $table = 'product_managing';
    protected $primaryKey = 'id';
    protected $allowedFields = ['kode_product', 'warna', 'kuantitas', 'ukuran'];
}
