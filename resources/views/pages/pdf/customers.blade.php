<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Water Plus Customer Report</title>
    <style type="text/css">
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            width: 100%;
            padding: 20px;
            padding-top: 40px;
        }
        h1{
            text-align: center;
        }
        .invoice-header,
        .invoice-footer{
            margin: 10px 0;
            padding: 12px 0;
        }
        .invoice-footer{
            margin-top: 30px;
        }
        .inline-block{
            display: inline-block;
            width: 50%;
        }
        .text-right{
            text-align: right;
        }
        table{
            border-collapse: collapse;
        }
        table th{
            border: none;
        }
        table tr,
        table tr td{
            text-align: left;
        }
        table thead{
            background-color: black;
            color: #fff;
        }
        tr:nth-child(even) {
          background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Water Plus</h1>
    <hr>
    <div class="invoice-header">
        <div class="inline-block">
            <p>To : {{$data['customer']->f_name." ".$data['customer']->l_name}}</p>
            <p>Address :{{$data['customer']->address}}</p>
            <p>Phone : {{$data['customer']->phone}}</p>
        </div>
        <div class="inline-block text-right">
            <h4>Invoice</h4>
            <p>Issue Date: {{date('d M, Y')}}</p>
        </div>
    </div>
    <table border="1" width="100%">
        <thead>
            <tr>
                <th>Type</th>
                <th>Paid Amount</th>
                <th>Price Per Unit</th>
                <th>Quantity</th>
                <th>Total Bill</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data['purchases'] as $purchase)
            <tr>
                <td>{{ucfirst($purchase->type)}}</td>
                <td>{{$purchase->paid_amount}}</td>
                <td>
                    @if($purchase->type=="debt")
                        ---
                    @else
                        {{$purchase->per_unit_price}}
                    @endif
                </td>
                <td>
                    @if($purchase->type=="debt")
                        ---
                    @else
                        {{$purchase->quantity}}
                    @endif
                </td>
                <td>
                    @if($purchase->type=="debt")
                        ---
                    @else
                        {{$purchase->total_bill}}
                    @endif
                </td>
                <td>{{date('d M, y',strtotime($purchase->created_at))}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="spacer" style="margin-top: 30px;"></div>
    <table border="1" width="100%">
        <tbody>
            <tr>
                <th scope="col" width="30%">Recieved By</th>
                <td width="20%">&nbsp;</td>
                <th scope="col" width="30%">Paid</th>
                <td width="20%">&nbsp;</td>
            </tr>
            <tr>
                <th scope="col" width="30%">Note*</th>
                <td width="20%">&nbsp;</td>
                <th scope="col" width="30%">Due</th>
                <td width="20%">&nbsp;</td>
            </tr>
        </tbody>
    </table>
    
    <div class="invoice-footer">
        <div class="inline-block">
            <p>If you have any quary about this invoice please contat us.</p>
            <h3 style="margin-top:20px;">Contact Details</h3>
            <p>Mohammad Butt</p>
            <p>Mohammad44314@gmail.com</p>
            <p>0334-6977744</p>
        </div>
        <div class="inline-block text-right">
            <p>_______________________</p><br>
            <p style="margin-right: 20px;">Signature</p>
        </div>
    </div>
</body>

</html>