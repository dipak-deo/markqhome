@extends('home.master')
@section('title', 'forget password')
@section('body')

    <div class="login-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    @include('message.message')
                    <form>
                        <h1>Forget Password</h1>
                        <div class="form-group">
                            <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                <input class="input-field" type="text" placeholder="email address" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="submit">send otp</button>
                        </div>
                        <div class="form-group">
                            {{-- <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                            <label for="vehicle1"> Stay Signin</label> --}}
                            <p>back to <a href="{{ route('login') }}"> login</a></p>
                            {{-- <p>Don't have a Adapt Account? <a href="#">Register Now</a></p> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
