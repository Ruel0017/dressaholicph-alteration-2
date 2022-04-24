@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title', 'List Of Appointment')

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">List of Walkin Appointments</h3>
        </div>
        <div class="card-body">
            <table id="example" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">Status</th>
                        <th scope="col">Name</th>
                        <th scope="col">Clothes</th>
                        <th scope="col">Repair</th>
                        <th scope="col">Assign</th>
                        <th scope="col">Appointment Date and Time</th>
                        <th scope="col">Pickup Date and Time</th>
                        <th scope="col">Total Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($walkinAppointment as $appointments)
                        <tr>
                            <td>{{ $appointments->statusName->status }}</td>
                            <td>{{ $appointments->walkin_user->fname . ' ' . $appointments->walkin_user->lname }}</td>
                            <td>{{ $appointments->clothes->clothesName }}</td>
                            <td>{{ $appointments->repair->repairName ?? 'N/A' }}</td>
                            <td>{{ $appointments->employees->fullname ?? 'N/A' }}</td>
                            <td>{{ $appointments->appointment_date }}</td>
                            <td>{{ $appointments->pickup_date ? $appointments->pickup_date : 'N/A' }}</td>
                            <td>{{ $appointments->totalAmount }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>


@endsection
