<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\repair;
use App\Models\clothe;
use App\Models\fabric;
use App\Models\appointment_walkin;
use App\Models\walkin_user;

class AdminWalkinController extends Controller
{
    public function index(Request $request)
    { 
        $repair = repair::all();
        $clothe = clothe::all();
        $fabric = fabric::all();

        $input = $request->input('clothesID');


        return view('dashboards.admins.walkin', compact('repair', 'clothe', 'fabric'));
    }

    public function store(Request $request){

        // $walkinUsers = new walkin_user;
        // $walkinUsers -> fname = $request->input('fname');
        // $walkinUsers -> mname = $request->input('mname');
        // $walkinUsers -> lname = $request->input('lname');
        // $walkinUsers -> sex= $request->input('sex');
        // $walkinUsers -> mobilenumber = $request->input('mobilenumber');
        // $walkinUsers -> address = 'nahulog din';
        // $walkinUsers -> email = 'email';

        $walkInUsers = walkin_user::create([
            'fname'=> $request['fname'],
            'mname'=> $request['mname'],
            'lname'=> $request['lname'],
            'sex'=>$request['sex'],
            'mobilenumber'=>$request['mobilenumber'],
            'email' => '',
            'address' => ''
        ]);

        //dd( is_null($request['amount']) ? 'EMPTY': 'NO');
         //dd($request['amount'] = '' ?  $request['amount_fabric'] : $request['amount']);
 
        $walkIn = appointment_walkin::create([
            'user_id' => $walkInUsers->id,
            'clothes_id'=> $request['clothes_Fabric'] = null ?  $request['clothes'] : $request['clothes_Fabric'],
            'status'=> 5,
            'emp_id'=>null,
            'repair_id'=> $request['repair'],
            'fabric_id' => $request['fabric'],
            'appointment_date' =>  $request['appointment_date'],
            'totalAmount' => is_null($request['amount']) ?  $request['amount_fabric'] : $request['amount'],
            // 'totalAmount' => $request['amount_fabric']
        ]); 

       return redirect()->back()->with('success', 'Appointment submitted!');
    }
}
