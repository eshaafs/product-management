@extends('layouts.main')
@php
    use Akaunting\Money\Money;
@endphp

@section('container')
{{-- Navbar Report --}}
<div class="border-bottom pb-3 mt-3">
  <ul class="nav nav-underline">
    <li class="nav-item me-3">
      <h2>Charts</h2>
    </li>
    <li class="nav-item">
      <a class="nav-link text-dark fw-medium" href="/reports?id=transactions">Transactions</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-dark fw-medium" href="/reports?id=products">Products</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-dark fw-bolder active" href="/reports?id=graph">Graph</a>
    </li>
  </ul>
</div>

{{-- content --}}
<div class="row d-flex justify-content-center mx-3 border-bottom">
  <div class="col-lg-12">
    <center><canvas id="dailyChart" style="width:100%;max-height:400px"></canvas></center>
  </div>
</div>
<div class="row mx-3">
  <div class="col-md-6">
    <canvas id="monthlySales" style="width:100%;max-width:600px"></canvas>
  </div>
  <div class="col-md-6">
    <canvas id="monthlyExpense" style="width:100%;max-width:600px"></canvas>
  </div>
</div>
<div class="row mx-3">
  <div class="col-md-6">
    <canvas id="monthlySoldProduct" style="width:100%;max-width:600px"></canvas>
  </div>
  <div class="col-md-6">
    <canvas id="monthlyBoughtProduct" style="width:100%;max-width:600px"></canvas>
  </div>
</div>

<script>
  // LINE CHART
  const xValuesDaily = [
    <?php 
    foreach ($daily_sales_date as $date1) {
      echo $date1 . ', ';
    }
    ?>
  ];
  const yValuesDaily = [ 
    <?php 
    foreach ($daily_sales as $sales) {
      echo $sales . ', ';
    }
    ?>
  ];

new Chart("dailyChart", {
  type: "line",
  data: {
    labels: xValuesDaily,
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(0,0,255,1.0)",
      borderColor: "rgba(0,0,255,0.1)",
      data: yValuesDaily
    }]
  },
  options: {
    legend: {display: false},
    title: {
        display: true,
        text: "Daily Profit May 2023"
      }
  }
});

  // BAR CHART
  // Sales Chart Data
  var xValuesSales = [
    <?php 
    foreach ($total_sales_month as $month) {
      echo '"' .$month . '", ';
    }
    ?>
  ];
  var yValuesSales = [ 
    <?php 
    foreach ($total_sales as $sales) {
      echo $sales . ', ';
    }
    ?>
  ];

  // Expense Chart Data
  var xValuesExpense = [
    <?php 
    foreach ($total_expense_month as $month) {
      echo '"' .$month . '", ';
    }
    ?>
  ];
  var yValuesExpense = [ 
    <?php 
    foreach ($total_expense as $expense) {
      echo $expense . ', ';
    }
    ?>
  ];

  // Count sold product Chart Data
  var xValuesSold = [
    <?php 
    foreach ($product_sold_month as $month) {
      echo '"' .$month . '", ';
    }
    ?>
  ];
  var yValuesSold = [ 
    <?php 
    foreach ($count_product_sold as $sold) {
      echo $sold . ', ';
    }
    ?>
  ];

  // Count bought product Chart Data
  var xValuesBought = [
    <?php 
    foreach ($product_bought_month as $month) {
      echo '"' .$month . '", ';
    }
    ?>
  ];
  var yValuesBought = [ 
    <?php 
    foreach ($count_product_bought as $bought) {
      echo $bought . ', ';
    }
    ?>
  ];

  var barColors = ["red", "green","blue","orange","brown", "yellow", "cyan", "purple", "lightblue", "grey", "black" ,"pink", "darkblue"];

  new Chart("monthlySales", {
    type: "bar",
    data: {
      labels: xValuesSales,
      datasets: [{
        backgroundColor: barColors,
        data: yValuesSales
      }]
    },
    options: {
      legend: {display: false},
      title: {
        display: true,
        text: "Monthly Sales"
      }
    }
  });

  new Chart("monthlyExpense", {
    type: "bar",
    data: {
      labels: xValuesExpense,
      datasets: [{
        backgroundColor: barColors,
        data: yValuesExpense
      }]
    },
    options: {
      legend: {display: false},
      title: {
        display: true,
        text: "Monthly Expense"
      }
    }
  });

  new Chart("monthlySoldProduct", {
    type: "bar",
    data: {
      labels: xValuesSold,
      datasets: [{
        backgroundColor: barColors,
        data: yValuesSold
      }]
    },
    options: {
      legend: {display: false},
      title: {
        display: true,
        text: "Monthly Product Sold"
      }
    }
  });

  new Chart("monthlyBoughtProduct", {
    type: "bar",
    data: {
      labels: xValuesBought,
      datasets: [{
        backgroundColor: barColors,
        data: yValuesBought
      }]
    },
    options: {
      legend: {display: false},
      title: {
        display: true,
        text: "Monthly Product Bought"
      }
    }
  });
</script>
@endsection


  