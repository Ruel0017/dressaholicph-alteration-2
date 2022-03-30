<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\appointment;
use Illuminate\Http\Request;

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

        return redirect()->back()->with('success', 'Successfully Updated');
    }
}
