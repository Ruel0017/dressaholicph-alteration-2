<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\repair;
use App\Models\clothe;
use App\Models\fabric;
use App\Models\appointment_walkin;
use App\Models\walkin_user;
use App\Models\employee;

class AdminWalkinController extends Controller
{
    public function index(Request $request)
    { 
        $repair = repair::all();
        $clothe = clothe::all();
        $fabric = fabric::all();
        $employee = employee::all();

        $input = $request->input('clothesID');


        return view('dashboards.admins.walkin', compact('repair', 'clothe', 'fabric','employee'));
    }

    public function store(Request $request){

        $walkInUsers = walkin_user::create([
            'fname'=> $request['fname'],
            'mname'=> $request['mname'],
            'lname'=> $request['lname'],
            'sex'=>$request['sex'],
            'mobilenumber'=>$request['mobilenumber'],
            'email' => '',
            'address' => ''
        ]);
 
        $walkIn = appointment_walkin::create([
            'user_id' => $walkInUsers->id,
            'clothes_id'=> $request['clothes_Fabric'] ??  $request['clothes'],
            'status'=> 5,
            'emp_id'=> $request['emp_id'],
            'repair_id'=> $request['repair'],
            'fabric_id' => $request['fabric'],
            'appointment_date' =>  $request['appointment_date'],
            'totalAmount' => is_null($request['amount']) ?  $request['amount_fabric'] : $request['amount'],
        ]); 

       return redirect()->back()->with('success', 'Appointment submitted!');
    }

    public function showListofWalkins(Request $request){
        $walkin = walkin_user::all();
        $walkinAppointment = appointment_walkin::all();

        return view('dashboards.admins.walkinDisplay', compact('walkinAppointment', 'walkin'));
    }
}
