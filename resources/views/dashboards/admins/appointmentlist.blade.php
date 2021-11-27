@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title', 'List Of Appointment')

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">List of Appointment</h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">Status</th>
                        <th scope="col">Clothes</th>
                        <th scope="col">Repair</th>
                        <th scope="col">Appointment Date and Time</th>
                        <th scope="col">Total Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($appointment as $appointments)
                    <tr> 
                        <td>{{$appointments->users->fname . ' ' . $appointments->users->lname}}</td>
                        <td>{{$appointments->clothes->clothesName}}</td>
                        <td>{{$appointments->repair->repairName}}</td>
                        <td>{{$appointments->appointment_date}}</td>
                        <td>{{$appointments->totalAmount}}</td>  
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>


@endsection
