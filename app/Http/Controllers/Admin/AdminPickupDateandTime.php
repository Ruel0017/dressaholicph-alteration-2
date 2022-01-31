<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPickupDateandTime extends Controller
{
    public function index()
    {
        return view('dashboards.admins.pickupdate');
    }
}
