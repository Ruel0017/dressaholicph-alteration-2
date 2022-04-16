<?php

namespace App\Http\Controllers;

use App\Models\appointment;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Str;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $date =  date('Y-m-d');
        $image = base64_encode(file_get_contents(public_path('img/HomePageImg/Dressaholic_logo.png')));
        $title = 'Dressaholicph Altermatin';
        $address = 'Dona Isidora St. Don Antonio Quezon City';
        $contactNumber = '+63 995 270 6395';
        $refNumber = Str::random(30);

        $dailyReport = appointment::whereDate('created_at', $date)
            ->get();

        $pdf = PDF::loadView('myPDF', compact('title', 'image', 'date', 'address', 'contactNumber', 'refNumber', 'dailyReport'));

        return $pdf->download('report.pdf');
    }
}
