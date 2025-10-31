<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    // Show Login Form
    public function loginCreate() {
        return view('teacher.login');
    }


    // Show Register Form
    public function registerCreate() {
        return view('teacher.register');
    }

    // Show Dashboard
    public function dashboard() {
        return view('teacher.dashboard');
    }
}
