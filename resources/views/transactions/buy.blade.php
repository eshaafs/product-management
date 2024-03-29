@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Buy New Product</h1>
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

<form method="POST" action="/transactions" enctype="multipart/form-data">
  @csrf
  <div class="row mb-3">
    <label for="product_name" class="col-lg-2 col-form-label">Product Name</label>
    <div class="col-lg-4">
      <input type="text" class="form-control @error('product_name')
      is-invalid
    @enderror" id="product_name" name='product_name' placeholder="Product Name" value="{{ old('product_name') }}" required>
    </div>
  </div>
  <div class="row mb-3">
    <label for="brand" class="col-lg-2 col-form-label">Brand</label>
    <div class="col-lg-4">
      <input type="text" class="form-control @error('brand')
      is-invalid
    @enderror" id="brand" name='brand' placeholder="Brand" value="{{ old('brand') }}" required>
    </div>
  </div>
  <div class="row mb-3">
    <label for="model_number" class="col-lg-2 col-form-label">Model Number</label>
    <div class="col-lg-4">
      <input type="text" class="form-control @error('model_number')
      is-invalid
    @enderror" id="model_number" name='model_number' placeholder="Model Number" value="{{ old('model_number') }}" required>
    </div>
  </div>
  <div class="row mb-3">
    <label for="serial_number" class="col-lg-2 col-form-label">Serial Number</label>
    <div class="col-lg-4">
      <input type="text" class="form-control @error('serial_number')
      is-invalid
    @enderror" id="serial_number" name='serial_number' placeholder="Serial Number" value="{{ old('serial_number') }}" required>
    </div>
  </div>
  <div class="row mb-3">
    <label for="prod_date" class="col-lg-2 col-form-label">Production Date</label>
    <div class="col-lg-4">
      <input type="date" class="form-control @error('prod_date')
      is-invalid
    @enderror" id="prod_date" name='prod_date' value="{{ old('prod_date') }}" required>
    </div>
  </div>
  <div class="row mb-3">
    <label for="waranty_start" class="col-lg-2 col-form-label">Waranty Start</label>
    <div class="col-lg-4">
      <input type="date" class="form-control @error('waranty_start')
      is-invalid
    @enderror" id="waranty_start" name='waranty_start' value="{{ old('waranty_start') }}" required>
    </div>
  </div>
  <div class="row mb-3">
    <label for="waranty_duration" class="col-lg-2 col-form-label">Waranty Duration</label>
    <div class="col-lg-4">
      <select class="form-select @error('waranty_duration')
      is-invalid
    @enderror" name='waranty_duration' id="waranty_duration" required>
        <option value="">Waranty Duration</option>
        <option value="1 Year" @if (old('waranty_duration') == "1 Year")
          selected>1 Year</option>
          @else
          >1 Year</option>
        @endif
        <option value="2 Year" @if (old('waranty_duration') == "2 Year")
          selected>2 Year</option>
          @else
          >2 Year</option>
        @endif
        <option value="3 Year" @if (old('waranty_duration') == "3 Year")
          selected>3 Year</option>
          @else
          >3 Year</option>
        @endif
      </select>
    </div>
  </div>
  <div class="row mb-3">
    <label for="price" class="col-lg-2 col-form-label">Price</label>
    <div class="col-lg-4">
      <input type="number" class="form-control @error('price')
      is-invalid
    @enderror" id="price" name='price' placeholder="Price" value="{{ old('price') }}" required>
    </div>
  </div>
  <div class="row mb-3">
    <label for="discount" class="col-lg-2 col-form-label">Discount (%)</label>
    <div class="col-lg-4">
      <input type="number" class="form-control @error('discount')
      is-invalid
    @enderror" id="discount" name='discount' placeholder="Discount" value="{{ old('discount') }}" required>
    </div>
  </div>
  <div class="row mb-3">
    <label for="customer_or_vendor" class="col-lg-2 col-form-label">Customer or Vendor</label>
    <div class="col-lg-4">
      <input type="text" class="form-control @error('customer_or_vendor')
      is-invalid
    @enderror" id="customer_or_vendor" name='customer_or_vendor' placeholder="Customer or Vendor" value="{{ old('customer_or_vendor') }}" required>
    </div>
  </div>
  <div class="row mb-3">
    <label for="image" class="col-lg-2 col-form-label">Product Image</label>
    <div class="col-lg-4">
      <input class="form-control @error('image')
      is-invalid
    @enderror" type="file" accept=".jpg,.jpeg,.png,.tiff,.gif" id="image" name='image'>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-7">
      <button type="submit" class="btn btn-success mt-2"><i class="bi bi-cart3"></i> Buy</button>
    </div>
  </div>
</form>

<a href="/transactions" class="btn btn-dark position-absolute" style="bottom: 5%; right: 5%"><span data-feather="arrow-left" class="align-text-bottom"></span> Return to Transaction List</a>
@endsection