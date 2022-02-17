@extends('layouts.dashboard')

@section('content')
<div class="padding">
  <div class="box">
    <div class="box-header">
      <h2>Expenses</h2>
    </div>
    <div class="table-responsive">
      <table id="DataTables" ui-jp="dataTable" class="table table-striped b-t b-b">
        <thead>
          <tr>
            <th  style="width:40%">Title</th>
            <th  style="width:25%">Dated</th>
            <th  style="width:15%" class="nosort"></th>
          </tr>
        </thead>
        <tbody>
        	@foreach($expenses as $expense)
          <tr>
            <td>{{$expense->title}}</td>
            <td>{{date('d M , Y', strtotime($expense->created_at))}}</td>
            <td>
                <form method="POST" action="{{url('expenses/'.$expense->id)}}" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button class="md-btn md-raised red"><i class="fa fa-trash"></i></button>
                </form>
                <button class="md-btn md-raised blue"><i class="fa fa-pencil" onclick="moveToScreen('{{url('expenses/'.$expense->id)}}')"></i></button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection