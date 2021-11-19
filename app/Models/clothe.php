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


    public function repair()
    {
        return $this->hasMany(repair::class, 'id', 'id');
    }

    public function fabric()
    {
        return $this->hasMany(fabric::class, 'id', 'id');
    }
}
