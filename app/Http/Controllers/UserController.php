<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\appointment;

class UserController extends Controller
{
    function index()
    {
        $UsersAuth = auth()->user()->id;
        $appointments = appointment::where('user_id', $UsersAuth)
            ->get();

        return view('dashboards.users.index', compact('appointments'));
    }

    function profile()
    {
        return view('dashboards.users.profile');
    }
    function settings()
    {
        return view('dashboards.users.settings');
    }
}
