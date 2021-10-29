<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index()
    {
        return view('dashboards.admins.index');
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
