<?php

namespace App\Http\Controllers;

use App\Models\appointment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index()
    {
        $GetTime = date('Y-m-d');

        $GetMonth1 = date('2021-12');
        $GetMonth2 = date('2022-01');
        $GetMonth3 = date('2022-02');
        $GetMonth4 = date('2022-03');
        $GetMonth5 = date('2022-04');
        $GetMonth6 = date('2022-05');

        $approvalAppointment = appointment::WHERE('status', 2)
            ->count();

        $AppointmentMonth1 = appointment::where('appointment_date', 'like', '%' . $GetMonth1 . '%')
            ->count();
        $AppointmentMonth2 = appointment::where('appointment_date', 'like', '%' . $GetMonth2 . '%')
            ->count();
        $AppointmentMonth3 = appointment::where('appointment_date', 'like', '%' . $GetMonth3 . '%')
            ->count();
        $AppointmentMonth4 = appointment::where('appointment_date', 'like', '%' . $GetMonth4 . '%')
            ->count();
        $AppointmentMonth5 = appointment::where('appointment_date', 'like', '%' . $GetMonth5 . '%')
            ->count();
        $AppointmentMonth6 = appointment::where('appointment_date', 'like', '%' . $GetMonth6 . '%')
            ->count();

        $CountAppointment = appointment::count();
        $AppointmentToday = appointment::where('appointment_date', 'like', '%' . $GetTime . '%')
            ->count();

        return view('dashboards.admins.index', compact(
            'CountAppointment',
            'AppointmentToday',
            'AppointmentMonth1',
            'AppointmentMonth2',
            'AppointmentMonth3',
            'AppointmentMonth4',
            'AppointmentMonth5',
            'AppointmentMonth6',
            'approvalAppointment'
        ));
    }

    function profile()
    {
        return view('dashboards.admins.profile');
    }
    function settings()
    {
        return view('dashboards.admins.settings');
    }

    function updateInfo(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'email' => 'required' | 'email' | 'unique:users,' . Auth::user()->id,
            'mobilenumber' => ['required', 'int', 'min:11', 'max:11'],

        ]);

        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->erros()->toArray()]);
        } else {
        }
    }
}
