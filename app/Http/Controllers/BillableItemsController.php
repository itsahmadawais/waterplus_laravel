<?php

namespace App\Http\Controllers;

use App\Models\BillableItems;
use Illuminate\Http\Request;
use App\Models\Expenses;

class BillableItemsController extends Controller
{
    public function create(Request $request){
        $expense = Expenses::findOrFail($request->expense_id);
        $billableItem = BillableItems::create([
            'expense_id' => $request->expense_id,
            'title' => $request->expense_title,
            'price' => $request->expense_price
        ]);
        return back();
    }
    public function delete($id){
        $bItem = BillableItems::findOrFail($id);
        $bItem->delete();
        return back();
    }
}
