<?php

namespace App\Controllers;

use App\Models\TransactionalModel;
use CodeIgniter\Controller;

class CartController extends Controller
{
    public function index()
    {
        $session = session();
        $userData = $session->get('user_data');
        // Pastikan data pengguna disimpan dalam sesi
        
        if (!$userData) {
            return redirect()->to('/login'); // Redirect jika pengguna belum login
        }
        
        $transactionalModel = new TransactionalModel();
        $transactions = $transactionalModel->where('user_login', $userData['username'])->findAll();
        
        return view('cart/index', [
            'transactions' => $transactions,
            'userData' => $userData
        ]);
    }
}
