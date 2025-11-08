@extends('layouts.app')

@section('title', 'Home')

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-title">Welcome</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item active">Home</li>
            </ul>
        </div>
    </div>
</div>
<!-- /Page Header -->

<!-- Login Box -->
 <div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="card">
            <div class="card-header">
                Teacher Login
            </div>
            <div class="card-body">
                <h2 class="mb-4">Login With Teacher</h2>
                <a href="{{ route('teacher.showLogin') }}" class="btn btn-primary">Login</a>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="card">
            <div class="card-header">
                Student Login
            </div>
            <div class="card-body">
                <h2 class="mb-4">Login With Student</h2>
                <a href="{{ route('student.showLogin') }}" class="btn btn-primary">Login</a>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="card">
            <div class="card-header">
                Staff Login
            </div>
            <div class="card-body">
                <h2 class="mb-4">Login With Staff</h2>
                <a href="{{ route('staff.showLogin') }}" class="btn btn-primary">Login</a>
            </div>
        </div>
    </div>
 </div>
@endsection