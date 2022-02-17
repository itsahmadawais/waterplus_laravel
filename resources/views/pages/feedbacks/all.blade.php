@extends('layouts.dashboard')

@section('content')
<div class="padding">
  <div class="box">
    <div class="box-header">
      <h2>Feedbacks</h2>
    </div>
    <div class="table-responsive">
      <table id="DataTables" ui-jp="dataTable" class="table table-striped b-t b-b">
        <thead>
          <tr>
            <th  style="width:15%">Customer</th>
            <th  style="width:10%">Rating</th>
            <th  style="width:45%">Messsage</th>
            <th  style="width:15%">Dated</th>
            <th  style="width:15%" class="nosort"></th>
          </tr>
        </thead>
        <tbody>
        	@foreach($feedbacks as $feedback)
          <tr>
            <td>
              <a href="{{url('customers/'.$feedback->user->id)}}">{{$feedback->user->f_name." ".$feedback->user->l_name}}</a>
            </td>
            <td>{{$feedback->rating}}</td>
            <td>{{$feedback->message}}</td>
            <td>{{date('d M , Y', strtotime($feedback->created_at))}}</td>
            <td>
                <form method="POST" action="{{url('feedbacks/'.$feedback->id)}}" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button class="md-btn md-raised red"><i class="fa fa-trash"></i></button>
                </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection