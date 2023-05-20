@extends('layouts.main')
@php
    use Akaunting\Money\Money;
@endphp

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">{{ $transaction->transaction_number }} - Transaction Detail</h1>
</div>
<div class="row justify-content-center">
  <div class="col-md-3">
    <img src="/storage/img/{{ $transaction_detail->product->image }}" alt="{{ $transaction_detail->product->brand . ' ' . $transaction_detail->product->product_name }}" srcset="/img/{{ $transaction_detail->product->image }}, /storage/img/{{ $transaction_detail->product->image }}" class="img-thumbnail mx-auto mb-3" style="width:250px; height:250px">
  </div>
</div>
<div class="row justify-content-center">
  <div class="table-responsive col-lg-8">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Key</th>
          <th scope="col">Value</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td scope="col">1</td>
          <td scope="col">Transaction Number</td>
          <td scope="col">{{ $transaction->transaction_number }}</td>
        </tr>
        <tr>
          <td scope="col">2</td>
          <td scope="col">Transaction Date</td>
          <td scope="col">{{ $transaction->transaction_date }}</td>
        </tr>
        <tr>
          <td scope="col">3</td>
          <td scope="col">Transaction Type</td>
          <td scope="col">{{ $transaction->transaction_type }}</td>
        </tr>
        <tr>
          <td scope="col">4</td>
          <td scope="col">Customer or Vendor</td>
          <td scope="col">{{ $transaction->customer_or_vendor }}</td>
        </tr>
        <tr>
          <td scope="col">5</td>
          <td scope="col">Product Name</td>
          <td scope="col">{{ $transaction_detail->product->product_name }}</td>
        </tr>
        <tr>
          <td scope="col">6</td>
          <td scope="col">Serial Number</td>
          <td scope="col">{{ $transaction_detail->serial_number }}</td>
        </tr>
        <tr>
          <td scope="col">7</td>
          <td scope="col">Brand</td>
          <td scope="col">{{ $transaction_detail->product->brand }}</td>
        </tr>
        <tr>
          <td scope="col">8</td>
          <td scope="col">Price</td>
          <td scope="col">{{ Money::IDR($transaction_detail->price, true) }}</td>
        </tr>
        <tr>
          <td scope="col">9</td>
          <td scope="col">Discount</td>
          <td scope="col">{{ $transaction_detail->discount }}%</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<a href="/transactions" class="btn btn-dark position-absolute" style="bottom: 5%; right: 5%"><span data-feather="arrow-left" class="align-text-bottom"></span> Return to Transaction List</a>
@endsection