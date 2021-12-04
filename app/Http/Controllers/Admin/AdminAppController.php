<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\MailApproval;
use App\Models\appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Nexmo\Laravel\Facade\Nexmo;

class AdminAppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $appointment = appointment::WHERE('status', 2)
            ->get();

        return view('dashboards.admins.forapproval', compact('appointment'));
    }



    public function appointmentlist()
    {
        $appointment = appointment::All();



        // dd($appointment);

        return view('dashboards.admins.appointmentlist', compact('appointment'));
    }


    public function update(Request $request)
    {
        $getID = $request->input('ids');
        $getMobileNumber = $request->input('email');
        $Status = $request->input('status');

        $SMSApproved =  Nexmo::message()->send([
            'to' =>  $getMobileNumber,
            'from' => '639999999999',
            'text' => 'This is notify you that your appointment is already approved, please settle the half of payment to your dashboard, Thank you ! '
        ]);

        $SMSdisApproved =  Nexmo::message()->send([
            'to' =>  $getMobileNumber,
            'from' => '639999999999',
            'text' => 'This is notify you that your appointment is denied, Thank you! '
        ]);

        $statusUpdate = appointment::find($getID);
        $statusUpdate->approvedBy = $request->input('name');
        $statusUpdate->status = $Status;

        if ($statusUpdate && $Status == '3') {
            $statusUpdate->save();
            $SMSApproved;
            // Mail::to($request->input('email'))->send(new MailApproval());
            return redirect()->back()->with('success', 'Status is successfuly update');
        } else {
            $statusUpdate->save();
            $SMSdisApproved;
            return redirect()->back()->with('error', 'Disapporved');
        }
    }
}
