<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\appointment;
use App\Models\clothe;
use App\Models\fabric;
use App\Models\repair;
use App\Models\repair_price;
use Illuminate\Http\Request;

class AdminAppController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

public function index(Request $request)
    { 

        return view('dashboards.admins.forapproval');
    }

    public function appointmentlist(Request $request)
    { 

        return view('dashboards.admins.appointmentlist');
    }
}