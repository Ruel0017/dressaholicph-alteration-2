<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\appointment;
use App\Models\employee;
use App\Models\payments;
use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;

class AdminPendingPaymentController extends Controller
{

    public function PendingPayments()
    {
        $listOfAppointment = appointment::where('status', 4)
        ->get();
    return view('dashboards.admins.pendingpage', compact('listOfAppointment'));
    }

    public function updatepaymentstatus(Request $request)
    {   
        $status =  $request->input('status');
         

        $getID = $request->input('ids2');
        $AssignEmp = appointment::find($getID);
        $AssignEmp->status = $status;
        $AssignEmp->save();
        return redirect()->back()->with('success', 'Successfully Updated');
    }


}