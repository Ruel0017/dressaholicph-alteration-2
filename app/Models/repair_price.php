<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class repair_price extends Model
{
    use HasFactory;


    protected $primaryKey = 'id';

    public $timestamp = true;

    protected $fillable = [
        'clothes_id',
        'repair_id',
        'fabric_id',
        'amount',
    ];

    public function clothes()
    {
        return $this->hasMany(clothe::class, 'clothes_id', 'id');
    }

    public function repair()
    {
        return $this->hasMany(repair::class, 'repair_id', 'id');
    }

    public function fabric()
    {
        return $this->hasMany(fabric::class, 'fabric_id', 'id');
    }
}
