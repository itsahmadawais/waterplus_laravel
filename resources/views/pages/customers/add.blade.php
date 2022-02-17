@extends('layouts.dashboard')

@section('content')
<div class="padding">
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="box">
        <div class="box-header">
          <h2>Create Customer Account</h2>
        </div>
        <div class="box-divider m-0"></div>
        <div class="box-body">
          <form role="form" method="POST" action="{{url('customers')}}">
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


            {{-- Email --}}
            <div class="form-group @error('email') has-danger @enderror">
              <label for="email">Email address</label>
              <input type="email" class="form-control @error('email') form-control-danger @enderror" id="email" name="email" placeholder="muhammad@gmail.com" required>
              @error('email')
                <span class="help-block m-b-none danger">{{$message}}</span>
              @enderror
            </div>

            {{-- First Name --}}
            <div class="form-group @error('f_name') has-danger @enderror">
              <label for="f_name">First Name</label>
              <input type="text" class="form-control @error('f_name') form-control-danger @enderror" id="f_name" name="f_name" placeholder="Muhammad" required>
              @error('f_name')
                <span class="help-block m-b-none danger">{{$message}}</span>
              @enderror
            </div>

            {{-- Last Name --}}
            <div class="form-group @error('l_name') has-danger @enderror">
              <label for="l_name">Last Name</label>
              <input type="text" class="form-control @error('l_name') form-control-danger @enderror" id="f_name" name="l_name" placeholder="Ali" required>
              @error('l_name')
                <span class="help-block m-b-none danger">{{$message}}</span>
              @enderror
            </div>

            {{-- Phone --}}
            <div class="form-group @error('phone') has-danger @enderror">
              <label for="phone">Phone</label>
              <input type="text" class="form-control @error('phone') form-control-danger @enderror" id="phone" name="phone" placeholder="03068797587" required>
              @error('phone')
                <span class="help-block m-b-none danger">{{$message}}</span>
              @enderror
            </div>

            {{-- Address --}}
            <div class="form-group @error('address') has-danger @enderror">
              <label for="address">Address</label>
              <input type="text" class="form-control @error('address') form-control-danger @enderror" id="address" name="address" placeholder="Bahria Town, Islamabad" required>
              @error('address')
                <span class="help-block m-b-none danger">{{$message}}</span>
              @enderror
            </div>


            {{-- Price --}}
            <div class="form-group @error('price') has-danger @enderror">
              <label for="price">Price</label>
              <input type="number" class="form-control @error('price') form-control-danger @enderror" id="price" name="price" placeholder="150" required>
              @error('price')
                <span class="help-block m-b-none danger">{{$message}}</span>
              @enderror
            </div>

            {{-- Password --}}
            <div class="form-group @error('password') has-danger @enderror">
              <label for="password">Password</label>
              <input type="password" class="form-control @error('password') form-control-danger @enderror" id="password" name="password" placeholder="Password" required>
              @error('password')
                <span class="help-block m-b-none danger">{{$message}}</span>
              @enderror
            </div>

            <div class="text-right">
              <button type="submit" class="btn primary m-b">Save Account</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection