<?php

namespace App\Http\Controllers;

use App\Models\Debt;
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\User;

class DebtController extends Controller
{
    public function get($id){
        $user = User::find($id);
        if($user==null){
            return response()->json([
                'error' => 'User not found!'
            ],404);
        }
        $debt = Debt::where('user_id',$id)->first();
        return response()->json([
            'data' => $debt
        ],200);
    }
    public function pay(Request $request){
        $id = $request->customer_id;
        $amount = $request->debt_amount;
        $debt = Debt::where('user_id',$id)->first();
        $debt->amount = $debt->amount - $amount;
        $debt->save();
        $purchase = Purchase::create([
            'user_id' => $id,
            'quantity' => 0,
            'per_unit_price' => 0,
            'total_bill' => 0,
            'paid_amount' => $amount,
            'type' => 'debt'
        ]);
        return back();
    }
}
