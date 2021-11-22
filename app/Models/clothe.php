<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clothe extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    public $timestamp = true;

    protected $fillable = [
        'clothesName',
        'amount',
    ];


    public function appointment()
    {
        return $this->hasMany(appointment::class, 'clothes_id', 'id');
    }
}
