<?php

use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');

});


// Student Controller
Route::get('student-login', [StudentController::class, 'loginCreate'])->name('student.login');
Route::get('student-register', [StudentController::class, 'registerCreate'])->name('student.register');
Route::get('student-dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');

// Staff Controller
Route::get('staff-login', [StaffController::class, 'loginCreate'])->name('staff.login');
Route::get('staff-register', [StaffController::class, 'registerCreate'])->name('staff.register');
Route::get('staff-dashboard', [StaffController::class, 'dashboard'])->name('staff.dashboard');

// Teacher Controller
Route::get('teacher-login', [TeacherController::class, 'loginCreate'])->name('teacher.login');
Route::get('teacher-register', [TeacherController::class, 'registerCreate'])->name('teacher.register');
Route::get('teacher-dashboard', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');

