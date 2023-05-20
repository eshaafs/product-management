@extends('layouts.main')
@php
    use Akaunting\Money\Money;
@endphp

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Sell Product</h1>
</div>

<table class="table table-striped table-sm">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Serial Number</th>
      <th scope="col">Brand</th>
      <th scope="col">Product Name</th>
      <th scope="col">Model Number</th>
      <th scope="col">Price</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($stocks as $stock)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $stock->serial_number }}</td>
      <td>{{ $stock->product->brand }}</td>
      <td>{{ $stock->product->product_name }}</td>
      <td>{{ $stock->product->model_number }}</td>
      <td>{{ Money::IDR($stock->price, true) }}</td>
      <td>
        <a href="/transactions/sell?serial_number={{ $stock->serial_number }}" class='badge bg-danger text-decoration-none p-2'><i class="bi bi-cash-coin"> Sell</i></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<a href="/transactions" class="btn btn-dark position-absolute" style="bottom: 5%; right: 5%"><span data-feather="arrow-left" class="align-text-bottom"></span> Return to Transaction List</a>

@endsection