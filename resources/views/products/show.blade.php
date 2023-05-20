@extends('layouts.main')
@php
    use Akaunting\Money\Money;
@endphp

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">{{ $product->brand }} {{ $product->product_name }}</h1>
</div>
<div class="row justify-content-center">
  <div class="col-md-3">
    <picture>
      <source srcset="/img/{{ $product->image }}, /storage/img/{{ $product->image }}" />
      <img src="/storage/img/{{ $product->image }}" class="img-thumbnail mx-auto" style="width:250px; height:250px" alt="{{ $product->brand . ' ' . $product->product_name }}">
    </picture>    
  </div>
  <div class="col-md-3 p-0 m-0">
    <table class="table">
      <tbody>
        <tr>
          <td>Product Name</td>
          <td>{{ $product->product_name }}</td>
        </tr>
        <tr>
          <td>Brand</td>
          <td>{{ $product->brand }}</td>
        </tr>
        <tr>
          <td>Model Number</td>
          <td>{{ $product->model_number }}</td>
        </tr>
        <tr>
          <td>Price</td>
          <td>{{ Money::IDR($product->price, true) }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<h4 class="mt-5 mb-3 pb-2 border-bottom">Stock List</h4>

<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Serial Number</th>
        <th scope="col">Production Date</th>
        <th scope="col">Waranty Start</th>
        <th scope="col">Waranty Duration</th>
        <th scope="col">Price</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($stocks as $stock)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $stock->serial_number }}</td>
        <td>{{ $stock->prod_date }}</td>
        <td>{{ $stock->waranty_start }}</td>
        <td>{{ $stock->waranty_duration }}</td>
        <td>{{ Money::IDR($stock->price, true) }}</td>
        <td>
          <a href="/transactions/sell?serial_number={{ $stock->serial_number }}" class='badge bg-danger text-decoration-none p-2'><i class="bi bi-cash-coin"> Sell</i></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<a href="/products" class="btn btn-dark position-absolute" style="bottom: 5%; right: 5%"><span data-feather="arrow-left" class="align-text-bottom"></span> Return to Product List</a>

@endsection