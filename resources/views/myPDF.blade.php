<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report</title>
</head>

<body>

    {{-- <div class="container" align="center">
        <table width="90%" height="70px">
            <tr>
                <td allign="left">
                    <div class="container-fluid">
                        <img src="data:image/png;base64,{{ $image }}" alt="Logo" width="100"
                            class="logo" style="padding: 5px 15px 5px 5px;" />
                    </div>
                </td>
                <div>
                    <td style="margin-left: 10px;text-align:center;">
                        <div class="container-fluid">
                            <p style="color:black;font-size:20px;">
                                {{ $title }} <br>
                                {{ $address }} <br>
                                {{ $contactNumber }}
                            </p>
                        </div>
                    </td>

            </tr>
        </table>
    </div> --}}


    <div class="container" align="center">
        <div style="margin-left: 10px;text-align:center; display:inline-block;">
            <div class="container-fluid">
                <p style="color:black;font-size:20px;">
                    {{ $title }}
                </p>
                <p style="color:black;font-size:14px;">
                    Address : {{ $address }} <br>
                    Contact number : {{ $contactNumber }}
                </p>
            </div>
        </div>
        <div width="90%" height="70px">
            <div class="container-fluid">
                <img src="data:image/png;base64,{{ $image }}" alt="Logo" width="100" class="logo"
                    style="padding: 5px 15px 5px 5px; display:inline-block;" />
            </div>


        </div>
    </div>
    <br>
    <h2 align="center"><strong>Daily Report</strong></h2>
    <br>
    <div class="container" style="padding-right: 90px;">
        <p style="text-align:right;"><strong>Date:</strong> {{ $date }} </p>
    </div>
    <div class="container" style="padding-left: 70px;">
        <strong>Student Name: </strong> TEST
        <br>
        <strong>Section:</strong> TEST <br>


    </div>
    <br>
    <div class="container" align="center">
        <table width="90%" border="1px 1px 1px 1px">
            <thead>
                <tr align="center">
                    <th scope="col">ID</th>
                    <th scope="col">Status</th>
                    <th scope="col">Clothes</th>
                    <th scope="col">Repair</th>
                    <th scope="col">Appointment Date and Time</th>
                    <th scope="col">Total Amount</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($dailyReport as $dailyReports)
                    <tr align="center">
                        <td>{{ $dailyReports->id }}</td>
                        <td>{{ $dailyReports->statusName->status }}</td>
                        <td>{{ $dailyReports->clothes->clothesName }}</td>
                        <td>{{ $dailyReports->repair->repairName }}</td>
                        <td>{{ $dailyReports->dailyReports_date }}</td>
                        <td>{{ $dailyReports->totalAmount }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
        <p>Reference number : {{ $refNumber }}</p>
    </div>
</body>

</html>
