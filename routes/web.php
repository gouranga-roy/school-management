<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

Route::get('/', function () {
    return view('index');

});


// Student Controller
Route::get('student-login', [StudentController::class, 'showLogin'])->name('student.showLogin')->middleware('stuLogin');
Route::post('student-login', [StudentController::class, 'login'])->name('student.login');

Route::get('student-register', [StudentController::class, 'showRegister'])->name('student.showRegister')->middleware('stuLogin');;
Route::post('student-register', [StudentController::class, 'register'])->name('student.register');

Route::get('student-dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard')->middleware('stuLogout');


// Teacher Controller
Route::get('teacher-login', [TeacherController::class, 'showLogin'])->name('teacher.showLogin')->middleware('techerLogin');
Route::post('teacher-login', [TeacherController::class, 'login'])->name('teacher.login');

Route::get('teacher-register', [TeacherController::class, 'showRegister'])->name('teacher.showRegister')->middleware('techerLogin');
Route::post('teacher-register', [TeacherController::class, 'register'])->name('teacher.register');

Route::get('teacher-dashboard', [TeacherController::class, 'dashboard'])->name('teacher.dashboard')->middleware('teacherLogout');


// Staff Controller
Route::get('staff-login', [StaffController::class, 'showLogin'])->name('staff.showLogin')->middleware('staffLogin');
Route::post('staff-login', [StaffController::class, 'login'])->name('staff.login');

Route::get('staff-register', [StaffController::class, 'showRegister'])->name('staff.showRegister')->middleware('staffLogin');
Route::post('staff-register', [StaffController::class, 'register'])->name('staff.register');

Route::get('staff-dashboard', [StaffController::class, 'dashboard'])->name('staff.dashboard')->middleware('staffLogout');

// Logout for all user 

Route::post('/logout', function(Request $request) {
    if(Auth::guard('student')->check()) {
        Auth::guard('student')->logout();
        $redirect = route('student.showLogin');
    } elseif(Auth::guard('teacher')->check()) {
        Auth::guard('teacher')->logout();
        $redirect = route('teacher.showLogin');
    } elseif(Auth::guard('staff')->check()) {
        Auth::guard('staff')->logout();
        $redirect = route('staff.showLogin');
    }

    // $request->session()->invalidate();
    // $request->session()->regenerateToken();

    $request->session()->invalidate();
    $request->session()->regenerateToken();


    // Redirect the route
    return redirect($redirect)->with('success', 'User logout Success.');
    
})->name('logout');