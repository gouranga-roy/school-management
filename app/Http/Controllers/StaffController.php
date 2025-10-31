<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    // Show Login Form
    public function loginCreate() {
        return view('staff.login');
    }


    // Show Register Form
    public function registerCreate() {
        return view('staff.register');
    }

    // Show Dashboard
    public function dashboard() {
        return view('staff.dashboard');
    }
}
