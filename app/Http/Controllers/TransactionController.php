<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TransactionController extends Controller
{
    public function buy()
    {
        return view('transactions.buy');
    }

    public function sell()
    {
        return view('transactions.sell');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('transactions.index',[
            'transactions' => Transaction::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // // return $request;
        // return $request->image->store('test');
        $validatedData = $request->validate([
            'product_name' => 'required|max:255',
            'brand' => ['required', 'max:255'],
            'model_number' => 'required|max:255|unique:products',
            'serial_number' => 'required|max:255|unique:serial_numbers',
            'production_date' => 'required|date',
            'waranty_start' => 'required|date',
            'waranty_duration' => 'required|max:255',
            'price' => 'required|numeric',
            'image' => 'image'
        ]);

        @dd($request);
        $validatedData['image'] = $request->file('image')->store('image');
        // return redirect('/')->with('buy', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(transaction $transaction)
    {
        return "Halaman transaksi jual/beli";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(transaction $transaction)
    {
        //
    }

}
