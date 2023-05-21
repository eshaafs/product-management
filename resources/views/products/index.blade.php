@extends('layouts.main')
@php
    use Akaunting\Money\Money;
@endphp

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">List Products</h1>
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
      @php
        $i=1;
      @endphp
      @foreach ($products as $product)
        @if ($stocks->where('product_id', $product->id)->count() > 0)
          <tr>
            <td>{{ $i }}</td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->brand }}</td>
            <td>{{ $product->model_number }}</td>
            <td>{{ Money::IDR($product->price, true) }}</td>
            <td>{{ $stocks->where('product_id', $product->id)->count() }}</td>
            <td>
              <a href="/products/{{ $product->model_number }}" class='badge bg-dark text-decoration-none p-2'><span data-feather="eye" class="align-text-bottom"></span> Show Detail</a>
            </td>
          </tr>
          @php
            $i++;
          @endphp
        @endif
      @endforeach
    </tbody>
  </table>
</div>

@endsection