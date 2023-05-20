@extends('layouts.main')

@section('container')


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">New Transaction</h1>
</div>

@if (session()->has('transaction_status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('transaction_status') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<a href="/transactions/buy" class="btn btn-success me-2 mb-3"><i class="bi bi-cart3"></i> Buy Product</a>
<a href="/transactions/listSellProduct" class="btn btn-danger mb-3"><i class="bi bi-cash-coin"></i> Sell Product</a>

@can('admin')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">List Transactions</h1>
</div>

<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Transaction Number</th>
        <th scope="col">Transaction Date</th>
        <th scope="col">Customer or Vendor</th>
        <th scope="col">Transaction Type</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($transactions as $transaction)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $transaction->transaction_number }}</td>
        <td>{{ $transaction->transaction_date }}</td>
        <td>{{ $transaction->customer_or_vendor }}</td>
        <td>{{ $transaction->transaction_type }}</td>
        <td>
          <a href="/transactions/{{ $transaction->transaction_number }}" class='badge bg-dark text-decoration-none p-2'><span data-feather="eye" class="align-text-bottom"></span> Show Detail</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endcan
@endsection