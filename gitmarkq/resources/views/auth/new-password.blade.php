@extends('home.master')
@section('title','forget password')
@section('body')

<div class="authentication-section pt-100 pb-70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 pb-30">
                <div class="authentication-item">
                    @include('message.message')
                    <h3>Verify Your otp</h3>
                    <div class="authentication-form">
                        <form method="POST" action="{{ route('reset.passeord.submit') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group mb-20">
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control" required
                                        placeholder="Enter New Password">
                                </div>
                            </div>
                            @error('password')<p class="text-danger">{{ $message }}</p>@enderror
                            <div class="form-group mb-20">
                                <div class="input-group">
                                    <input type="password" name="confirm_password" class="form-control" required
                                        placeholder="Confirm Password">
                                </div>
                            </div>
                            @error('confirm_password')<p class="text-danger">{{ $message }}</p>@enderror
                         
                            <button class="btn main-btn full-width">CHANGE</button>
                            <div class="authentication-account-access-item">
                                <div class="authentication-link">
                                    <a href="{{ route('login') }}">back to login</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection