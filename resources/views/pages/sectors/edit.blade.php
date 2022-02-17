@extends('layouts.dashboard')

@section('content')
<div class="padding">
  <div class="row">
    <div class="col-md-12 mx-auto">
      <div class="box">
        <div class="box-header">
          <h2>Sector</h2>
        </div>
        <div class="box-divider m-0"></div>
        <div class="box-body">
          <form role="form" method="POST" action="{{url('sectors')}}">
            @csrf
            @method('PUT')
            <input type="hidden" name="sector_id"  value="{{$sector->id}}">
            {{-- Title --}}
            <div class="form-group @error('sector_title') has-danger @enderror">
              <label for="sector_title">Title</label>
              <input type="text" class="form-control @error('sector_title') form-control-danger @enderror" id="sector_title" name="sector_title" placeholder="DHA Phase 1" value="{{$sector->sector_title}}" required>
              @error('sector_title')
                <span class="help-block m-b-none danger">{{$message}}</span>
              @enderror
            </div>

            <div class="text-right">
              <button type="submit" class="btn primary m-b">Update Data</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection