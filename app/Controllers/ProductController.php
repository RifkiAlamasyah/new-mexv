<?php

namespace App\Controllers;

use App\Models\ProductModel;

class ProductController extends BaseController
{
        public function __construct()
        {
            helper('form'); // Memuat helper form
        }

    public function index(): string
    {
        
            // Buat objek model ProductModel
            $model = new ProductModel();

            // Ambil semua data produk dari model
            $data['products'] = $model->findAll();

            // Tampilkan view product/list_product dengan data produk
            return view('product/list_product', $data);
    }

    public function manage_product(): string
    {
             // Buat objek model ProductModel
             $model = new ProductModel();

             // Ambil semua data produk dari model
             $data['products'] = $model->findAll();

            return view('product/manage_product', $data);
    }

    public function add_product()
    {
      // Jika formulir disubmit
    if ($this->request->getMethod() === 'post') {
           // Load validation library
           $validation = \Config\Services::validation();

           // Ambil aturan validasi dari konfigurasi Validasi
           $config = new \Config\Validation();
           $validation->setRules($config->addProduk);
           
           // Menggunakan aturan validasi dan pesan kesalahan dari file konfigurasi Validation
           if (!$validation->run($this->request->getPost())) {
               // Jika validasi gagal, kembalikan ke halaman registrasi dengan pesan kesalahan
               return redirect()->to('/product/add')->withInput()->with('errors', $validation->getErrors());
           }
        
          // Simpan gambar produk
          $gambarProduk = $this->request->getFile('gambar_produk');
          $gambarProduk->move(ROOTPATH . 'public/img_product');

          $discountProduct = $this->request->getPost('discount_produk');
          if($discountProduct == ''){
                $discountProduct = 0;
          }else{
                $discountProduct = intval($discountProduct);
          }

          // Ambil data dari formulir
          $data = [
              'kode_product' => $this->request->getPost('kode_produk'),
              'nama_product' => $this->request->getPost('nama_produk'),
              'harga_product' => $this->request->getPost('harga_produk'),
              'gambar_product' => $gambarProduk->getName(), // Simpan nama file gambar ke database
              'deskripsi_product' => intval($this->request->getPost('deskripsi_produk')),
              'discount_product' => $discountProduct
          ];
        
          // Simpan data ke database
          $model = new ProductModel();
          $model->insert($data);
  
          // Redirect atau tampilkan pesan sukses
          return redirect()->to('/product/manage-product')->with('success', 'Produk berhasil ditambahkan');
      }
  

    return view('product/add_product');
    }
}
