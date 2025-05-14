<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PawnTransaction;

class TransactionHistoryController extends Controller
{
    public function index()
    {
        $transactions = PawnTransaction::with('customer', 'pawnItem')
            ->orderBy('transaction_date', 'desc')
            ->paginate(10);

        return view('admin.transaction-history.index', compact('transactions'));
    }
}
