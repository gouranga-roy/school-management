<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    
    // Show Register Form
    public function showRegister()
    {
        return view('student.register');
    }

    // Register
    public function register(Request $request)
    {
        
        // Form Validation
        $request->validate([
            'name'      => ['required', 'string', 'max:250'],
            'email'     => ['required', 'email', 'unique:students,email'],
            'phone'     => ['required', 'unique:students,phone'],
            'address'   => ['nullable', 'string', 'max:250'],
            'photo'     => ['nullable', 'mimes:jpg,png,jpeg,svg', 'max:1024'],
            'password'  => ['required', 'string', 'min:6', 'confirmed'],
        ], [
            'name.required'      => 'Please enter your full name.',
            'email.required'     => 'An email address is required.',
            'email.email'        => 'Please enter a valid email address.',
            'email.unique'       => 'This email address is already registered.',
            'phone.required'     => 'A phone number is required.',
            'phone.regex'        => 'Please enter a valid phone number (9–11 digits).',
            'phone.unique'       => 'This phone number is already in use.',
            'address.max'        => 'Address must not exceed 250 characters.',
            'photo.mimes'        => 'Photo must be in JPG, PNG, JPEG, or SVG format.',
            'photo.max'          => 'Photo size must not exceed 1MB.',
            'password.required'  => 'Please set a password.',
            'password.min'       => 'Password must be at least 6 characters long.',
            'password.confirmed' => 'Password confirmation does not match.',
        ]);

        // Store Photo
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = \App\Helpers\GlobalHelper::uploadFile($request->file('photo'), 'student');
        }

        // Store form data
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['password'] = Hash::make($request->password);
        $data['photo'] = $photoPath;

        Student::create($data);

        // Success message
        if ($data) {
            return redirect()->back()->with('success', 'Student Registration Successfully!');
        } else {
            return redirect()->back()->with('error', 'Student Registration Failed!');
        }
    }

    // Show Login Form
    public function showLogin()
    {
        return view('student.login');
    }

    // Student Login
    public function login(Request $request) {
        // Form Validation
        $login = $request->validate([
            'email'     => ['required'],
            'password'  => ['required', 'string', 'min:6'],
        ], [
            'email.required'     => 'An email address is required.',
            'password.required'  => 'Please set a password.',
        ]);

        // Login & Check User
        if(Auth::guard('student')->attempt($login)) {
            return redirect()->route('student.dashboard')->with('success', 'Student Login Successfully!');
        }

        return redirect()->back()->with('error', 'Email Or Password does'."t".' match!');


    }

    // Show Dashboard
    public function dashboard()
    {
        return view('student.dashboard');
    }

    // Logout
    // public function logout() {
    //     Auth::guard('student')->logout();

    //     return redirect()->route('student.login')->with('error', 'User Logout!');
    // }
}
