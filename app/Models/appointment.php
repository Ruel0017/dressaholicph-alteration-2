<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appointment extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    public $timestamp = true;

    protected $fillable = [
        'user_id',
        'isActive',
        'clothes_id',
        'repair_id',
        'fabric_id',
        'appointment_date',
        'totalAmount',
        'approvedBy',
    ];

    public function clothes()
    {
        return $this->belongsTo(clothe::class, 'clothes_id', 'id');
    }

    public function repair()
    {
        return $this->belongsTo(repair::class, 'repair_id', 'id');
    }

    public function fabric()
    {
        return $this->belongsTo(fabric::class, 'id', 'fabric_id');
    }
}
