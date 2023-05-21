<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\SerialNumber;
use App\Models\Transaction;
use App\Models\DetailTransaction;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        // Authorization using Gate
        // $this->authorize('super.admin');
        
        $products = Product::all();
        $serial_numbers = SerialNumber::all();
        $transactions = Transaction::latest()->get();
        $transaction_details = DetailTransaction::all();
        
        $id = 'transactions'; 
        $transcation_type = 'all';
        $product_status = 'available';

        if(isset($request)){
            $id = $request->id; 
            $transcation_type = $request->transaction_type;
            $product_status = $request->product_status;
        }
        
        if($id === 'transactions' and $transcation_type === 'sell') {
            return view('reports.transactions', [
                'products' => $products,
                'serial_numbers' => $serial_numbers,
                'transactions' => Transaction::where('transaction_type','sell')->get(),
                'transaction_details' => $transaction_details,
            ]);
        }
        else if($id === 'transactions' and $transcation_type === 'buy') {
            return view('reports.transactions', [
                'products' => $products,
                'serial_numbers' => $serial_numbers,
                'transactions' => Transaction::where('transaction_type','buy')->get(),
                'transaction_details' => $transaction_details,
            ]);
        }
        else if($id === 'products' and $product_status === 'sold') {
            return view('reports.products', [
                'products' => $products,
                'serial_numbers' => SerialNumber::where('used', 1)->get(),
                'transactions' => $transactions,
                'transaction_details' => $transaction_details,
                'product_status' => $product_status
            ]);
        }
        else if($id === 'products' and $product_status === 'available') {
            return view('reports.products', [
                'products' => $products,
                'serial_numbers' => SerialNumber::where('used', 0)->get(),
                'transactions' => $transactions,
                'transaction_details' => $transaction_details,
                'product_status' => $product_status
            ]);
        }
        else if($id === 'products') {
            return view('reports.products', [
                'products' => $products,
                'serial_numbers' => SerialNumber::where('used', 0)->get(),
                'transactions' => $transactions,
                'transaction_details' => $transaction_details,
                'product_status' => $product_status
            ]);
        }
        else if($id === 'graph') {
            $query_daily_sales = DB::table('transactions')->join('detail_transactions','transactions.id','detail_transactions.transaction_id')->select(DB::raw('SUM(price) as total_sales'), DB::raw("DATE_FORMAT(transaction_date, '%m-%Y') new_date"),  DB::raw('YEAR(transaction_date) as year, MONTHNAME(transaction_date) as month, DAY(transaction_date) as date'))->where('transaction_type','sell')->whereMonth('transaction_date',5)->groupBy(DB::raw('date'))->orderBy('new_date','asc')->get();

            $query_total_sales = DB::table('transactions')->join('detail_transactions','transactions.id','detail_transactions.transaction_id')->select(DB::raw('SUM(price) as total_sales'), DB::raw("DATE_FORMAT(transaction_date, '%m-%Y') new_date"),  DB::raw('YEAR(transaction_date) as year, MONTHNAME(transaction_date) as month'))->where('transaction_type','sell')->groupBy(DB::raw('month, year'))->orderBy('new_date','asc')->get();

            $query_total_expense = DB::table('transactions')->join('detail_transactions','transactions.id','detail_transactions.transaction_id')->select(DB::raw('SUM(price) as total_expense'), DB::raw("DATE_FORMAT(transaction_date, '%m-%Y') new_date"),  DB::raw('YEAR(transaction_date) as year, MONTHNAME(transaction_date) as month'))->where('transaction_type','buy')->groupBy(DB::raw('month, year'))->orderBy('new_date','asc')->get();

            $query_product_sold = DB::table('transactions')->join('detail_transactions','transactions.id','detail_transactions.transaction_id')->select(DB::raw('count(transaction_type) as count_sales'), DB::raw("DATE_FORMAT(transaction_date, '%m-%Y') new_date"),  DB::raw('YEAR(transaction_date) as year, MONTHNAME(transaction_date) as month'))->where('transaction_type','sell')->groupBy(DB::raw('month, year'))->orderBy('new_date','asc')->get();
            
            $query_product_bought = DB::table('transactions')->join('detail_transactions','transactions.id','detail_transactions.transaction_id')->select(DB::raw('count(transaction_type) as count_buy'), DB::raw("DATE_FORMAT(transaction_date, '%m-%Y') new_date"),  DB::raw('YEAR(transaction_date) as year, MONTHNAME(transaction_date) as month'))->where('transaction_type','buy')->groupBy(DB::raw('month, year'))->orderBy('new_date','asc')->get();

            $daily_sales_date = [];
            foreach($query_daily_sales as $date){
                array_push($daily_sales_date, $date->date);
            }

            $daily_sales = [];
            foreach($query_daily_sales as $sales){
                array_push($daily_sales, $sales->total_sales);
            }


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
            return view('reports.graph', [
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
                'count_product_bought' => $count_product_bought,
                'daily_sales_date' => $daily_sales_date,
                'daily_sales' => $daily_sales
            ]);
        }
        else{
            return view('reports.transactions', [
                'products' => $products,
                'serial_numbers' => $serial_numbers,
                'transactions' => $transactions,
                'transaction_details' => $transaction_details,
            ]);
        }
        
    }
}
