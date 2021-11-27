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

        $appointment = appointment::WHERE('isActive',0)
        ->get();

        // dd($appointment);

        return view('dashboards.admins.forapproval',compact('appointment'));
    }



    public function appointmentlist(Request $request)
    { 
        $appointment = appointment::All()
        ->get();

        // dd($appointment);

        return view('dashboards.admins.appointmentlist',compact('appointment'));
    }
}