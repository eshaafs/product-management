@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Sell Product</h1>
</div>

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/transactions/sell">
  @csrf
  <div class="row mb-3">
    <label for="product_name" class="col-lg-2 col-form-label">Product Name</label>
    <div class="col-lg-4">
      <input type="text" class="form-control @error('product_name')
      is-invalid
    @enderror" id="product_name" name='product_name' value="{{ $stock->product->product_name }}" readonly>
    </div>
  </div>
  <div class="row mb-3">
    <label for="brand" class="col-lg-2 col-form-label">Brand</label>
    <div class="col-lg-4">
      <input type="text" class="form-control @error('brand')
      is-invalid
    @enderror" id="brand" name='brand' value="{{ $stock->product->brand }}" readonly>
    </div>
  </div>
  <div class="row mb-3">
    <label for="model_number" class="col-lg-2 col-form-label">Model Number</label>
    <div class="col-lg-4">
      <input type="text" class="form-control @error('model_number')
      is-invalid
    @enderror" id="model_number" name='model_number' value="{{ $stock->product->model_number }}" readonly>
    </div>
  </div>
  <div class="row mb-3">
    <label for="serial_number" class="col-lg-2 col-form-label">Serial Number</label>
    <div class="col-lg-4">
      <input type="text" class="form-control @error('serial_number')
      is-invalid
    @enderror" id="serial_number" name='serial_number' value="{{ $stock->serial_number }}" readonly>
    </div>
  </div>
  <div class="row mb-3">
    <label for="price" class="col-lg-2 col-form-label">Price</label>
    <div class="col-lg-4">
      <input type="number" class="form-control @error('price')
      is-invalid
    @enderror" id="price" name='price' value={{ $stock->price }}>
    </div>
  </div>
  <div class="row mb-3">
    <label for="discount" class="col-lg-2 col-form-label">Discount (%)</label>
    <div class="col-lg-4">
      <input type="number" class="form-control @error('discount')
      is-invalid
    @enderror" id="discount" name='discount' value=0>
    </div>
  </div>  
  <div class="row mb-3">
    <label for="customer_or_vendor" class="col-lg-2 col-form-label">Customer or Vendor</label>
    <div class="col-lg-4">
      <input type="text" class="form-control @error('customer_or_vendor')
      is-invalid
    @enderror" id="customer_or_vendor" name='customer_or_vendor' placeholder="Customer or Vendor" required>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-7">
      <button type="submit" class="btn btn-danger mt-2"><i class="bi bi-cash-coin"></i> Sell</button>
    </div>
  </div>
</form>


<a href="/transactions" class="btn btn-dark position-absolute" style="bottom: 5%; right: 5%"><span data-feather="arrow-left" class="align-text-bottom"></span> Return to Transaction List</a>
@endsection
