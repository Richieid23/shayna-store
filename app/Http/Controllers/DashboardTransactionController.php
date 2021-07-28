<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardTransactionController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sellTransaction = TransactionDetail::with(['transaction.user', 'product.galleries'])->whereHas('product', function ($product) {
            $product->where('users_id', Auth::user()->id);
        });

        $buyTransaction = TransactionDetail::with(['transaction.user', 'product.galleries'])->whereHas('transaction', function ($transaction) {
            $transaction->where('users_id', Auth::user()->id);
        })->get();

        return view('pages.dashboard-transactions', [
            'sellTransactions' => $sellTransaction,
            'buyTransactions' => $buyTransaction
        ]);
    }

    public function details()
    {
        return view('pages.dashboard-transactions-details');
    }
}
