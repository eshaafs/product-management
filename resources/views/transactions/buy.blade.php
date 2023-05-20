@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Buy New Product</h1>
</div>

<form method="POST" action="{{ route('transactions.store') }}" enctype="multipart/form-data">
  @csrf
  <div class="row mb-3">
    <label for="product_name" class="col-md-2 col-form-label">Product Name</label>
    <div class="col-md-4">
      <input type="text" class="form-control @error('product_name')
      is-invalid
    @enderror" id="product_name" name='product_name' placeholder="Product Name" value="{{ old('product_name') }}" required>
    </div>
    @error('product_name')
    <div class="invalid-feedback col-md-4">{{ $message }}</div>
    @enderror
  </div>
  <div class="row mb-3">
    <label for="brand" class="col-md-2 col-form-label">Brand</label>
    <div class="col-md-4">
      <input type="text" class="form-control @error('brand')
      is-invalid
    @enderror" id="brand" name='brand' placeholder="Brand" value="{{ old('brand') }}" required>
    </div>
    @error('brand')
    <div class="invalid-feedback col-md-4">{{ $message }}</div>
    @enderror
  </div>
  <div class="row mb-3">
    <label for="model_number" class="col-md-2 col-form-label">Model Number</label>
    <div class="col-md-4">
      <input type="text" class="form-control @error('model_number')
      is-invalid
    @enderror" id="model_number" name='model_number' placeholder="Model Number" value="{{ old('model_number') }}" required>
    </div>
    @error('model_number')
    <div class="invalid-feedback col-md-4">{{ $message }}</div>
    @enderror
  </div>
  <div class="row mb-3">
    <label for="serial_number" class="col-md-2 col-form-label">Serial Number</label>
    <div class="col-md-4">
      <input type="text" class="form-control @error('serial_number')
      is-invalid
    @enderror" id="serial_number" name='serial_number' placeholder="Serial Number" value="{{ old('serial_number') }}" required>
    </div>
    @error('serial_number')
    <div class="invalid-feedback col-md-4">{{ $message }}</div>
    @enderror
  </div>
  <div class="row mb-3">
    <label for="prod_date" class="col-md-2 col-form-label">Production Date</label>
    <div class="col-md-4">
      <input type="date" class="form-control @error('prod_date')
      is-invalid
    @enderror" id="prod_date" name='prod_date' value="{{ old('prod_date') }}" required>
    </div>
    @error('prod_date')
    <div class="invalid-feedback col-md-4">{{ $message }}</div>
    @enderror
  </div>
  <div class="row mb-3">
    <label for="waranty_start" class="col-md-2 col-form-label">Waranty Start</label>
    <div class="col-md-4">
      <input type="date" class="form-control @error('waranty_start')
      is-invalid
    @enderror" id="waranty_start" name='waranty_start' value="{{ old('waranty_start') }}" required>
    </div>
    @error('waranty_start')
    <div class="invalid-feedback col-md-4">{{ $message }}</div>
    @enderror
  </div>
  <div class="row mb-3">
    <label for="waranty_duration" class="col-md-2 col-form-label">Waranty Duration</label>
    <div class="col-md-4">
      <select class="form-select @error('waranty_duration')
      is-invalid
    @enderror" name='waranty_duration' id="waranty_duration" required>
        <option value="">Waranty Duration</option>
        <option value="1 Year">1 Year</option>
        <option value="2 Year">2 Year</option>
        <option value="3 Year">3 Year</option>
      </select>
    </div>
    @error('waranty_duration')
    <div class="invalid-feedback col-md-4">{{ $message }}</div>
    @enderror
  </div>
  <div class="row mb-3">
    <label for="price" class="col-md-2 col-form-label">Price</label>
    <div class="col-md-4">
      <input type="number" class="form-control @error('price')
      is-invalid
    @enderror" id="price" name='price' placeholder="Price" value="{{ old('price') }}" required>
    </div>
    @error('price')
    <div class="invalid-feedback col-md-4">{{ $message }}</div>
    @enderror
  </div>
  <div class="row mb-3">
    <label for="image" class="col-md-2 col-form-label">Product Image</label>
    <div class="col-md-4">
      <input class="form-control @error('image')
      is-invalid
    @enderror" type="file" accept=".jpg,.jpeg,.png,.tiff,.gif" id="image" name='image'>
    </div>
    @error('image')
    <div class="invalid-feedback col-md-4">{{ $message }}</div>
    @enderror
  </div>
  <div class="row justify-content-center">
    <div class="col-md-7">
      <button type="submit" class="btn btn-success mt-2"><i class="bi bi-cart3"></i> Buy</button>
    </div>
  </div>
</form>

<a href="{{ route('transactions.index') }}" class="btn btn-dark mt-3 float-end"><span data-feather="arrow-left" class="align-text-bottom"></span> Return to Transaction List</a>

@endsection