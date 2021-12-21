<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\appointment;
use App\Models\clothe;
use App\Models\fabric;
use App\Models\repair;
use App\Models\repair_price;
use App\Models\payment;
use Illuminate\Http\Request;

class EcommerceController extends Controller
{
    function index()
    {
        return view('dashboards.users.ecommerce');
    }
}   