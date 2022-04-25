<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\appointment;
use App\Models\clothe;
use App\Models\fabric;
use App\Models\repair;
use App\Models\repair_price;
use App\Models\payment;
use App\Models\User;
use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Support\Str;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

        $repair = repair::all();
        $clothe = clothe::all();
        $fabric = fabric::all();

        $input = $request->input('clothesID');


        return view('dashboards.users.appointment', compact('repair', 'clothe', 'fabric'));
    }

    public function listOfAppointment()
    {
        $UsersAuth = auth()->user()->id;
        $appointments = appointment::where('user_id', $UsersAuth)
            ->get();

        return view('dashboards.users.listofappointment', compact('appointments'));
    }

    public function getPrice_FABRIC($id)
    {

        $repair = repair_price::where('clothes_id', $id)
            ->where('repair_id','10')
            ->leftJoin('repairs', '.repair_id', '=', 'repairs.id')
            ->leftJoin('fabrics', '.fabric_id',  '=', 'fabrics.id')
            ->select('fabricName', 'fabrics.id')
            ->get();


        return response()->json($repair);
    }

    public function getPrice($id)
    {

        $repair = repair_price::where('clothes_id', $id)
            ->leftJoin('repairs', '.repair_id', '=', 'repairs.id')
            ->select('repairName', 'amount', 'repairs.id'   )
            ->get();


        return response()->json($repair);
    }

    public function getAmount($ids)
    {

        // $getClothesID = new getPrice();
        $str_arr = explode(",", $ids);

        $repairAmount = repair_price::where('repair_id', $str_arr[0])
            ->where('clothes_id', $str_arr[1])
            ->leftJoin('repairs', '.repair_id', '=', 'repairs.id')
            ->select('amount', 'clothes_id')
            ->get();

        // dd($repairAmount);

        return response()->json($repairAmount);
    }

    public function getAmount_Fabric($ids)
    {
        
        // $getClothesID = new getPrice();
        $str_arr = explode (",", $ids); 

        $repairAmount = repair_price::where('repair_id', '10')
            ->where('clothes_id',$str_arr[0])
            ->where('fabric_id',$str_arr[1])
            ->leftJoin('repairs', '.repair_id', '=', 'repairs.id')
            ->select('amount', 'clothes_id')
            ->get();

            // dd($repairAmount);

         return response()->json($repairAmount);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $appointmentDate = $request->input('appointment_date');
        $CountAppointment = appointment::where('appointment_date',  $appointmentDate)
            ->count();
        //Parameters 
        $UsersAuth = auth()->user()->id;
        $this->validate($request, [
            'appointment_date' => 'required',
            'clothes' => 'required',
            'amount' => 'required',
        ]);

        $appointment = new appointment;
        $appointment->user_id = $UsersAuth;
        $appointment->appointment_date = $appointmentDate;
        $appointment->clothes_id = $request->input('clothes');
        $appointment->repair_id = $request->input('repair');
        $appointment->fabric_id = $request->input('fabric');
        $appointment->totalAmount = $request->input('amount');
 

        if ($CountAppointment <= 3) {
            $appointment->save();
            return redirect()->back()->with('success', 'Appointment submitted! Please wait for your approval');
        } else {
            return redirect()->back()->with('error', 'Selected date and time is not available');
        }
    }

    public function CreateAppFabric(Request $request)
    {
        $appointmentDate = $request->input('appointment_date_fabric');
        
        $CountAppointment = appointment::where('appointment_date',  $appointmentDate)
            ->count();
        //Parameters 
        $UsersAuth = auth()->user()->id;
        //$this->validate($request, [
        //    'appointment_date' => 'required',
         //   'clothes' => 'required',
        //    'amount' => 'required',
        //]);

      
        $appointment = new appointment;
        $appointment->user_id = $UsersAuth;
        $appointment->appointment_date = $appointmentDate;
        $appointment->clothes_id = $request->input('clothes_Fabric');
        $appointment->repair_id = '10';
        $appointment->fabric_id = $request->input('fabric');
        $appointment->totalAmount = $request->input('amount_fabric');
      
        

        if ($CountAppointment <= 3) {
            $appointment->save();
            return redirect()->back()->with('success', 'Appointment submitted! Please wait for your approval');
        } else {
            return redirect()->back()->with('error', 'Selected date and time is not available');
        }
    }

    public function InsertPartialPayment(Request $request)
    {
        $this->validate($request, [
            'accountname' => 'required',
            'accountnumber' => 'required',
            'amount' => 'required',
        ]);

        $getID = $request->input('ids');
        $getAmount = $request->input('amount');

        $getAdminNumber = User::where('role', 1)
            ->select('mobilenumber')
            ->get();
        $removeFirst = (substr_replace($getAdminNumber, "63", 0, 19));
        $MobileNumberAdmin = (substr_replace($removeFirst, '', -3));

        $getUserID = appointment::where('appointments.id', $getID)
            ->leftJoin('users', '.user_id', '=', 'users.id')
            ->select('fname', 'mname', 'lname')
            ->get();

        //Getting full Name
        $FisrtNameWithChar = (substr_replace($getUserID, '', 0, 11));
        $FirstName = (substr_replace($FisrtNameWithChar, '', -34));
        $MiddleNameWithChar = (substr_replace($getUserID, '', 0, 26));
        $MiddleName = (substr_replace($MiddleNameWithChar, '', -19));
        $LastNameWithChar = (substr_replace($getUserID, '', 0, 41));
        $LastName = (substr_replace($LastNameWithChar, '', -3));
        ///


        $payment = new payment;
        $payment->appointment_id = $getID; //date('YmdHis');
        $payment->amount = $getAmount;
        $payment->type_of_payment = "PARTIAL PAYMENT";
        $payment->accountname = $request->input('accountname');
        $payment->accountnumber = $request->input('accountnumber');
        $payment->reference_number = $request->input('referenceno');
        $payment->save();


        $updateStatus = appointment::find($getID);
        $updateStatus->status = '4';
        $updateStatus->save();
        Nexmo::message()->send([
            'to' =>  $MobileNumberAdmin,
            'from' => '639999999999',
            'text' => 'This is to notify you that Mr./Ms. ' . $FirstName . ' ' . $MiddleName . ' ' . $LastName . ' ' . 'already paid his/her balance amounting of ' . 'PHP ' . $getAmount . ' Reference number ' . $getID
        ]);

        return redirect()->back()->with('success', 'Payment success! Thank you.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function generateReport(){
        $UsersAuth = auth()->user()->id;
        $date =  date('Y-m-d');
        $Reports = 'All transaction';
        $image = base64_encode(file_get_contents(public_path('img/HomePageImg/Dressaholic_logo.png')));
        $title = 'Dressaholicph';
        $address = 'Dona Isidora St. Don Antonio Quezon City';
        $contactNumber = '+63 995 270 6395';
        $refNumber = Str::random(30);

        $dt = Carbon::now(); 
        $DateToday = $dt->toFormattedDateString(); 

        $dailyReport = appointment::where('user_id', $UsersAuth)
        ->get();

        $pdf = PDF::loadView('appointmentPDF', compact('title', 'image', 'date', 'address', 'contactNumber', 
            'refNumber', 'dailyReport','Reports','DateToday'));

        return $pdf->download('ListOfTransaction.pdf');
    }
}
