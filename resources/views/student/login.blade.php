@extends('layouts.auth')

@section('title', 'Student Login')

@section('content')
<div class="login-right">
    <div class="login-right-wrap">
        <h1>Student Login</h1>
        <p class="account-subtitle">Access to our dashboard</p>

        <!-- Form -->
        <form action="https://dreamguys.co.in/demo/doccure/admin/index.html">
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Email">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Password">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Login</button>
            </div>
        </form>
        <!-- /Form -->

        <div class="text-center forgotpass"><a href="forgot-password.html">Forgot Password?</a></div>
        <div class="login-or">
            <span class="or-line"></span>
            <span class="span-or">or</span>
        </div>

        <!-- Social Login -->
        <div class="social-login">
            <span>Login with</span>
            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a><a href="#" class="google"><i class="fa fa-google"></i></a>
        </div>
        <!-- /Social Login -->

        <div class="text-center dont-have">Don’t have an account? <a href="{{ route('student.register') }}">Register</a></div>
    </div>
</div>
@endsection