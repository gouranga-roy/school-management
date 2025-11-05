<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends User
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'qualification',
        'subject',
        'experience',
        'password',
        'photo'
    ];
}
