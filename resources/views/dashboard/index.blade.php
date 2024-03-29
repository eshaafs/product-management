@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Dashboard</h1>
</div>
<div class="row mt-3">
  <div class="col-md-6">
    <canvas id="monthlySales" style="width:100%;max-width:600px"></canvas>
  </div>
  <div class="col-md-6">
    <canvas id="monthlyExpense" style="width:100%;max-width:600px"></canvas>
  </div>
</div>
<div class="row mt-3">
  <div class="col-md-6">
    <canvas id="monthlySoldProduct" style="width:100%;max-width:600px"></canvas>
  </div>
  <div class="col-md-6">
    <canvas id="monthlyBoughtProduct" style="width:100%;max-width:600px"></canvas>
  </div>
</div>

<script>
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
</div>

@endsection