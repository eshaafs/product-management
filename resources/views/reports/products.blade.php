@extends('layouts.main')
@php
    use Akaunting\Money\Money;
@endphp

@section('container')

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Navbar Report --}}
<div class="border-bottom pb-3 mt-3">
  <ul class="nav nav-underline">
    <li class="nav-item me-3">
      <h2>Reports</h2>
    </li>
    <li class="nav-item">
      <a class="nav-link text-dark fw-medium" href="/reports?id=transactions">Transactions</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-dark fw-bolder active" href="/reports?id=products">Products</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-dark fw-medium" href="/reports?id=graph">Graph</a>
    </li>
  </ul>
</div>

{{-- content --}}
<h5 class="my-4">Products List</h5>
{{-- @dd($product_status); --}}
<form action="" method="get">
  <input type="hidden" name="id" value="products">
  <div class="row">
    <div class="col-lg-3">
        <select class="form-select mb-5 @error('product_status')
        is-invalid
      @enderror" name="product_status" required>
          {{-- <option value="">Product Status</option> --}}
          <option value="available" @if (isset($_GET['product_status']) and $_GET['product_status'] === 'available')
          selected>Available</option>
          @else
          >Available</option>
          @endif
          <option value="sold" @if (isset($_GET['product_status']) and $_GET['product_status'] === 'sold')
          selected>Sold</option>
          @else
          >Sold</option>
          @endif>
        </select>
      </div>
    <div class="col">
      <button type="submit" class="btn btn-dark">Filter</button>
    </div>
  </div>
</form>

<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Product Name</th>
        <th scope="col">Brand</th>
        <th scope="col">Model Number</th>
        <th scope="col">Price</th>
        <th scope="col">@if ($product_status === 'available')
          Stocks
        @else
          Sold
        @endif</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @php
        $i=1;
      @endphp
      @foreach ($products as $product)
      @php
        $product_status === 'available' ? $product_status = 0 : $product_status = 1;
        $count = $serial_numbers->where('product_id',$product->id)->count();
      @endphp
      @if ($count === 0)
          @continue
      @endif
          <tr>
            <td>{{ $i }}</td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->brand }}</td>
            <td>{{ $product->model_number }}</td>
            <td>{{ Money::IDR($product->price, true) }}</td>
            <td>{{ $count }}</td>
            <td>
              <a href="/products/{{ $product->model_number }}?back=products-report&{{ $product_status === 0?'product_status=available':'product_status=sold'}}" class='badge bg-dark text-decoration-none p-2'><span data-feather="eye" class="align-text-bottom"></span> Show Detail</a>
            </td>
          </tr>
        @php
          $i++;
        @endphp
      @endforeach
    </tbody>
  </table>
</div>

@endsection
