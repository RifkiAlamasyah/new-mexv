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
            'status' => '1' ,// Update status menjadi '1' (Confirmed)
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
}
