<?php

namespace App\Controllers;
use App\Models\ProductModel;

class Home extends BaseController
{
    public function index(): string
    {
         // Instansiasi model
         $productModel = new ProductModel();

         // Ambil data produk dari database
         $data['products'] = $productModel->findAll();
        return view('welcome_mexv', $data);
    }
}
