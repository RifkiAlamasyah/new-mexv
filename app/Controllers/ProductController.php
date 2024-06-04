<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\ProductModel;
use App\Models\ProductManagingModel;
use App\Models\TransactionalModel;

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

    public function update_product($id)
    {
        $productModel = new ProductModel();

        // Ambil data produk berdasarkan ID
        $product = $productModel->find($id);

        // Jika data produk tidak ditemukan, redirect ke halaman manage product
        if (!$product) {
            return redirect()->to('product/manage-product')->with('error', 'Produk tidak ditemukan');
        }

        // Jika formulir disubmit
        if ($this->request->getMethod() === 'post') {
            // Validasi input (sesuaikan dengan kebutuhan Anda)
            $validationRules = [
                'nama_product' => 'required',
                'harga_product' => 'required'
            ];

            if (!$this->validate($validationRules)) {
                return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
            }

            // Ambil data dari formulir
            $data = [
                'nama_product' => $this->request->getPost('nama_product'),
                'harga_product' => $this->request->getPost('harga_product'),
                'deskripsi_product' => $this->request->getPost('deskripsi_product'),
                'discount_product' => $this->request->getPost('discount_produk')
            ];

            // Perbarui gambar produk jika ada yang diunggah
            $gambarProduk = $this->request->getFile('gambar_produk');
            if ($gambarProduk->isValid() && !$gambarProduk->hasMoved()) {
                $gambarProduk->move(ROOTPATH . 'public/img_product');
                $data['gambar_product'] = $gambarProduk->getName();
            }

            // Perbarui data produk di database
            $productModel->update($id, $data);

            // Redirect ke halaman manage product dengan pesan sukses
            return redirect()->to('product/manage-product')->with('success', 'Produk berhasil diperbarui');
        }

        // Tampilkan halaman update produk dengan data produk yang akan diperbarui
        return view('product/update_product', ['product' => $product]);
    }

    public function delete_product($id)
    {
        $productModel = new ProductModel();

        // Ambil data produk berdasarkan ID
        $product = $productModel->find($id);

        // Jika data produk tidak ditemukan, redirect ke halaman manage product
        if (!$product) {
            return redirect()->to('product/manage')->with('error', 'Produk tidak ditemukan');
        }

        // Hapus gambar produk dari folder jika ada
        $gambarProduk = $product['gambar_product'];
        if ($gambarProduk && file_exists(ROOTPATH . 'public/img_product/' . $gambarProduk)) {
            unlink(ROOTPATH . 'public/img_product/' . $gambarProduk);
        }

        // Hapus data produk dari database
        $productModel->delete($id);

        // Redirect ke halaman manage product dengan pesan sukses
        return redirect()->to('product/manage-product')->with('success', 'Produk berhasil dihapus');
    }

    public function order($kode_product)
    {
    
        // Ambil data produk berdasarkan ID
        $productModel = new ProductModel();


        $product = $productModel->where('kode_product', $kode_product)->first();

        if (!$product) {
            // Redirect atau tampilkan pesan error jika produk tidak ditemukan
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }

  

        // Ambil daftar ukuran yang tersedia dari model atau sumber data lainnya
        $sizes = ['XL', 'XXL', 'M', 'L'];

        // Ambil data pengguna yang sedang login
        $userModel = new UserModel();
        $user = $userModel->find(session()->get('user_id')); // Sesuaikan dengan session login Anda

        // Kirim data produk, ukuran, dan pengguna ke view
        $data = [
            'product' => $product,
            'sizes' => $sizes,
            'user' => $user,
        ];

        // Tampilkan view order produk
        return view('product/order_product', $data);
    }

    public function submitOrder()
    {
        $productModel = new ProductModel();

        $userData = session()->get('user_data');
        // Validasi input jika diperlukan

        // Ambil data dari form
        $productId = $this->request->getPost('product_id');
        $tempProduct = $productModel->where('kode_product', $productId)->first();

        $selectedSize = $this->request->getPost('ukuran');
        $quantity = $this->request->getPost('quantity');

        $total_bayar = $tempProduct['harga_product'] * $quantity;
        $selectedColor = $this->request->getPost('warna');
        $metodePembayaran = $this->request->getPost('metode_pembayaran');

        // Hitung total harga jika diperlukan

        // Simpan data transaksi produk ke dalam database
        $transactionalProductModel = new TransactionalModel();
        $transactionalProductModel->save([
            'nama_produk' => $tempProduct['nama_product'], // Ganti dengan nama produk jika perlu
            'warna' => $selectedColor,
            'ukuran' => $selectedSize,
            'quantity' => $quantity,
            'pembeli' => $userData['nama'],
            'alamat' => $userData['alamat'],
            'metode_bayar' => $metodePembayaran,
            'total_harga' => $total_bayar,
            'user_login' => $userData['username'],
            'status' => '0',
            'gambar_product' => $tempProduct['gambar_product'],
            'telp' => $userData['telp']
        ]);

        // Redirect ke halaman terima kasih atau halaman lain jika diperlukan
        return redirect()->to('/dashboard')->with('success', 'Pesanan Anda berhasil disimpan. Silahkan Chek di menu Kelola Pesanan untuk melakukan Konfirmasi');
    }
}
