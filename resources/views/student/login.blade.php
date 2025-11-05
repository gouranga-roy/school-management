@extends('layouts.auth')

@section('title', 'Student Login')

@section('content')
<div class="login-right">
    <div class="login-right-wrap">
        <h1>Student Login</h1>
        <p class="account-subtitle">Access to our dashboard</p>

        @if(session('success'))
        <div
            class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="4000" style="position: fixed; top: 1rem; right: 1rem;">
            <div class="toast-header">
                <img src="https://via.placeholder.com/20" class="rounded mr-2" alt="">
                <strong class="mr-auto text-success">Success</strong>
                <!-- <small>11 mins ago</small> -->
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                {{ session('success') }}
            </div>
        </div>
        @endif

        @if(session('error'))
        <div
            class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="4000" style="position: fixed; top: 1rem; right: 1rem;">
            <div class="toast-header">
                <img src="https://via.placeholder.com/20" class="rounded mr-2" alt="">
                <strong class="mr-auto text-danger">Error</strong>
                <!-- <small>11 mins ago</small> -->
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                {{ session('error') }}
            </div>
        </div>
        @endif

        <!-- Form -->
        <form action="{{ route('student.login') }}" method="POST">
            @csrf
            <div class="form-group">
                <input class="form-control" type="text" name="email" value="{{ old('email') }}" placeholder="Email">
                @error('email')
                <p class="text text-danger fs-small mb-0">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Password">
                @error('password')
                <p class="text text-danger fs-small mb-0">{{ $message }}</p>
                @enderror
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

        <div class="text-center dont-have">Don’t have an account? <a href="{{ route('student.showRegister') }}">Register</a></div>
    </div>
</div>
@endsection