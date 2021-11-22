@extends('dashboards.users.layouts.user-dash-layout')
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
                    @foreach ($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->isActive ? 'Approved' : 'Pending' }}</td>
                            <td>{{ $appointment->clothes->clothesName }}</td>
                            <td>{{ $appointment->repair->repairName }}</td>
                            <td>{{ $appointment->appointment_date }}</td>
                            <td>{{ $appointment->totalAmount }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>


@endsection
