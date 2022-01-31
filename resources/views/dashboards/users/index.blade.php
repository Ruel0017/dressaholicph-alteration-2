@extends('dashboards.users.layouts.user-dash-layout')
@section('title', 'Dashboard')

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">List of Appointment</h3>
        </div>
        <div class="card-body">
            @if (Session::get('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if (Session::get('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif
            <table id="listOfappointment" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Status</th>
                        <th scope="col">Clothes</th>
                        <th scope="col">Repair</th>
                        <th scope="col">Appointment Date and Time</th>
                        <th scope="col">Total Amount</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
                        <tr>
                            <th class="ids">{{ $appointment->id }}</th>
                            <td>{{ $appointment->statusName->status }}</td>
                            <td>{{ $appointment->clothes->clothesName }}</td>
                            <td>{{ $appointment->repair->repairName }}</td>
                            <td>{{ $appointment->appointment_date }}</td>
                            <td class="amount">{{ $appointment->totalAmount }}</td>
                            @if ($appointment->status == 3)
                                <td>
                                    <button type="button" class="btn btn-block btn-primary btn-sm statusEdit"
                                        data-toggle="modal" data-idUpdate="''" data-target="#userUpdate">Pay Now!</button>
                                </td>
                            @else
                                <td>

                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
