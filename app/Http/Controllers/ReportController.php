<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\SerialNumber;
use App\Models\Transaction;
use App\Models\DetailTransaction;

class ReportController extends Controller
{
    public function index()
    {
        // Authorization using Gate
        // $this->authorize('super.admin');
        
        return view('reports.index', [
            'products' => Product::all(),
            'serial_number' => SerialNumber::all(),
            'transactions' => Transaction::latest()->get(),
            'transaction_details' => DetailTransaction::all()
        ]);
    }
}
