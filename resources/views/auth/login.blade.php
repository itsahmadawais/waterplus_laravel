@extends('layouts.auth')

@section('content')
    <div class="center-block w-xxl w-auto-xs p-y-md">
        <div class="navbar">
            <div class="pull-center">
                <div ui-include="'../views/blocks/navbar.brand.html'"></div>
            </div>
        </div>
        <div class="p-a-md box-color r box-shadow-z1 text-color m-a">
            <div class="m-b text-sm">
                Sign in with water plus
            </div>
            <form name="form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="md-form-group float-label">
                    <input id="email" type="email" class="md-input" ng-model="user.email" name="email" value="{{ old('email') }}"
                        required autocomplete="email" autofocus>
                    <label>Email</label>
                    @error('email')
                    {{$message}}
                    @enderror
                </div>
                <div class="md-form-group float-label">
                    <input type="password" class="md-input" ng-model="user.password" name="password" required
                        autocomplete="current-password">
                    <label>Password</label>
                    @error('password')
                    {{$message}}
                    @enderror
                </div>
                <div class="m-b-md">
                    <label class="md-check">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}><i
                            class="primary"></i> Keep me signed in
                    </label>
                </div>
                <button type="submit" class="btn primary btn-block p-x-md">Sign in</button>
            </form>
        </div>
        @if (Route::has('password.request'))
            <div class="p-v-lg text-center">
                <div class="m-b"><a ui-sref="access.forgot-password" href="{{ route('password.request') }}"
                        class="text-primary _600">Forgot password?</a></div>
        @endif
        <div>Do not have an account? <a ui-sref="access.signup" href="signup.html" class="text-primary _600">Sign up</a>
        </div>
    </div>
    </div>
@endsection
