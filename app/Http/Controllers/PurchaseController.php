<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Models\Debt;
use App\Models\Sectors;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function index(){
        $purchases = Purchase::with('customer')->get();
        return view('pages.purchases.all',[
            'purchases' => $purchases
        ]);
    }
    public function create(){
        
        $customers = User::Where('role','customer')->get();
        $sectors = Sectors::all();
        return view('pages.purchases.add',[
            'customers' => $customers,
            'sectors' => $sectors
        ]);
    }
    public function store(Request $request){
        $user_id = $request->user_id;
        $quantity = $request->quantity;
        $paid_amount = $request->paid_amount;

        $user = User::find($user_id);
        $price = $quantity * $user->price;
        $date = $request->date;

        $purchase = Purchase::create([
            'user_id' => $user_id,
            'quantity' => $quantity,
            'per_unit_price' => $user->price,
            'total_bill' => $price,
            'paid_amount' => $paid_amount,
            'type' => 'purchased',
            'created_at' => Carbon::parse($date)->timestamp
        ]);
        if($paid_amount<$price){
            $debt = Debt::where('user_id',$user_id)->first();
            if($debt==null){
                $debt = Debt::create([
                    'user_id' => $user_id,
                ]);
            }
            $debt->amount = $debt->amount + $price - $paid_amount;
            $debt->save();
        }
        return redirect('purchases/'.$user_id);
    }
    public function record($id){
        $user = Auth::user();
        if($user->role=="customer"){
            if($user->id!=$id){
                abort(403);
            }
        }
        $customer = User::findOrFail($id);
        $purchases = Purchase::where('user_id',$id)->orderBy('id','DESC')->get();
        $debt = Debt::where('user_id',$id)->first();
        if($debt==null){
            $debt = new Debt();
            $debt->amount = 0;
        }
        return view('pages.purchases.records',[
            'customer' => $customer,
            'purchases' => $purchases,
            'debt' => $debt
        ]);
    }
    public function delete($id){
        $purchase = Purchase::findOrFail($id);
        $user_id = $purchase->user_id;
        if($purchase!==null){
            if($purchase->paid_amount < $purchase->total_bill){
                $debt = Debt::where('user_id',$purchase->user_id)->first();
                if($debt!==null){
                    $debt->amount = $debt->amount - $purchase->paid_amount;
                    $debt->amount = abs($debt->amount);
                    $debt->save();
                }
            }
        }
        $purchase->delete();
        return redirect('purchases/'.$user_id);
    }
}
