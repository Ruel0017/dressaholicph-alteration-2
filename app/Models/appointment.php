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
        'startDate',
        'endDate',
        'totalAmount',
        'approvedBy',
        'auditUser',
        'auditDate',
    ];
}
