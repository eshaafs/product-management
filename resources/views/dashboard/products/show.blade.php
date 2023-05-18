@extends('dashboard.layout.main')
@php
    use Akaunting\Money\Money;
@endphp

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">{{ $product->brand }} {{ $product->product_name }}</h1>
</div>
<div class="row">
  <div class="col-md-6">
    <img src="/img/{{ $product->image }}" class="img-thumbnail float-end me-3" style="width:250px; height:250px"alt="{{ $product->brand . ' ' .$product->product_name }}">
  </div>
  <div class="col-md-3">
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

</div>

@endsection