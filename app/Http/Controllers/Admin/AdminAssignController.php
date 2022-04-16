<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\appointment;
use App\Models\employee;
use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;

class AdminAssignController extends Controller
{
    public function index()
    {
        $Status = ([8,6]);

        $appointment = appointment::whereIn('status', $Status)
            ->get();
        $employee = employee::all();

        return view('dashboards.admins.assign', compact('appointment', 'employee'));
    }

    public function update(Request $request)
    {
        $getID = $request->input('ids');
        $EmpId = $request->input('emp_id');
        $pickUpdate = $request->input('pickupdate');

        $getUserID = appointment::where('appointments.id', $getID)
            ->leftJoin('users', '.user_id', '=', 'users.id')
            ->select('fname', 'mname', 'lname')
            ->get();
        $ScheduleChar = appointment::where('id', $getID)
            ->select('appointment_date')
            ->get();

        $Schedules = [$ScheduleChar[0]['appointment_date']];

        $Schedule = implode($Schedules);

        //Getting full Name
        $FirstNames = [$getUserID[0]['fname']];
        $FirstName = implode($FirstNames);
        ///
        $getEmpID = employee::where('id', $EmpId)
            ->select('fullname')
            ->get();

        $EmpNames = [$getEmpID[0]['fullname']];
        $EmpName = implode($EmpNames);

        $getMobileNumber = $request->input('number');

        $AssignEmp = appointment::find($getID);
        $AssignEmp->status = '6';
        $AssignEmp->emp_id = $EmpId;
        $AssignEmp->pickup_date = $pickUpdate;
        $AssignEmp->save();
        Nexmo::message()->send([
            'to' =>  $getMobileNumber,
            'from' => '639999999991',
            'text' => 'Hi ' . $FirstName . ', your appointment has been confirmed. Please come at ' . $Schedule . ' and find ' . $EmpName . '. Landmark : in front of Charis Central Academy your pickup date is ' . $pickUpdate
        ]);

        return redirect()->back()->with('success', 'Appointment has been confirmed');
    }

    public function updateStatus(Request $request)
    {
        $getID = $request->input('ids1');

        $updateStatus = appointment::find($getID);
        $updateStatus->status = '5';
        $updateStatus->save();

        return redirect()->back()->with('success', 'Successfully Updated');
    }
}
