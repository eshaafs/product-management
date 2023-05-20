<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Product;
use App\Models\SerialNumber;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
        // @dd($request);
        $validatedData = $request->validate([
            'product_name' => 'required|max:255',
            'brand' => ['required', 'max:255'],
            'model_number' => 'required|max:255',
            'serial_number' => 'required|max:255|unique:serial_numbers',
            'prod_date' => 'required|date',
            'waranty_start' => 'required|date',
            'waranty_duration' => 'required|max:255',
            'price' => 'required|numeric',
            'customer_or_vendor' => 'required|max:255',
            'image' => 'image|file|max:1024'
        ]);

        $name = $validatedData['brand'] . ' ' . $validatedData['product_name'] . '.' . $validatedData['image']->extension();
        $validatedData['image'] = $request->file('image')->storeAs('img', $name);
        
        $newProduct = [
            'product_name' => $validatedData['product_name'],
            'brand' => $validatedData['brand'],
            'model_number' => $validatedData['model_number'],
            'price' => $validatedData['price'],
            'image' => $name
        ];

        
        $productIsExist = Product::firstWhere('model_number',$validatedData['model_number']);
        if(!$productIsExist){
            Product::create($newProduct);
        }

        $productId = Product::where('model_number', $validatedData['model_number'])->value('id');
        if($productId){
            $newSerialNumber = [
                'product_id' => $productId,
                'serial_number' => $validatedData['serial_number'],
                'prod_date' => $validatedData['prod_date'],
                'waranty_start' => $validatedData['waranty_start'],
                'waranty_duration' => $validatedData['waranty_duration'],
                'price' => $validatedData['price'],
                'used' => false
            ];
            SerialNumber::create($newSerialNumber);
        }

        $transactionDate = Carbon::now()->toDateTimeString();
        // @dd($transactionDate);
        $newTransaction = [
            'transaction_date' => now(),
            'transaction_number' => 'BUY-'. mt_rand(1,100000),
            'customer_or_vendor' => $validatedData['customer_or_vendor'],
            'transaction_type' => 'buy'
        ];
        
        Transaction::create($newTransaction);
        

        return redirect(route('transactions.index'));
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
