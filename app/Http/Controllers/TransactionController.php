<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaction;
use App\Models\Transaction;
use App\Models\Product;
use App\Models\SerialNumber;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function sell(Request $request)
    {
        return view('transactions.sell',[
            'stock' => SerialNumber::firstWhere('serial_number', $request->serial_number)
        ]);
    }

    public function sellProduct(Request $request){
        $validatedData = $request->validate([
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
            'customer_or_vendor' => 'required|max:255'
        ]);

        $product = SerialNumber::firstWhere('serial_number', $request->serial_number);
        $product->update([$product->used = true]);

        $newTransaction = [
            'transaction_date' => now(),
            'transaction_number' => 'SELL' . mt_rand(1,100000),
            'customer_or_vendor' => $validatedData['customer_or_vendor'],
            'transaction_type' => 'Sell'
        ];

        Transaction::create($newTransaction);

        $transactionId = Transaction::where('transaction_number', $newTransaction['transaction_number'])->value('id');
        $newDetailTransaction = [
            'transaction_id' => $transactionId,
            'product_id' => SerialNumber::where('serial_number', $request->serial_number)->value('product_id'),
            'serial_number' => $request->serial_number,
            'price' => $validatedData['price'],
            'discount' => $validatedData['discount']
        ];

        DetailTransaction::create($newDetailTransaction);
        return redirect(route('transactions.index'))->with('transaction_status', 'Transaction Success!');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('transactions.index',[
            'transactions' => Transaction::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if($_GET['type'] === 'buy'){
            return view('transactions.buy');
        } else if($_GET['type'] === 'sell'){
            return view ('transactions.listSellProduct', [
                'products' => Product::all(),
                'stocks' => SerialNumber::where('used',false)->get()
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|max:255',
            'brand' => ['required', 'max:255'],
            'model_number' => 'required|max:255',
            'serial_number' => 'required|max:255|unique:serial_numbers',
            'prod_date' => 'required|date',
            'waranty_start' => 'required|date',
            'waranty_duration' => 'required|max:255',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
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
        $date = Carbon::now()->tz('Asia/Jakarta');
        $newTransaction = [
            'transaction_date' => $date,
            'transaction_number' => 'BUY-'. mt_rand(1,100000),
            'customer_or_vendor' => $validatedData['customer_or_vendor'],
            'transaction_type' => 'Buy'
        ];
        
        Transaction::create($newTransaction);
        
        $transactionId = Transaction::where('transaction_number', $newTransaction['transaction_number'])->value('id');
        $newDetailTransaction = [
            'transaction_id' => $transactionId,
            'product_id' => $productId,
            'serial_number' => $validatedData['serial_number'],
            'price' => $validatedData['price'],
            'discount' => $validatedData['discount']
        ];

        DetailTransaction::create($newDetailTransaction);
        return redirect(route('transactions.index'))->with('transaction_status', 'Transaction Success!');
    }

    /**
     * Display the specified resource.
     */
    public function show(transaction $transaction, Request $request)
    {
        return view('transactions.show', [
            'transaction' => $transaction,
            'transaction_detail' => DetailTransaction::firstWhere('transaction_id', $transaction->id),
            'back' => $request->back
        ]);
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
