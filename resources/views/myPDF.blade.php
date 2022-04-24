<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report</title>
</head>

<body>

<div class="container-fluid" style="position: absolute; top: 0;">
                        <img src="data:image/png;base64,{{ $image }}" alt="Logo" width="100"
                            class="logo" style="padding: 5px 15px 5px 5px;" />
                    </div>  

    <div class="container" align="center"> 
        <div style="margin-left: 10px;text-align:center; display:inline-block;">
            <div class="container-fluid">
                <strong>
            <p style="color:black;font-size:20px;">
                    {{ $title }}
                </p>
                </strong>
            <p style="color:black;font-size:20px;">
            {{$Reports}} Report
            </p>  
            </div>
        </div> 
    </div> 
   
  
    <div class="container" style="padding-left: 70px;">

    </div>
    <br>
    <div class="container" align="center">
    <p style="text-align:right;"><strong>Date printed:</strong> {{ $DateToday }} </p> 
        <table width="90%" border="1px 1px 1px 1px" style="border-collapse: collapse; width: 100%">
            <thead>
                <tr align="center">
                        <th scope="col">Order/Tracking Number</th>
                        <th scope="col">Type of payment</th>
                        <th scope="col">Account Name</th>
                        <th scope="col">Account Number</th>
                        <th scope="col">Reference Number</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Payment Date</th>

                </tr>
            </thead>
            <tbody>
            @foreach ($dailyReport as $payments)
                    <tr align="center">
                        <td>{{ $payments->appointment_id }}</td>
                        <td>{{ $payments->type_of_payment }}</td>
                        <td>{{ $payments->accountname }}</td>
                        <td>{{ $payments->accountnumber }}</td>
                        <td>{{ $payments->reference_number }}</td>
                        <td> ₱{{ $payments->amount }}</td>
                        <td>{{ $payments->created_at }}</td>
                    </tr>
                @endforeach


                <tr align="center">
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td>Total Sales:</td>
                        <td> 
                        @foreach ($totalAmount as $totalAmounts)
                            <span>{{$totalAmounts->TotalSales}}</span>
                        @endforeach  
                        </td>
                    </tr>
                
            </tbody>
        </table>
    </div>
    <div>
        <p>Reference number : {{ $refNumber }}</p>
    </div>

    <div style="position: fixed; left: 0; bottom: 0; width: 100%; text-align: center;">   
    <p style="color:black;font-size:14px;">
                    Address : {{ $address }} <br>
                    Contact number : {{ $contactNumber }}
                </p>
    </div>
</body>

</html>
