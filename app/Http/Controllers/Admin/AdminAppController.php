<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\MailApproval;
use App\Models\appointment;
use App\Models\payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Nexmo\Laravel\Facade\Nexmo;
use Illuminate\Support\Facades\DB;

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

        return view('dashboards.admins.appointmentlist', compact('appointment'));
    }

    public function paymentHistory()
    {
        $payment = payment::All();
        $totalAmount =   DB::table('payments')
                            ->select( DB::raw('SUM(amount) as TotalSales'))
                            ->get();
        // // ->get();

        // dd( $totalAmount);

        return view('dashboards.admins.paymenthistory', compact('payment','totalAmount'));
    }


    public function update(Request $request)
    {
        $getID = $request->input('ids');
        $getMobileNumber = $request->input('email');
        $Status = $request->input('status');

        $statusUpdate = appointment::find($getID);
        $statusUpdate->approvedBy = $request->input('name');
        $statusUpdate->status = $Status;

        if ($statusUpdate && $Status == '3') {
            $statusUpdate->save();
            Nexmo::message()->send([
                'to' =>  $getMobileNumber,
                'from' => '639999999999',
                'text' => 'This is to notify you that your appointment is already approved. Please settle the half of payment to your dashboard. Thank you !'
            ]);
            return redirect()->back()->with('success', 'Status is successfuly update');
        } else {
            $statusUpdate->save();
            Nexmo::message()->send([
                'to' =>  $getMobileNumber,
                'from' => '639999999991',
                'text' => 'This is to notify you that your appointment has been denied. Thank you!'
            ]);
            return redirect()->back()->with('error', 'Disapporved');
        }
    }
}
