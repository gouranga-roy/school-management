<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends User
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'salary',
        'password',
        'photo'
    ];
}
