<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\appointment;
use App\Models\User;
use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;

class AdminPickupDateandTime extends Controller
{
    public function index()
    {
        $listOfAppointment = appointment::where('status', [4, 6])
            ->get();
        return view('dashboards.admins.pickupdate', compact('listOfAppointment'));
    }

    public function update(Request $request)
    {
        $getID = $request->input('ids');
        $updateDateandTime = appointment::find($getID);
        $updateDateandTime->pickup_date = $request->input('pickupdate');
        $updateDateandTime->save();


        $membersInfo = appointment::where('appointments.id', $getID)
            ->leftJoin('users', '.user_id', '=', 'users.id')
            ->select('fname', 'mname', 'lname', 'mobilenumber')
            ->get();


        $nameArray = [$membersInfo[0]['fname']];
        $FirstName = implode($nameArray);

        $membersMobleNumber = [$membersInfo[0]['mobilenumber']];
        $memberNo = implode($membersMobleNumber);


        Nexmo::message()->send([
            'to' =>  $memberNo,
            'from' => '639999999991',
            'text' => 'Hi ' . $FirstName . ', your appointment has been updated. Your pickup date is ' . $request->input('pickupdate')
        ]);


        return redirect()->back()->with('success', 'Successfully Updated');
    }
}
