<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\SerialNumber;
use App\Models\DetailTransaction;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        
        $products = Product::all();
        $serial_numbers = SerialNumber::all();
        $transactions = Transaction::latest()->get();
        $transaction_details = DetailTransaction::all();

        $query_total_sales = DB::table('transactions')->join('detail_transactions','transactions.id','detail_transactions.transaction_id')->select(DB::raw('SUM(price) as total_sales'), DB::raw("DATE_FORMAT(transaction_date, '%m-%Y') new_date"),  DB::raw('YEAR(transaction_date) as year, MONTHNAME(transaction_date) as month'))->where('transaction_type','sell')->groupBy(DB::raw('month, year'))->orderBy('new_date','asc')->get();

        $query_total_expense = DB::table('transactions')->join('detail_transactions','transactions.id','detail_transactions.transaction_id')->select(DB::raw('SUM(price) as total_expense'), DB::raw("DATE_FORMAT(transaction_date, '%m-%Y') new_date"),  DB::raw('YEAR(transaction_date) as year, MONTHNAME(transaction_date) as month'))->where('transaction_type','buy')->groupBy(DB::raw('month, year'))->orderBy('new_date','asc')->get();

        $query_product_sold = DB::table('transactions')->join('detail_transactions','transactions.id','detail_transactions.transaction_id')->select(DB::raw('count(transaction_type) as count_sales'), DB::raw("DATE_FORMAT(transaction_date, '%m-%Y') new_date"),  DB::raw('YEAR(transaction_date) as year, MONTHNAME(transaction_date) as month'))->where('transaction_type','sell')->groupBy(DB::raw('month, year'))->orderBy('new_date','asc')->get();
            
        $query_product_bought = DB::table('transactions')->join('detail_transactions','transactions.id','detail_transactions.transaction_id')->select(DB::raw('count(transaction_type) as count_buy'), DB::raw("DATE_FORMAT(transaction_date, '%m-%Y') new_date"),  DB::raw('YEAR(transaction_date) as year, MONTHNAME(transaction_date) as month'))->where('transaction_type','buy')->groupBy(DB::raw('month, year'))->orderBy('new_date','asc')->get();

        $total_sales_month = [];
        foreach($query_total_sales as $sales){
            array_push($total_sales_month, $sales->month);
        }

        $total_sales = [];
        foreach($query_total_sales as $sales){
            array_push($total_sales, $sales->total_sales);
        }
            
        $total_expense_month = [];
        foreach($query_total_expense as $expense){
            array_push($total_expense_month, $expense->month);
        }

        $total_expense = [];
        foreach($query_total_expense as $expense){
            array_push($total_expense, $expense->total_expense);
        }

        $product_sold_month = [];
        foreach($query_product_sold as $sold){
            array_push($product_sold_month, $sold->month);
        }

        $count_product_sold = [];
        foreach($query_product_sold as $sold){
            array_push($count_product_sold, $sold->count_sales);
        }
            
        $product_bought_month = [];
            foreach($query_product_bought as $bought){
            array_push($product_bought_month, $bought->month);
        }

        $count_product_bought = [];
        foreach($query_product_bought as $bought){
            array_push($count_product_bought, $bought->count_buy);
        }

        // @dd($query_count_sales);
        return view('dashboard.index', [
            'products' => $products,
            'serial_numbers' => $serial_numbers,
            'transactions' => $transactions,
            'transaction_details' => $transaction_details,
            'total_sales' => $total_sales,
            'total_sales_month' => $total_sales_month,
            'total_expense_month' => $total_expense_month,
            'total_expense' => $total_expense,
            'product_sold_month' => $product_sold_month,
            'count_product_sold' => $count_product_sold,
            'product_bought_month' => $product_bought_month,
            'count_product_bought' => $count_product_bought
        ]);        
    }
}
