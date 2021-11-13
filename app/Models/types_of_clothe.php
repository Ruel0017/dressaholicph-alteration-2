<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class types_of_clothe extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    public $timestamp = true;

    protected $fillable = [
        'clothesName',
    ];


    public function repair()
    {
        return $this->hasMany(types_of_repair::class, 'id', 'id');
    }

    public function fabric()
    {
        return $this->hasMany(types_of_fabric::class, 'id', 'id');
    }
}
