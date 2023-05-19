@extends('dashboard.layout.main')
@php
    use Akaunting\Money\Money;
@endphp

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Product Lists</h1>
</div>

<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Product Name</th>
        <th scope="col">Brand</th>
        <th scope="col">Model Number</th>
        <th scope="col">Price</th>
        <th scope="col">Total Stock</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($products as $product)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $product->product_name }}</td>
        <td>{{ $product->brand }}</td>
        <td>{{ $product->model_number }}</td>
        <td>{{ Money::IDR($product->price, true) }}</td>
        <td>{{ $stocks->where('product_id', $product->id)->count() }}</td>
        <td>
          <a href="/dashboard/products/{{ $product->model_number }}" class='badge bg-info text-decoration-none pb-1'><span data-feather="eye" class="align-text-bottom"></span> Show Detail</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection