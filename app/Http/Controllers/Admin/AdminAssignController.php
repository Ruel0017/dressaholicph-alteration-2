<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\appointment;
use Illuminate\Http\Request;

class AdminAssignController extends Controller
{
    public function index()
    {
        $Status = ([6, 4]);

        $appointment = appointment::whereIn('status', $Status)
            ->get();

        // dd($forAssign);

        return view('dashboards.admins.assign', compact('appointment'));
    }
}
