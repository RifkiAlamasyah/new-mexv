<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    // Aturan validasi
    public $userRegister = [
        'nama' => 'required',
        'alamat' => 'required',
        'jenis_kelamin' => 'required',
        'no_telp' => 'required|min_length[10]',
        'username' => 'required|is_unique[user.username]',
        'password' => 'required'
    ];
    

    public $addProduk = [
        'kode_produk' => 'required',
        'nama_produk' => 'required',
        'harga_produk' => 'required',
        'gambar_produk' => [
            'uploaded[gambar_produk]',
            'mime_in[gambar_produk,image/jpg,image/jpeg,image/png]', // Hanya izinkan tipe gambar tertentu
            'max_size[gambar_produk,5024]' // Maksimal ukuran gambar 5MB
        ],
        'deskripsi_produk' => 'required',
    ];

    public $orderProduk = [
        'quantity' => 'required',
        'ukuran' => 'required'
    ];
  

    // Pesan kesalahan validasi
    public $validationMessages = [
        'nama' => [
            'required' => 'Kolom Nama wajib diisi.'
        ],
        'alamat' => [
            'required' => 'Kolom Alamat wajib diisi.'
        ],
        'jenis_kelamin' => [
            'required' => 'Kolom Jenis Kelamin wajib diisi.'
        ],
        'no_telp' => [
            'required' => 'Kolom No. Telepon wajib diisi.',
            'min_length' => 'No. Telepon harus memiliki panjang minimal 10 karakter.'
        ],
        'username' => [
            'required' => 'Kolom Username wajib diisi.',
            'is_unique' => 'Username sudah ada sebelumnya.'
        ],
        'password' => [
            'required' => 'Kolom Password wajib diisi.'
        ]
    ];

    public $addMessages = [
        'kode_produk' => [
            'required' => 'Kolom Kode Produk wajib diisi.'
        ],
        'nama_produk' => [
            'required' => 'Kolom Nama Produk wajib diisi.'
        ],
        'harga_produk' => [
            'required' => 'Kolom Harga Produk wajib diisi.'
        ],
    ];


}
