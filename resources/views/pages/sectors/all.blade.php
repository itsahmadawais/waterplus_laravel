@extends('layouts.dashboard')

@section('content')
<div class="padding">
  <div class="box">
    <div class="box-header">
      <h2>Sectors</h2>
    </div>
    <div class="table-responsive">
      <table id="DataTables" ui-jp="dataTable" class="table table-striped b-t b-b">
        <thead>
          <tr>
            <th  style="width:80%">Title</th>
            <th  style="width:20%" class="nosort"></th>
          </tr>
        </thead>
        <tbody>
        	@foreach($sectors as $sector)
          <tr>
            <td>{{$sector->sector_title}}</td>
            <td>
                @if($sector->customers==null || count($sector->customers)<=0)
                <form method="POST" action="{{url('sectors/'.$sector->id)}}" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button class="md-btn md-raised red"><i class="fa fa-trash"></i></button>
                </form>
                @endif
                <button class="md-btn md-raised blue"><i class="fa fa-pencil" onclick="moveToScreen('{{url('sectors/'.$sector->id)}}')"></i></button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection