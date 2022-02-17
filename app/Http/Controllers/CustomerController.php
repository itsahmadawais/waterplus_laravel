<?php

namespace App\Http\Controllers;

use App\Models\Sectors;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use DB;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::where('role','customer')->get();
        if(isset($_GET['sector_id']) && !empty($_GET['sector_id']) && isset($_GET['debt']) && !empty($_GET['debt'])){
            if($_GET['debt']=="debt"){
                $customers = DB::table('users')
                ->leftJoin('debts', 'users.id', '=', 'debts.user_id')
                ->select('users.*')
                ->where('debts.amount','>','0')
                ->where('users.sector_id',$_GET['sector_id'])
                ->get();
            }
        }
        else if(isset($_GET['sector_id']) && !empty($_GET['sector_id'])){
            $customers = User::where([
                'sector_id' => $_GET['sector_id'],
                'role' => 'customer'
            ])->get();
        }
        else if(isset($_GET['debt']) && !empty($_GET['debt']) && $_GET['debt']=="debt"){
            $customers = DB::table('users')
                ->leftJoin('debts', 'users.id', '=', 'debts.user_id')
                ->select('users.*')
                ->where('debts.amount','>','0')
                ->get();
        }
        $sectors = Sectors::all();
        return view('pages.customers.all',[
            'customers' => $customers,
            'sectors' => $sectors
        ]);
    }
    public function create(){
        $sectors = Sectors::all();
        return view('pages.customers.add',[
            'sectors' => $sectors
        ]);
    }
    /**
     * Store a customer account
     * @return User
     */
    public function store(Request $request)
    {
        $request->validate([
            'f_name' => ['required', 'string', 'max:255'],
            'l_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'phone' => ['required', 'string', 'max:255', 'unique:users'],
            'price' => ['required', 'integer'],
        ]);
        $request->password = Hash::make($request->password);
        $request->request->add(['password' => $request->password]);
        $user = User::create($request->all());
        return redirect('customers/'.$user->id);
    }
    public function filter($type,$id){
        if($type=="sector"){
            $customer = User::where([
                'sector_id' => $id,
                'role' => 'customer'
            ])->get();
            if($customer==null){
                return response()->json([
                    'message' => "User not found!"
                ],404);
            }
            return response()->json([
                'customer' => $customer
            ],200);
        }
        $customer = User::find($id);
        if($customer==null){
            return response()->json([
                'message' => "User not found!"
            ],404);
        }
        return response()->json([
            'customer' => $customer
        ],200);
    }
    public function view($id){
        $user = User::findOrFail($id);
        $sectors = Sectors::all();
        return view('pages.customers.edit',[
            'customer' => $user,
            'sectors' => $sectors
        ]);
    }
    public function update(Request $request,$id){
        $customer = User::findOrFail($id);
        $customer->f_name = $request->f_name;
        $customer->l_name = $request->l_name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->price = $request->price;
        $customer->sector_id = $request->sector_id;
        $customer->save();
        return back();
    }
    public function password(Request $request, $id){
        $customer = User::findOrFail($id);
        $customer->password = Hash::make($request->password);
        return back()->with('success','Password updated successfully!');
    }
    /**
     * Create a customer account
     * @return User
     */
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('customers');
    }
}
