<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Purchase;
use PDF;

class PDFController extends Controller
{
    public function customers(Request $request){
        $id= $request->customer_id;
        $customer = User::find($id);
        $startDate = $request->start_date;
        $endDate = $request->end_date;
        $purchases = Purchase::whereDate('created_at', '>=', $startDate)
                                ->whereDate('created_at', '<=', $endDate)->get();
        $data =[
            'customer' => $customer,
            'purchases' => $purchases
        ];
        view()->share('data',$data);
        $base ="pages";
        $pdf = PDF::loadView($base.'.pdf.customers', $data);
        return $pdf->download('pdf_file.pdf');
    }
}
