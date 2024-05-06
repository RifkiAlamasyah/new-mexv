<?php

namespace App\Controllers;

use App\Models\ProductModel;

class ProductController extends BaseController
{
    public function index(): string
    {
        
            // Buat objek model ProductModel
            $model = new ProductModel();

            // Ambil semua data produk dari model
            $data['products'] = $model->findAll();

            // Tampilkan view product/list_product dengan data produk
            return view('product/list_product', $data);
    }
}
