@extends('layouts.dashboard')

@section('content')
<div class="padding">
  <div class="row">
    <div class="col-md-12 mx-auto">
      <div class="box">
        <div class="box-header">
          <h2>Custom Report Generator</h2>
        </div>
        <div class="box-divider m-0"></div>
        <div class="box-body">
          <form role="form" method="POST" action="{{url('custom-revenue')}}">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    {{-- Start Date --}}
                    <div class="form-group @error('start_date') has-danger @enderror">
                        <label for="start_date">Start Date</label>
                        <input type="date" class="form-control @error('start_date') form-control-danger @enderror" id="start_date" name="start_date" required>
                        @error('start_date')
                        <span class="help-block m-b-none danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    {{-- End Date --}}
                    <div class="form-group @error('end_date') has-danger @enderror">
                        <label for="end_date">Start Date</label>
                        <input type="date" class="form-control @error('end_date') form-control-danger @enderror" id="end_date" name="end_date" required>
                        @error('end_date')
                        <span class="help-block m-b-none danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="text-right">
              <button type="submit" class="btn primary m-b">Search</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  @if($data==true)
  <div class="row">
    <div class="col-xs-6 col-sm-3">
      <div class="box p-a">
        <div class="pull-left m-r">
          <span class="w-48 rounded  accent">
            <i class="fa fa-money"></i>
          </span>
        </div>
        <div class="clear">
          <h4 class="m-0 text-lg _300"><a href>Rs {{$profit}}</span></a></h4>
          <small class="text-muted">Profit</small>
        </div>
      </div>
  </div>
  <div class="col-xs-6 col-sm-3">
      <div class="box p-a">
        <div class="pull-left m-r">
          <span class="w-48 rounded primary">
            <i class="fa fa-money"></i>
          </span>
        </div>
        <div class="clear">
          <h4 class="m-0 text-lg _300"><a href>Rs {{$profit_with_debt}}</span></a></h4>
          <small class="text-muted">Cash in hand</small>
        </div>
      </div>
  </div>
<div class="col-xs-6 col-sm-3">
    <div class="box p-a">
      <div class="pull-left m-r">
        <span class="w-48 rounded warn">
          <i class="fa fa-money"></i>
        </span>
      </div>
      <div class="clear">
        <h4 class="m-0 text-lg _300"><a href>Rs {{$quantity_sold}}</span></a></h4>
        <small class="text-muted">Quantity sold</small>
      </div>
    </div>
</div>
  <div class="col-xs-6 col-sm-3">
      <div class="box p-a">
        <div class="pull-left m-r">
          <span class="w-48 rounded warn">
            <i class="fa fa-money"></i>
          </span>
        </div>
        <div class="clear">
          <h4 class="m-0 text-lg _300"><a href>{{$expense_amount}}</span></a></h4>
          <small class="text-muted">Expense</small>
        </div>
      </div>
  </div>
    </div>
  @endif
</div>
@endsection