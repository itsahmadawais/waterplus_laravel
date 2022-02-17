<?php

namespace App\Http\Controllers;

use App\Models\BillableItems;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Purchase;
use App\Models\Expenses;
use App\Models\Debt;

class DashboardController extends Controller
{
    public function index(){
        $year = date('Y');
        $day = date('d');
        $month = date('m');
        $purchases = [];
        $expenses = [];
        $lm_expense = 0;
        $date = new Carbon(date('y-m-d'));
        $lm_profit =  Purchase::whereMonth('created_at',$date->month)->whereYear('created_at',$date->year)->sum('paid_amount');
        for($i=1;$i<=$month;$i++){
            $temp_month = $i;
            if($i<10){
                $temp_month = "0".$i;
            }
            $date = new Carbon($year.'-'.$temp_month.'-'.$day);
            $purchases[$i-1] = Purchase::whereMonth('created_at',$date->month)->whereYear('created_at',$date->year)->sum('paid_amount');
            $temp_expense = Expenses::whereMonth('created_at',$date->month)->whereYear('created_at',$date->year)->get();
            $expenses[$i-1]=0;
            foreach($temp_expense as $expense){
                if($expense->item!==null){
                    $expenses[$i-1]+=$expense->price;
                }
            }
            if($i==$month){
                $lm_expense = $expenses[$i-1];
            }
        }
        $debt = Debt::sum('amount');
        $bt_sold = Purchase::all()->sum('quantity');
        $cash_in_hand = abs($lm_profit - $debt);
        return view('pages.dashboard',[
            'debt' => $debt,
            'lm_expense' => $lm_expense,
            'lm_profit' => $lm_profit,
            'purchases' => $purchases,
            'expenses' => $expenses,
            'bt_sold' => $bt_sold,
            'cash_in_hand' => $cash_in_hand,
        ]);
    }
    public function custom(Request $request){
        return view('pages.custom-reveneue-filter',[
            'data' => false
        ]);
    }
    public function customCalculator(Request $request){
        $start_date = new Carbon($request->start_date);
        $end_date = new Carbon($request->end_date);
        $profit =  Purchase::where('type','purchased')->whereDate('created_at','>=',$start_date)->whereDate('created_at','<=',$end_date)->sum('total_bill');
        $quantity_sold = Purchase::where('type','purchased')->whereDate('created_at','>=',$start_date)->whereDate('created_at','<=',$end_date)->sum('quantity');
        $debt = Purchase::where('type','purchased')->whereDate('created_at','>=',$start_date)->whereDate('created_at','<=',$end_date)->sum('paid_amount');
        $profit_with_debt =  Purchase::where('type','purchased')->whereDate('created_at','>=',$start_date)->whereDate('created_at','<=',$end_date)->sum('paid_amount');
        $expenses = Expenses::whereDate('created_at','>=',$start_date)->whereDate('created_at','<=',$end_date)->get();
        $amount = 0;
        foreach($expenses as $expense){
            $temp = BillableItems::where('expense_id',$expense->id)->sum('price');
            $amount+=$temp;
        }
        return view('pages.custom-reveneue-filter',[
            'profit' => $profit,
            'profit_with_debt' => $profit_with_debt,
            'quantity_sold' => $quantity_sold,
            'expense_amount' => $amount,
            'data' => true
        ]);
    }
}
