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
                        <form method="POST" action="{{ route('reset.passeord') }}">
                            @csrf
                            <div class="form-group mb-20">
                                <div class="input-group">
                                    <input type="text" name="otp" class="form-control" required
                                        placeholder="Enter OTP*">
                                </div>
                            </div>
                            @error('otp')<p class="text-danger">{{ $message }}</p>@enderror
                         
                            <button class="btn main-btn full-width">VERIFY</button>
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