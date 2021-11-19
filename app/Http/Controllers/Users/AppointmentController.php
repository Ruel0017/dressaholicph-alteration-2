<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\appointment;
use App\Models\clothe;
use App\Models\fabric;
use App\Models\repair;
use App\Models\repair_price;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

        $repair = repair::all();
        $clothe = clothe::all();
        $fabric = fabric::all();

        return view('dashboards.users.appointment', compact('repair', 'clothe', 'fabric'));
    }

    public function listOfAppointment()
    {
        $repair = repair::all();
        $clothe = clothe::all();
        $fabric = fabric::all();

        return view('dashboards.users.listofappointment', compact('repair', 'clothe', 'fabric'));
    }

    public function getPrice($id)
    {

        $repair = repair_price::where('clothes_id', $id)
            ->leftJoin('repairs', '.repair_id', '=', 'repairs.id')
            ->select('repairName', 'amount', 'repairs.id')
            ->get();


        return response()->json($repair);
    }

    public function getAmount($id)
    {

        $repairAmount = repair_price::where('repair_id', $id)
            ->leftJoin('repairs', '.repair_id', '=', 'repairs.id')
            ->select('amount')
            ->distinct()
            ->get();


        return response()->json($repairAmount);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $appointmentDate = $request->input('appointment_date');
        $CountAppointment = appointment::where('appointment_date',  $appointmentDate)
            ->count();
        //Parameters 
        $UsersAuth = auth()->user()->id;
        $this->validate($request, [
            'appointment_date' => 'required',
            'clothes' => 'required',
            'repair' => 'required',
            'fabric' => 'required',
            'amount' => 'required',
        ]);

        $appointment = new appointment;
        $appointment->user_id = $UsersAuth;
        $appointment->appointment_date = $appointmentDate;
        $appointment->clothes_id = $request->input('clothes');
        $appointment->repair_id = $request->input('repair');
        $appointment->fabric_id = $request->input('fabric');
        $appointment->totalAmount = $request->input('amount');

        if ($CountAppointment <= 3) {
            $appointment->save();
            return redirect()->back()->with('success', 'Please wait for your approval');
        } else {
            return redirect()->back()->with('error', 'Please select other time/date this is fully booked');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
