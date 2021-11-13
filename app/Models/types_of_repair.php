<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class types_of_repair extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    public $timestamp = true;

    protected $fillable = [
        'repairName',
    ];
}
