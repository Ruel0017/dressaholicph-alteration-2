<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Str;
use App\Models\appointment;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\payment;

class AdminPrint extends Controller
{
    public function index()
    {
        return view('dashboards.admins.Reports');
    }

    public function daily()
    {
        $date =  date('Y-m-d');
        $Reports = 'Daily';
        $image = base64_encode(file_get_contents(public_path('img/HomePageImg/Dressaholic_logo.png')));
        $title = 'Dressaholicph';
        $address = 'Dona Isidora St. Don Antonio Quezon City';
        $contactNumber = '+63 995 270 6395';
        $refNumber = Str::random(30);

        $dt = Carbon::now(); 
        $DateToday = $dt->toFormattedDateString(); 
        
        $totalAmount = DB::table('payments')
            ->select(DB::raw('SUM(amount) as TotalSales'))
            ->where('created_at', 'like', $date.'%')
            ->whereNotIn('type_of_payment',['ECOMMERCE PARTIAL PAYMENT'])
            ->get();

        $dailyReport = payment::whereDate('created_at', $date)
            ->whereNotIn('type_of_payment',['ECOMMERCE PARTIAL PAYMENT'])
            ->get();

        $pdf = PDF::loadView('myPDF', compact('title', 'image', 'date', 'address', 'contactNumber', 
            'refNumber', 'dailyReport', 'totalAmount','Reports','DateToday'));

        return $pdf->download('DailyReport.pdf');
    }

    public function weekly()
    {
        $date =  date('Y-m-d');
        $Reports = 'Weekly';
        $image = base64_encode(file_get_contents(public_path('img/HomePageImg/Dressaholic_logo.png')));
        $title = 'Dressaholicph';
        $address = 'Dona Isidora St. Don Antonio Quezon City';
        $contactNumber = '+63 995 270 6395';
        $refNumber = Str::random(30);
        $now = Carbon::now();
        $weekStrtDate = $now->startOfWeek()->format('Y-m-d');
        $weekEndDate = $now->endOfWeek()->format('Y-m-d');
        $DateToday = $now->toFormattedDateString(); 

        $totalAmount = DB::table('payments')
        ->select(DB::raw('SUM(amount) as TotalSales'))
        ->whereBetween('created_at', [$weekStrtDate." 00:00:00", $weekEndDate." 23:59:59"])
        ->whereNotIn('type_of_payment',['ECOMMERCE PARTIAL PAYMENT'])
        ->get();

        // dd($weekStrtDate, $weekEndDate);

        $dailyReport = payment::whereBetween('created_at', [$weekStrtDate." 00:00:00", $weekEndDate." 23:59:59"])
        ->whereNotIn('type_of_payment',['ECOMMERCE PARTIAL PAYMENT'])
        ->get();

        $pdf = PDF::loadView('myPDF', compact('title', 'image', 'date', 'address', 'contactNumber', 'refNumber', 'dailyReport','totalAmount','Reports', 'DateToday'));

        return $pdf->download('WeeklyReport.pdf');
    }

    public function mohtly()
    {
        $date =  date('Y-m-d');
        $month =  date('Y-m');
        $Reports = 'Monthly';
        $image = base64_encode(file_get_contents(public_path('img/HomePageImg/Dressaholic_logo.png')));
        $title = 'Dressaholicph';
        $address = 'Dona Isidora St. Don Antonio Quezon City';
        $contactNumber = '+63 995 270 6395';
        $refNumber = Str::random(30);
        $now = Carbon::now();
        $dailyReport = payment::where('created_at','LIKE', $month.'%')
        ->whereNotIn('type_of_payment',['ECOMMERCE PARTIAL PAYMENT'])
        ->get();

        $DateToday = $now->toFormattedDateString(); 

        $totalAmount = DB::table('payments')
        ->select(DB::raw('SUM(amount) as TotalSales'))
        ->whereNotIn('type_of_payment',['ECOMMERCE PARTIAL PAYMENT'])
        ->get();


        $pdf = PDF::loadView('myPDF', compact('title', 'image', 'date', 'address', 'contactNumber', 'refNumber', 'dailyReport','totalAmount','Reports','DateToday'));

        return $pdf->download('MonthlyReport.pdf');
    }

