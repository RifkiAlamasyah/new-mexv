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
        'gambar_product',
        'telp',
        'ticket_transaksi'
    ];

    public function getTransactionsWithStatus($username)
    {
        return $this->select('transactional_product.*, mapping_status.keterangan as status_description')
                    ->join('mapping_status', 'transactional_product.status = mapping_status.id')
                    ->where('transactional_product.user_login', $username)
                    ->findAll();
    }
}
