<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;

class SmsController extends Controller
{
    public function index()
    {
        Nexmo::message()->send([
            'to' => '639362655590',
            'from' => '639999999999',
            'text' => 'Test SMS'
        ]);

        echo "Message Sent!!";
    }
}
