<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    public $timestamp = true;

    protected $fillable = [
        'fullname',
    ];

    public function appointment()
    {
        return $this->belongsTo(appointment::class, 'emp_id', 'id');
    }
}
