@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Sell Product</h1>
</div>

<form method="POST" action="" id="buy_form">
  @csrf
  <div class="row mb-3">
    <label for="product_name" class="col-md-2 col-form-label">Product Name</label>
    <div class="col-md-4">
      <input type="text" class="form-control" id="product_name" name='product_name' placeholder="Product Name" required>
    </div>
  </div>
  <div class="row mb-3">
    <label for="brand" class="col-md-2 col-form-label">Brand</label>
    <div class="col-md-4">
      <input type="text" class="form-control" id="brand" name='brand' placeholder="Brand" required>
    </div>
  </div>
  <div class="row mb-3">
    <label for="model_number" class="col-md-2 col-form-label">Model Number</label>
    <div class="col-md-4">
      <input type="text" class="form-control" id="model_number" name='model_number' placeholder="Model Number" required>
    </div>
  </div>
  <div class="row mb-3">
    <label for="serial_number" class="col-md-2 col-form-label">Serial Number</label>
    <div class="col-md-4">
      <input type="text" class="form-control" id="serial_number" name='serial_number' placeholder="Serial Number" required>
    </div>
  </div>
  <div class="row mb-3">
    <label for="prod_date" class="col-md-2 col-form-label">Production Date</label>
    <div class="col-md-4">
      <input type="date" class="form-control" id="prod_date" name='prod_date' required>
    </div>
  </div>
  <div class="row mb-3">
    <label for="waranty_start" class="col-md-2 col-form-label">Waranty Start</label>
    <div class="col-md-4">
      <input type="date" class="form-control" id="waranty_start" name='waranty_start' required>
    </div>
  </div>
  <div class="row mb-3">
    <label for="waranty_duration" class="col-md-2 col-form-label">Waranty Duration</label>
    <div class="col-md-4">
      <select class="form-select" form='buy_form' name='waranty_duration' id="waranty_duration" required>
        <option value="">Waranty Duration</option>
        <option value="1 Year">1 Year</option>
        <option value="2 Year">2 Year</option>
        <option value="3 Year">3 Year</option>
        <option value="4 Year">4 Year</option>
        <option value="5 Year">5 Year</option>
      </select>
    </div>
  </div>
  <div class="row mb-3">
    <label for="price" class="col-md-2 col-form-label">Price</label>
    <div class="col-md-4">
      <input type="number" class="form-control" id="price" name='price' placeholder="Price" required>
    </div>
  </div>
  <div class="row mb-3">
    <label for="image" class="col-md-2 col-form-label">Product Image</label>
    <div class="col-md-4">
      <input class="form-control" type="file" accept=".jpg,.jpeg,.png,.tiff,.gif" id="image" name='image'>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-7">
      <button type="submit" class="btn btn-danger mt-3"><i class="bi bi-cash-coin"></i> Sell</button>
    </div>
  </div>
</form>

<a href="/transactions" class="btn btn-dark mt-3 float-end"><span data-feather="arrow-left" class="align-text-bottom"></span> Return to Transaction List</a>

@endsection