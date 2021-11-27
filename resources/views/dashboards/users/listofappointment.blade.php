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
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->statusName->status }}</td>
                            <td>{{ $appointment->clothes->clothesName }}</td>
                            <td>{{ $appointment->repair->repairName }}</td>
                            <td>{{ $appointment->appointment_date }}</td>
                            <td>{{ $appointment->totalAmount }}</td>
                            @if ($appointment->status == 3)
                                <td><button type="button" class="btn btn-block btn-primary btn-sm" data-toggle="modal"
                                        data-target="#modal-lg">Pay Now!</button></td>
                            @else
                                <td><button type="button" class="btn btn-block btn-primary btn-sm disabled" disabled>Pay
                                        Now!</button>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    {{-- MODAL SECTION --}}
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Payment</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="modal-body">
                        <div class="callout callout-danger">
                            <h5> Disclaimer : </h5>
                            <p>need mo muna mag bayad ng 50% once na na approve ni admin
                                ang schedule.</p>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="listOfPayment">Select your merchant</label>
                                <select class="form-control text-left" name="time">
                                    <option selected value="">Please Select Your Payment</option>
                                    <option value="1">BDO</option>
                                    <option value="2">PAYMAYA</option>
                                    <option value="3">GCASH</option>
                                    <option value="4">RCBC</option>
                                    <option value="5">EAST WEST BANK</option>
                                    <option value="6">LANDBANK</option>
                                    <option value="7">BPI</option>
                                    <option value="8">METROBANK</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="amount">Amount to pay</label>
                                <input type="text" class="form-control" value="100" name="amount" readonly>
                            </div>
                            <div class="form-group">
                                <label for="amount">Bank Account</label>
                                <input type="text" class="form-control" name="bankAccount" placeholder="Bank Account">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                            </button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- END MODAL SECTION --}}

@endsection
