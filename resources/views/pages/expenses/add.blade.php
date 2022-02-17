@extends('layouts.dashboard')

@section('content')
<div class="padding">
  <div class="row">
    <div class="col-md-12 mx-auto">
      <div class="box">
        <div class="box-header">
          <h2>Expenses</h2>
        </div>
        <div class="box-divider m-0"></div>
        <div class="box-body">
          <form role="form" method="POST" action="{{url('expenses')}}">
            @csrf

            {{-- Title --}}
            <div class="form-group @error('title') has-danger @enderror">
              <label for="title">Title</label>
              <input type="text" class="form-control @error('title') form-control-danger @enderror" id="title" name="title" placeholder="Mondy Water Bottles Delivery" required>
              @error('title')
                <span class="help-block m-b-none danger">{{$message}}</span>
              @enderror
            </div>

            <div class="text-right">
              <button type="submit" class="btn primary m-b">Save and continue</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection