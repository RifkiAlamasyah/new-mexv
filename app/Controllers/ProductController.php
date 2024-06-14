<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\ProductModel;
use App\Models\ProductManagingModel;
use App\Models\TransactionalModel;
use App\Models\MappingStatusOrderModel;

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
             $productModel = new ProductModel();

             // Ambil semua data produk dari model
             $data['products'] = $productModel->findAll();

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
              'deskripsi_product' => $this->request->getPost('deskripsi_produk'),
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
          // Periksa apakah pengguna sudah login
     if (!session()->has('user_id')) {
            // Set flashdata untuk pesan error
       session()->setFlashdata('error', 'Anda harus login terlebih dahulu.');
       // Redirect ke halaman login
       return redirect()->to('/login');// Redirect ke halaman login jika belum login
       }

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
        $transactionalProductModel = new TransactionalModel();
    
        $userData = session()->get('user_data');
    
        // Validasi input jika diperlukan
        $validation = \Config\Services::validation();
    
        // Ambil aturan validasi dari konfigurasi Validasi
        $config = new \Config\Validation();
        $validation->setRules($config->orderProduk);
    
        // Ambil data dari form
        $productId = $this->request->getPost('product_id');
        $tempProduct = $productModel->where('kode_product', $productId)->first();
    
        // Menggunakan aturan validasi dan pesan kesalahan dari file konfigurasi Validation
        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal, kembalikan ke halaman pemesanan dengan pesan kesalahan
            return redirect()->to('product/order/' . $tempProduct['kode_product'])
                             ->withInput()
                             ->with('errors', $validation->getErrors());
        }
    
        // Pengecekan jumlah order dengan status 0
        $pendingOrdersCount = $transactionalProductModel->where([
            'user_login' => $userData['username'],
            'status' => '0'
        ])->countAllResults();
    
        if ($pendingOrdersCount >= 5) {
            // Jika jumlah order dengan status 0 lebih dari atau sama dengan 5, kembalikan ke halaman pemesanan dengan pesan kesalahan
            return redirect()->to('product/order/' . $tempProduct['kode_product'])
                             ->with('error', 'Harap konfirmasi terlebih dahulu orderan Anda yang belum diproses. Batas maksimal adalah 5 orderan belum diproses.');
        }
    
        $selectedSize = $this->request->getPost('ukuran');
        $quantity = $this->request->getPost('quantity');
        $total_bayar = $tempProduct['harga_product'] * $quantity;
        $selectedColor = $this->request->getPost('warna');
        $metodePembayaran = $this->request->getPost('metode_pembayaran');
    
        // Simpan data transaksi produk ke dalam database
        $transactionalProductModel->save([
            'nama_produk' => $tempProduct['nama_product'],
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
        return redirect()->to('/dashboard')->with('success', 'Pesanan Anda berhasil disimpan. Silahkan cek di menu Kelola Pesanan untuk melakukan konfirmasi.');
    }
    

    public function cart()
    {
        $session = session();
        $userData = $session->get('user_data');
        // Pastikan data pengguna disimpan dalam sesi
        
        if (!$userData) {
            return redirect()->to('/login'); // Redirect jika pengguna belum login
        }
        
        $transactionalModel = new TransactionalModel();
        $transactions = $transactionalModel->getTransactionsWithStatus($userData['username']);
        
        return view('cart/index', [
            'transactions' => $transactions,
            'userData' => $userData
        ]);
    }

    public function confirmOrder($id)
    {
        $transactionalProductModel = new TransactionalModel();
        $transaction = $transactionalProductModel->find($id);

        return view('cart/confirm', [
            'transaction' => $transaction,
        ]);
    }

    public function updateOrder()
    {
        $transactionalProductModel = new TransactionalModel();
        
        $id = $this->request->getPost('id');
        $name = $this->request->getPost('pembeli');
        $address = $this->request->getPost('alamat');
        $telp = $this->request->getPost('telp');

        // Generate ticket_transaksi
        $ticket_transaksi = 'MEXV_TRX_' . strtoupper(uniqid());



        $transactionalProductModel->update($id, [
            'pembeli' => $name,
            'alamat' => $address,
            'telp' => $telp,
            'status' => '1' ,
            'ticket_transaksi' => $ticket_transaksi
        ]);

        return redirect()->to('/cart')->with('success', 'Pesanan Anda berhasil dikonfirmasi.');
    }

    public function cancelOrder($id)
    {
        $transactionalProductModel = new TransactionalModel();
        $transactionalProductModel->delete($id);

        return redirect()->to('/cart')->with('success', 'Pesanan Anda berhasil dibatalkan.');
    }

    public function manage_product_order()
    {
        // Instansiasi model
        $transactionalProductionModel = new TransactionalModel();
        $mappingStatusModel = new MappingStatusOrderModel();
    
        // Ambil data transaksi dengan status tertentu
        $data['transactions'] = $transactionalProductionModel->getTransactionsWithStatusOrder();
    
        // Ambil semua status yang tersedia
        $data['statuses'] = $mappingStatusModel->findAll();
    
        // Inisialisasi array untuk menyimpan jumlah order per bulan
        $orderCounts = [];
        foreach ($data['transactions'] as $transaction) {
            $month = date('F', strtotime($transaction['created_at']));
            if (!isset($orderCounts[$month])) {
                $orderCounts[$month] = 0;
            }
            $orderCounts[$month]++;
        }
    
        // Ambil nama-nama bulan untuk chart labels
        $data['months'] = array_keys($orderCounts);
        
        // Masukkan $orderCounts ke dalam $data
        $data['orderCounts'] = $orderCounts;
    
        // Kirim data ke view
        return view('product/manage_product_order', $data);
    }

    public function update_status_order($transactionId)
    {
        $transactionalProductionModel = new TransactionalModel();
        $mappingStatusModel = new MappingStatusOrderModel();

        // Ambil data transaksi berdasarkan $transactionId
        $transaction = $transactionalProductionModel->find($transactionId);

        if (!$transaction) {
            // Jika transaksi tidak ditemukan, redirect dengan flash message
            return redirect()->to(base_url('product/manage-product-order'))->with('error', 'Transaksi tidak ditemukan.');
        }

        // Ambil data status dari form
        $no_order = $this->request->getPost('ticket_transaksi');
        $newStatus = $this->request->getPost('status');

        // Validasi apakah status yang diambil ada di database
        $status = $mappingStatusModel->find($newStatus);

        if (!$status) {
            // Jika status tidak ditemukan, redirect dengan flash message
            return redirect()->to(base_url('product/manage-product-order'))->with('error', 'Status tidak valid.');
        }

        // Lakukan update status
        $transactionalProductionModel->update($transactionId, ['status' => $newStatus]);

        // Redirect dengan flash message
        return redirect()->to(base_url('product/manage-product-order'))->with('success', 'Status transaksi No Order : <strong>'.$no_order.'</strong> berhasil diperbarui.');
    }
}
