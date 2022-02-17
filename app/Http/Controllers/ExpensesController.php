<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use Illuminate\Http\Request;
use App\Models\BillableItems;

class ExpensesController extends Controller
{
    public function index(){
        $expenses =  Expenses::all();
        return view('pages.expenses.all',[
            'expenses' => $expenses
        ]);
    }
    public function create(){
        return view('pages.expenses.add');
    }
    public function store(Request $request){

        $expense = Expenses::create([
            'title' => $request->title,
            //'created_at' => $request->date
        ]);
        // $billableItems = $request->item;
        // foreach($billableItems as $data){
        //     $data = json_decode($data);
        //     $bItem = BillableItems::create([
        //         'expense_id' => $expense->id,
        //         'title' => $data['title'],
        //         'price' => $data['price']
        //     ]);
        // }
        return redirect('expenses/'.$expense->id);
    }
    public function view($id){
        $expense = Expenses::findOrFail($id);
        $billableItems = BillableItems::where('expense_id',$expense->id)->get();
        return view('pages.expenses.view',[
            'expense' => $expense,
            'billableItems' => $billableItems
        ]);
    }
    public function delete($id){
        $expense = Expenses::findOrFail($id);
        BillableItems::where('expense_id',$id)->delete();
        $expense->delete();
        return back();
    }
}
