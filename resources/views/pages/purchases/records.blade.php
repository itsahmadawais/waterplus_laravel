@extends('layouts.dashboard')

@section('content')
<div class="padding">
  <div class="box">
    <div class="box-header">
      <h2>Search Filter</h2>
    </div>
    <div class="box-divider m-0"></div>
        <div class="box-body p-v-md">
          <form class="form-inline" role="form" method="POST" action="{{url('pdf/customer')}}">
            @csrf
            <input type="hidden"
            id="customer_id"
            name="customer_id"
            value="{{$customer->id}}">
            <div class="form-group mr-2">
              <label class="mr-2 sr-end">Start Date</label>
              <input type="date" 
              name="start_date"
              class="form-control" 
              id="start_date"
              required="">
            </div>
            <div class="form-group mr-2">
              <label class="mr-2 sr-end">End Date</label>
              <input type="date" 
              name="end_date"
              class="form-control" 
              id="end_date"
              required="">
            </div>
            <div class="form-group mr-2">
             <select id="transaction" class="form-control mr-2" name="transaction" required="">
               <option value="" disabled="" selected="">Transaction Type</option>
               <option value="debt">Debt</option>
               <option value="all">All</option>
             </select>
            <button type="submit" class="btn primary">Generate PDF</button>
          </form>
        </div>
    </div>
  <div class="box">
    <div class="box-header">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h2>{{$customer->f_name." ".$customer->l_name}}</h2>
            <hr>
            <h2>Debt: Rs {{$debt->amount}}</h2>
          </div>
          <div class="col-md-8 text-right">
            @if(auth()->user()->role=="admin")
            <button class="btn info" data-toggle="modal" data-target="#m-a-f">Pay Debit</button>
            @endif
          </div>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table id="DataTables" ui-jp="dataTable" class="table table-striped b-t b-b">
        <thead>
          <tr>
            <th  style="width:15%">Type</th>
            <th  style="width:15%">Paid Amount</th>
            <th  style="width:15%">Price Per Unit</th>
            <th  style="width:10%">Quantity</th>
            <th  style="width:15%">Total Bill</th>
            <th  style="width:15%">Dated</th>
            @auth()
              @if(auth()->user()->role=="admin")
              <th  style="width:15%" class="nosort"></th>
              @endif
            @endauth
          </tr>
        </thead>
        <tbody>
        	@foreach($purchases as $purchase)
          <tr>
            <td>
              @if($purchase->type=="purchased")
                <span class="label label-sm success pos-rlt m-r-xs"><b class="arrow left b-success"></b>Purchased</span>
              @else
                <span class="label label-sm danger pos-rlt m-r-xs"><b class="arrow left b-danger"></b>Debt Paid</span>
              @endif
            </td>
            <td>Rs {{$purchase->paid_amount}}</td>
            <td>
              @if($purchase->type=="purchased")
                {{$purchase->per_unit_price}}
              @else
                ---
              @endif
            </td>
            <td>
              @if($purchase->type=="purchased")
                {{$purchase->quantity}}
              @else
                ---
              @endif
            </td>
            <td>
              @if($purchase->type=="purchased")
                {{$purchase->total_bill}}
              @else
                ---
              @endif
            </td>
            <td>{{date('d M, Y',strtotime($purchase->created_at))}}</td>
            @auth()
              @if(auth()->user()->role=="admin")
              <td>
                  <form method="POST" action="{{url('purchases/'.$purchase->id)}}" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="md-btn md-raised red"><i class="fa fa-trash"></i></button>
                  </form>
              </td>
              @endif
            @endauth
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<div id="m-a-f" class="modal fade show" data-backdrop="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Pay Debt</h5>
      </div>
      <form method="POST" action="{{url('debt')}}">
      @method('PUT')
      @csrf
      <input type="hidden" name="customer_id" value="{{$customer->id}}">
      <div class="modal-body p-lg">
        <div class="form-group">
          <label for="debt_amount">Pay Amount</label>
          <input type="number" class="form-control" id="debt_amount" name="debt_amount" value="0" min="1" max="{{$debt->amount}}" placeholder="150" required="">
        </div>
        <div class="form-group">
          <label for="remaining_debt">Remaining Debt</label>
          <input type="number" class="form-control" id="remaining_debt" name="remaining_debt" placeholder="150" value="{{$debt->amount}}" readonly="">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn dark-white p-x-md" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn danger p-x-md">Pay Amount</button>
      </div>
    </form>
    </div><!-- /.modal-content -->
  </div>
</div>
@endsection


@section('scripts')
<script type="text/javascript">
  (function ($) {
  'use strict';
      $("#debt_amount").keyup(function(){
          var debt_amount = "{{$debt->amount}}";
          var debt = $(this).val();
          var difference = debt_amount-debt;
          if(difference<0){
            swal({
                title: "Wrong Debt Amount!",
                text: "Make sure your debt amount is less than or equal to Rs "+debt_amount,
                icon: "warning",
                button: true,
                dangerMode: true,
              });
            $("#debt_amount").val(0);
            $("#remaining_debt").val(debt_amount);
            return;
          }
          $("#remaining_debt").val(difference);
      });
  })(jQuery);

</script>
@endsection