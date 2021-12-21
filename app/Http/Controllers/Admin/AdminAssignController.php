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
        $Status = ([6, 4]);

        $appointment = appointment::whereIn('status', $Status)
            ->get();
        $employee = employee::all();

        return view('dashboards.admins.assign', compact('appointment', 'employee'));
    }

    public function update(Request $request)
    {
        $getID = $request->input('ids');
        $EmpId = $request->input('emp_id');

        $getUserID = appointment::where('appointments.id', $getID)
            ->leftJoin('users', '.user_id', '=', 'users.id')
            ->select('fname', 'mname', 'lname')
            ->get();
        $ScheduleChar = appointment::where('id', $getID)
            ->select('appointment_date')
            ->get();

        $ScheduleFront  = (substr_replace($ScheduleChar, '', 0, 22));
        $Schedule = (substr_replace($ScheduleFront, '', -3));



        //Getting full Name
        $FisrtNameWithChar = (substr_replace($getUserID, '', 0, 11));
        $FirstName = (substr_replace($FisrtNameWithChar, '', -34));
        ///

        $getEmpID = employee::where('id', $EmpId)
            ->select('fullname')
            ->get();

        $EmpNameWithChar = (substr_replace($getEmpID, '', 0, 14));
        $EmpName = (substr_replace($EmpNameWithChar, '', -3));

        $getMobileNumber = $request->input('number');

        $AssignEmp = appointment::find($getID);
        $AssignEmp->status = '6';
        $AssignEmp->emp_id = $EmpId;
        $AssignEmp->save();
        Nexmo::message()->send([
            'to' =>  $getMobileNumber,
            'from' => '639999999991',
            'text' => 'Hi ' . $FirstName . ', your appointment has been confirmed. Please come at ' . $Schedule . ' and find ' . $EmpName . '. Landmark : in front of Charis Central Academy '
        ]);

        return redirect()->back()->with('success', 'Appointment has been confirmed');
    }
}
