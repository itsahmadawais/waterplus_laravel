@extends('layouts.dashboard')

@section('content')
<div class="padding">
  <div class="box">
    <div class="box-header">
      <h2>Purchase History</h2>
    </div>
    <div class="table-responsive">
      <table id="DataTables" ui-jp="dataTable" class="table table-striped b-t b-b">
        <thead>
          <tr>
            <th  style="width:20%">Customer</th>
            <th  style="width:25%">Address</th>
            <th  style="width:25%">Phone</th>
            <th  style="width:15%">Price</th>
            <th  style="width:15%" class="nosort"></th>
          </tr>
        </thead>
        <tbody>
        	@foreach($purchases as $customer)
          <tr>
            <td>{{$customer->f_name." ".$customer->l_name}}</td>
            <td>{{$customer->phone}}</td>
            <td>{{$customer->email}}</td>
            <td>Rs {{$customer->price}}</td>
            <td>
                <form method="POST" action="{{url('customers/'.$customer->id)}}" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button class="md-btn md-raised red"><i class="fa fa-trash"></i></button>
                </form>
                <button class="md-btn md-raised blue"><i class="fa fa-pencil" onclick="moveToScreen('{{url('customers/'.$customer->id)}}')"></i></button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection