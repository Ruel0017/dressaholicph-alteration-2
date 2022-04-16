@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title', 'Payment History')

@section('content')


<div class="card">
        <div class="card-header">
            <h3 class="card-title">Product</h3>
        </div>
        <div class="card-body">
            <div class="d-flex flex-row-reverse">
            @foreach ($totalAmount as $totalAmounts)
               <span>Total Sales ₱ {{$totalAmounts->TotalSales}}</span>
               @endforeach  
            </div>
            <br>

            <table id="example" class="table table-bordered table-striped">
                <thead>
                    <tr>
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
                    @foreach ($payment as $payments)
                        <tr>   
                            <td>{{ $payments->appointment_id }}</td>
                            <td>{{ $payments->type_of_payment }}</td>
                            <td>{{ $payments->accountname }}</td>
                            <td>{{ $payments->accountnumber }}</td>
                            <td>{{ $payments->reference_number }}</td>
                            <td> ₱{{ $payments->amount }}</td>
                            <td>{{ $payments->created_at }}</td>
                    @endforeach
                  
                   
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


@endsection
