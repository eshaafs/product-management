<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SerialNumber;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        return view('products.index', [
            'products' => Product::all(),
            'stocks' => SerialNumber::where('used',false)->get()
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product, Request $request)
    {
        $back = $request->back;
        $product_status = $request->product_status;

        if($product_status == "sold"){
            return view('products.show', [
                'product' => $product,
                'stocks' => SerialNumber::where('used',true)->where('product_id',$product->id)->get(),
                'back' => $back,
                'product_status' => $product_status 
            ]);
        }

        return view('products.show', [
            'product' => $product,
            'stocks' => SerialNumber::where('used',false)->where('product_id',$product->id)->get(),
            'back' => $back,
            'product_status' => $product_status 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
