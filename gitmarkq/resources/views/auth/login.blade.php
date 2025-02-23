@extends('home.master')
@section('title','Login')
@section('body')

<div class="login-section">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12">
          @include('message.message')
          <form method="POST" action="{{ route('user.login') }}">
            @csrf
            <h1>Log In</h1>
            <div class="form-group">
              <div class="input-container">
                <i class="fa fa-user icon"></i>
                <input class="input-field" type="text" placeholder="Email Address" name="email" value="{{ old('email') }}">
              </div>
             @error('email') <p class="text-danger">{{ $message }}</p>@enderror
            </div>
            <div class="form-group">
              <div class="input-container">
                <i class="fas fa-lock icon"></i>
                <input class="input-field" type="password" placeholder="Password" name="password">
              </div>
              @error('password') <p class="text-danger">{{ $message }}</p>@enderror
            </div>          
            <div class="form-group">
              <button class="submit">Login</button>
            </div>
            <div class="form-group">
              <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
              <label for="vehicle1"> Stay Signin</label>
              <p><a href="{{ route('forget.password') }}">Forgot your password?</a></p>            
              <p>Don't have a Account? <a href="{{ route('register') }}">Register Now</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection