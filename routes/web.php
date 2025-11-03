<?php

use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');

});


// Student Controller
Route::get('student-login', [StudentController::class, 'showLogin'])->name('student.showLogin');
Route::post('student-login', [StudentController::class, 'login'])->name('student.login');

Route::get('student-register', [StudentController::class, 'showRegister'])->name('student.showRegister');
Route::post('student-register', [StudentController::class, 'register'])->name('student.register');

Route::get('student-dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');

// Staff Controller
Route::get('staff-login', [StaffController::class, 'showLogin'])->name('staff.login');

Route::get('staff-register', [StaffController::class, 'showRegister'])->name('staff.register');

Route::get('staff-dashboard', [StaffController::class, 'dashboard'])->name('staff.dashboard');

// Teacher Controller
Route::get('teacher-login', [TeacherController::class, 'showLogin'])->name('teacher.login');

Route::get('teacher-register', [TeacherController::class, 'showRegister'])->name('teacher.register');

Route::get('teacher-dashboard', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');