    public function ecommerceDaily()
    {
        $date =  date('Y-m-d');
        $Reports = 'Daily';
        $image = base64_encode(file_get_contents(public_path('img/HomePageImg/Dressaholic_logo.png')));
        $title = 'Dressaholicph';
        $address = 'Dona Isidora St. Don Antonio Quezon City';
        $contactNumber = '+63 995 270 6395';
        $refNumber = Str::random(30);

        $dt = Carbon::now(); 
        $DateToday = $dt->toFormattedDateString(); 
        
        $totalAmount = DB::table('payments')
        ->select(DB::raw('SUM(amount) as TotalSales'))
        ->where('created_at', 'like', $date.'%')
        ->where('type_of_payment','=','ECOMMERCE PARTIAL PAYMENT')
        ->get();

        $dailyReport = payment::whereDate('created_at', $date)
            ->where('type_of_payment','=','ECOMMERCE PARTIAL PAYMENT')
            ->get();

        $pdf = PDF::loadView('myPDF', compact('title', 'image', 'date', 'address', 'contactNumber', 
            'refNumber', 'dailyReport', 'totalAmount','Reports','DateToday'));

        return $pdf->download('MonthlyReport.pdf');
    }
    public function ecommerceweekly()
    {
        $date =  date('Y-m-d');
        $Reports = 'Weekly';
        $image = base64_encode(file_get_contents(public_path('img/HomePageImg/Dressaholic_logo.png')));
        $title = 'Dressaholicph';
        $address = 'Dona Isidora St. Don Antonio Quezon City';
        $contactNumber = '+63 995 270 6395';
        $refNumber = Str::random(30);
        $now = Carbon::now();
        $weekStrtDate = $now->startOfWeek()->format('Y-m-d');
        $weekEndDate = $now->endOfWeek()->format('Y-m-d');
        $DateToday = $now->toFormattedDateString(); 

        $totalAmount = DB::table('payments')
        ->select(DB::raw('SUM(amount) as TotalSales'))
        ->whereBetween('created_at', [$weekStrtDate." 00:00:00", $weekEndDate." 23:59:59"])
        ->where('type_of_payment','=','ECOMMERCE PARTIAL PAYMENT')
        ->get();

        // dd($weekStrtDate, $weekEndDate);

        $dailyReport = payment::whereBetween('created_at', [$weekStrtDate." 00:00:00", $weekEndDate." 23:59:59"])
        ->where('type_of_payment','=','ECOMMERCE PARTIAL PAYMENT')
        ->get();

        $pdf = PDF::loadView('myPDF', compact('title', 'image', 'date', 'address', 'contactNumber', 'refNumber', 'dailyReport','totalAmount','Reports', 'DateToday'));

        return $pdf->download('WeeklyReport.pdf');
    }

    public function  ecommercemohtly()
    {
        $date =  date('Y-m-d');
        $month =  date('Y-m');
        $Reports = 'Monthly';
        $image = base64_encode(file_get_contents(public_path('img/HomePageImg/Dressaholic_logo.png')));
        $title = 'Dressaholicph';
        $address = 'Dona Isidora St. Don Antonio Quezon City';
        $contactNumber = '+63 995 270 6395';
        $refNumber = Str::random(30);
        $now = Carbon::now();
        $dailyReport = payment::where('created_at','LIKE', $month.'%')
        ->where('type_of_payment','=','ECOMMERCE PARTIAL PAYMENT')
        ->get();

        $DateToday = $now->toFormattedDateString(); 

        $totalAmount = DB::table('payments')
        ->select(DB::raw('SUM(amount) as TotalSales'))
        ->where('type_of_payment','=','ECOMMERCE PARTIAL PAYMENT')
        ->get();


        $pdf = PDF::loadView('myPDF', compact('title', 'image', 'date', 'address', 'contactNumber', 'refNumber', 'dailyReport','totalAmount','Reports','DateToday'));

        return $pdf->download('MonthlyReport.pdf');
    }
}
