<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Show Login Form
    public function loginCreate() {
        return view('student.login');
    }


    // Show Register Form
    public function registerCreate() {
        return view('student.register');
    }

    // Show Dashboard
    public function dashboard() {
        return view('student.dashboard');
    }
}
