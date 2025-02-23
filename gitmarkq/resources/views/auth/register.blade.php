@extends('home.master')
@section('title', 'Register')
@section('body')
    <div class="login-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    @include('message.message')
                    <form>
                        <h1>Sign Up</h1>
                        <div class="form-group">
                            <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                <input class="input-field" type="text" placeholder="Full Name" name="usrnm">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-container">
                                <i class="fa fa-envelope icon"></i>
                                <input class="input-field" type="text" placeholder="Email" name="usrnm">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-container">
                                <i class="fas fa-lock icon"></i>
                                <input class="input-field" type="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="submit">Register</button>
                        </div>
                        <div class="form-group">
                            <h6>OR</h6>
                        </div>
                        <div class="signup-icons">
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
