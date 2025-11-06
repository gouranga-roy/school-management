<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{

    // Show Register Form
    public function showRegister()
    {
        return view('teacher.register');
    }

    // Register
    public function register(Request $request)
    {

        // Form Validatio
        $request->validate([
            'name'          => ['required', 'string', 'max:250'],
            'email'         => ['required', 'email', 'unique:teachers,email'],
            'phone'         => ['required', 'unique:teachers,phone'],
            'address'       => ['nullable', 'string', 'max:250'],
            'photo'         => ['nullable', 'mimes:jpg,png,jpeg,svg', 'max:1024'],
            'qualification' => ['required', 'string', 'max:250'],
            'subject'       => ['required', 'string', 'max:150'],
            'experience'    => ['nullable', 'numeric', 'min:0', 'max:50'],
            'password'      => ['required', 'string', 'min:6', 'confirmed'],
        ],[
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
            'photo.max'          => 'Photo size must not exceed 1MB.',
            'qualification.required'  => 'Qualification is required.',
            'password.min'       => 'Password must be at least 6 characters long.',
            'password.confirmed' => 'Password confirmation does not match.',
        ]);

        // Upload photo
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = \App\Helpers\GlobalHelper::uploadFile($request->file('photo'), 'teacher');
        }

        // Store data in Teacher table

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['qualification'] = $request->qualification;
        $data['subject'] = $request->subject;
        $data['experience'] = $request->experience;
        $data['password'] = Hash::make($request->password);
        $data['photo'] = $photoPath;

        Teacher::create($data);

        // Responser return
        if ($data) {
            return redirect()->route('teacher.dashboard')->with('success', 'Teacher Registration Successfully!');
        } else {
            return redirect()->back()->with('error', 'Registration Faild!');
        }
    }


    // Show Login Form
    public function showLogin()
    {
        return view('teacher.login');
    }

    // Login
    public function login(Request $request)
    {

        // Filed Validation
        $request->validate(
            [
                'email' => ['required'],
                'password' => ['required', 'string', 'min:6'],
            ],
            [
                'email.required' => 'Email Is Required!',
                'password.required' => 'Password Is Required!',
            ]
        );

        if (Auth::guard('teacher')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            return redirect()->route('teacher.dashboard')->with('success', 'Teacher Login Successfully!');
        }

        return back()->with('error', 'Invalid email or password!');
    }



    // Show Dashboard
    public function dashboard()
    {
        return view('teacher.dashboard');
    }
}
