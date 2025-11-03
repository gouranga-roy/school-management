<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Student extends User
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'password',
        'photo'
    ];
}
