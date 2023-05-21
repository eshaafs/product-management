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
      <a class="nav-link text-dark fw-bolder active" href="/reports?id=transactions">Transactions</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-dark fw-medium" href="/reports?id=products">Products</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-dark fw-medium" href="/reports?id=graph">Graph</a>
    </li>
  </ul>
</div>

{{-- content --}}
<h5 class="my-4">Transations List</h5>

<form action="" method="get">
  <input type="hidden" name="id" value="transactions">
  <div class="row">
    <div class="col-lg-3">
        <select class="form-select mb-5 @error('transaction_type')
        is-invalid
      @enderror" name="transaction_type" required>
          <option value="">Transaction Type</option>
          <option value="all" @if (isset($_GET['transaction_type']) and $_GET['transaction_type'] === 'all')
          selected>All</option>
          @else
          >All</option>
          @endif
          <option value="sell" @if (isset($_GET['transaction_type']) and $_GET['transaction_type'] === 'sell')
          selected>Sell</option>
          @else
          >Sell</option>
          @endif>
          <option value="buy" @if (isset($_GET['transaction_type']) and $_GET['transaction_type'] === 'buy')
          selected>Buy</option>
          @else
          >Buy</option>
          @endif
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
        <th scope="col">Transaction Number</th>
        <th scope="col">Transaction Date</th>
        <th scope="col">Customer or Vendor</th>
        <th scope="col">Transaction Type</th>
        <th scope="col">Product Name</th>
        <th scope="col">Brand</th>
        <th scope="col">Price</th>
        <th scope="col">Discount</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($transactions as $transaction)
      @php
          $transaction_detail = $transaction_details->firstWhere('transaction_id', $transaction->id)
      @endphp
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $transaction->transaction_number }}</td>
        <td>{{ $transaction->transaction_date }}</td>
        <td>{{ $transaction->customer_or_vendor }}</td>
        <td>{{ $transaction->transaction_type }}</td>
        <td>{{ $transaction_detail->product->product_name }}</td>
        <td>{{ $transaction_detail->product->brand }}</td>
        <td>{{ Money::IDR($transaction_detail->price, true) }}</td>
        <td>{{ $transaction_detail->discount }}%</td>
        <td>
          <a href="/transactions/{{ $transaction->transaction_number }}?back=transaction-report" class='badge bg-dark text-decoration-none p-2'><span data-feather="eye" class="align-text-bottom"></span> Show Detail</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection
