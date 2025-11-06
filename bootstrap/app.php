<?php

use App\Http\Middleware\StudentLogin;
use App\Http\Middleware\StudentLogout;
use App\Http\Middleware\TeacherLogin;
use App\Http\Middleware\TeacherLogout;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        
        // Student Middleware
        $middleware->alias([
            // Student Middleware
            'stuLogin' => StudentLogin::class,
            'stuLogout' => StudentLogout::class,

            // Teacher Middleware
            'techerLogin' => TeacherLogin::class,
            'teacherLogout' => TeacherLogout::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
