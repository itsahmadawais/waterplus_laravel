@extends('layouts.dashboard')

@section('content')
<div class="padding">
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="box">
        <div class="box-header">
          <h2>Add Purchase Record</h2>
        </div>
        <div class="box-divider m-0"></div>
        <div class="box-body">
          <form id="form-purchase" role="form" method="POST" action="{{url('purchases')}}">
            @csrf

            {{-- Sector ID --}}

            <div class="form-group">
              <label for="sector_id">Select Sector</label>
              <select id="sector_id" class="form-control select2" ui-jp="select2" ui-options="{theme: 'bootstrap'}" name="sector_id" required>
                <option value="" selected="">Select Sector</option>
                @foreach($sectors as $sector)
                <option value="{{$sector->id}}">{{$sector->sector_title}}</option>
                @endforeach
              </select>
            </div>


            {{-- Customer --}}

            <div class="form-group">
              <label for="user_id">Select Customer</label>
              <select id="user_id" class="form-control select2" ui-jp="select2" ui-options="{theme: 'bootstrap'}" name="user_id" disabled="" required="">
              </select>
            </div>

            @if(count($customers)<=0)
            <div class="text-right">
              <a href="{{url('customers/add')}}" class="btn primary btn-block m-b">Add Customer</a>
            </div>
            @endif

            {{-- Price --}}
            <div class="form-group @error('price') has-danger @enderror">
              <label for="price">Per Unit Price</label>
              <input type="number" class="form-control @error('price') form-control-danger @enderror" id="price" name="price" placeholder="150" readonly="">
              @error('price')
                <span class="help-block m-b-none danger">{{$message}}</span>
              @enderror
            </div>

            {{-- Quantity --}}
            <div class="form-group @error('quantity') has-danger @enderror">
              <label for="quantity">Quantity</label>
              <input type="number" class="form-control @error('quantity') form-control-danger @enderror" id="quantity" name="quantity" placeholder="150" required="">
              @error('quantity')
                <span class="help-block m-b-none danger">{{$message}}</span>
              @enderror
            </div>

            {{-- Paid Amount --}}
            <div class="form-group @error('paid_amount') has-danger @enderror">
              <label for="paid_amount">Paid Amount</label>
              <input type="number" class="form-control @error('paid_amount') form-control-danger @enderror" id="paid_amount" name="paid_amount" placeholder="150" required="">
              @error('paid_amount')
                <span class="help-block m-b-none danger">{{$message}}</span>
              @enderror
            </div>

            {{-- Created at --}}
            <div class="form-group @error('date') has-danger @enderror">
              <label for="date">Dated</label>
              <input type="date" class="form-control @error('date') form-control-danger @enderror" id="date" name="date" placeholder="150" required="">
              @error('date')
                <span class="help-block m-b-none danger">{{$message}}</span>
              @enderror
            </div>

            {{-- Total Bill --}}
            <div class="form-group @error('total_bill') has-danger @enderror">
              <label for="total_bill">Total Bill</label>
              <input type="number" class="form-control @error('total_bill') form-control-danger @enderror" id="total_bill" name="total_bill" placeholder="150" readonly="">
              @error('total_bill')
                <span class="help-block m-b-none danger">{{$message}}</span>
              @enderror
            </div>
            
            @if(count($customers)>0)
            <div class="text-right">
              <button type="submit" class="btn primary m-b">Save Data</button>
            </div>
            @endif
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
  (function ($) {
  'use strict';
      var webhook = "{{url('')}}";
      var price = null;
      $("#user_id").prop('disabled',true);
      $("#user_id").append("<option value='' selected=''>Select Customer</option>");
      $("#sector_id").on('change',function(){
        var id = $(this).val();
        if(id!=""){
          var  url = webhook+"/customers/filter/sector|"+id;
            $.get(url, function(data, status){
              console.log(data);
              if(status=="success"){
                if(data.customer.length>0){
                  $("#user_id").children("option").remove();
                  $("#user_id").prop("disabled",false);
                  $("#user_id").append("<option value='' selected=''>Select Customer</option>");
                  data.customer.forEach(function(value){
                    $("#user_id").append("<option value='"+value.id+"'>"+value.f_name+" "+value.l_name+"</option>");
                  });
                }
                else{
                  $("#user_id").prop('disabled',true);
                }
              }
            });
          }
      });

      $("#user_id").on('change',function(){
         var id = $(this).val();
          if(id!=""){
           var url = webhook+"/customers/filter/customer|"+id;
            $.get(url, function(data, status){
              console.log(data);
              if(status=="success"){
                price = data.customer.price;
                $("#price").val(price);
                $("#quantity").val(1);
                $("#paid_amount").val(price);
                $("#total_bill").val(price);
              }
            });
          }
        });
        $("#quantity").keyup(function(){
          if(price==null){
            swal({
              title: "Select Customer",
              text: "Customer is not yet selected. Kindly select the customer.",
              icon: "warning",
              button: true,
              dangerMode: true,
            });
          }
          else{
            var quantity = $(this).val();
            var total_bill = quantity * price;
            $("#total_bill").val(total_bill);
          }
        });
        $("#form-purchase").submit(function(e){
            var total_bill = parseInt($("#total_bill").val());
            var paid_amount = parseInt($("#paid_amount").val());
            if(paid_amount>total_bill){
                e.preventDefault(e);
                swal({
                title: "Paid Amount is large!",
                text: "Make sure your paid amount is equal or less than total billing amount.",
                icon: "warning",
                button: true,
                dangerMode: true,
              });
            }
        });
  })(jQuery);

</script>
@endsection