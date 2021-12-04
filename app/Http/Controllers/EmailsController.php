<?php

namespace App\Http\Controllers;

use App\Mail\MailApproval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDO;

class EmailsController extends Controller
{
    public function email()
    {
        // return new MailApproval();
        Mail::to('ruel.reyes1998@gmail.com')->send(new MailApproval());
    }
}
