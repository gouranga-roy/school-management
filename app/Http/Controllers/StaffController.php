<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    // Show Login Form
    public function showLogin() {
        return view('staff.login');
    }





    // Show Register Form
    public function showRegister() {
        return view('staff.register');
    }
    
    // Staff Register
    public function register(Request $request) {
        
        // Form filed Validatin
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|unique:staff,email',
            'phone' => 'required|unique:staff,phone|max:11',
            'address' => 'nullable|string|max:250',
            'salary' => 'nullable|string|max:250',
            'password' => 'required|string|min:6|confirmed',
            'photo' => 'nullable|mimes:jpg,jpeg,png,svg',
        ], [
            'name.required' => 'Please enter your full name.',
            'email.required' => 'An email address is required.',
            'email.email'  => 'please enter your valid email address.',
            'email.unique' => 'This email address is already registered.',
            'phone.required'     => 'A phone number is required.',
            'phone.regex'        => 'Please enter a valid phone number (9–11 digits).',
            'phone.unique'       => 'This phone number is already in use.',
            'address.max'        => 'Address must not exceed 250 characters.',
            'salary.max'         => 'Salary must be number.',
            'photo.mimes'        => 'Photo must be in JPG, PNG, JPEG, or SVG format.',
            'photo.max'          => 'Photo size must not exceed 1MB.',
            'password.required'  => 'Please set a password.',
            'password.min'       => 'Password must be at least 6 characters long.',
            'password.confirmed' => 'Password confirmation does not match.',
        ]);

        // Store Photo
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = \App\Helpers\GlobalHelper::uploadFile($request->file('photo'), 'staff');
        }

        // Store Data
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['salary'] = $request->salary;
        $data['password'] = Hash::make($request->password);
        $data['photo'] = $photoPath;

        Staff::create($data);

        if($data) {
            return redirect()->back()->with('success', 'Staff Registration Successfully!');
        } else {
            return redirect()->back()->with('error', 'Staff Registration Faill!');
        }
    } 

    // Show Dashboard
    public function dashboard() {
        return view('staff.dashboard');
    }

    // Staff Login
    public function login(Request $request) {
        
        // Filed validation
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'An email address is required!',
            'password.required' => 'Password is required!',
        ]);

        // Staff Login
        if(Auth::guard('staff')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return redirect()->route('staff.dashboard')->with('success', 'Staff login successfully!');
        }


        return redirect()->back()->with('error', 'email or password invalid!');


    }
}
