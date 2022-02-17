@extends('layouts.dashboard')

@section('content')
<div class="padding">
  <div class="box">
    <div class="box-header">
      <h2>Search Filter</h2>
    </div>
    <div class="box-divider m-0"></div>
        <div class="box-body p-v-md">
          <form class="form-inline" role="form" method="GET" action="{{url('customers')}}">
            <div class="form-group mr-2">
              <select id="sector_id" class="form-control select2" ui-jp="select2" ui-options="{theme: 'bootstrap'}" name="sector_id">
                <option value="" disabled="" selected="">Select Sector</option>
                @foreach($sectors as $sector)
                <option value="{{$sector->id}}">{{$sector->sector_title}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group mr-2">
             <select id="debt" class="form-control mr-2" name="debt">
               <option value="" disabled="" selected="">Select Customers Type</option>
               <option value="debt">Debt</option>
               <option value="all">All</option>
             </select>
            <button type="submit" class="btn primary">Search</button>
          </form>
        </div>
    </div>

  <div class="box">
    <div class="box-header">
      <h2>Customers</h2>
    </div>
    <div class="table-responsive">
      <table id="DataTables" ui-jp="dataTable" class="table table-striped b-t b-b">
        <thead>
          <tr>
            <th  style="width:20%">Name</th>
            <th  style="width:25%">Phone</th>
            <th  style="width:25%">Email</th>
            <th  style="width:15%">Price</th>
            <th  style="width:15%" class="nosort"></th>
          </tr>
        </thead>
        <tbody>
        	@foreach($customers as $customer)
          <tr>
            <td><a href="{{url('purchases/'.$customer->id)}}">{{$customer->f_name." ".$customer->l_name}}</a></td>
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