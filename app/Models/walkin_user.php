<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class walkin_user extends Model
{
    use HasFactory;

    protected $fillable = [
        'fname',
        'mname',
        'lname',
        'dob',
        'sex',
        'address',
        'mobilenumber',
        'email'
    ];
}
