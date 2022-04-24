@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title', 'Pending Payments')

@section('content')

<div class="card">
        <div class="card-header">
            <h3 class="card-title">Pending</h3>
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
            <table id="example" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col" hidden>Status</th>
                        <th scope="col">Status</th>
                        <th scope="col">Name</th>
                        <th scope="col">Clothes</th>
                        <th scope="col">Repair</th>
                        <th scope="col">Appointment Date and Time</th>
                        <th scope="col">Pickup Date and Time</th>
                        <th scope="col">Reference No</th>
                        <th scope="col">Total Amount</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listOfAppointment as $appointments)
                        <tr>
                            <td hidden class="ids2">{{ $appointments->id }}</td>
                            <td>{{ $appointments->statusName->status }}</td>
                            <td>{{ $appointments->users->fname . ' ' . $appointments->users->lname }}</td>
                            <td>{{ $appointments->clothes->clothesName }} </td>
                            <td>{{ $appointments->repair->repairName }}</td>
                            <td>{{ $appointments->appointment_date }}</td>
                            <td>{{ $appointments->pickup_date ?? 'N/A' }}</td>
                            <td>{{ $appointments->payments->reference_number ?? 'N/A'}}</td>
                            <td>{{ $appointments->totalAmount }}</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-block btn-primary btn-sm confirmPayments"
                                    data-toggle="modal" data-idUpdate="''" data-target="#updatePaymentStatus">Perform
                                    Action</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Update for final step-->
    <!-- <div class="modal fade" id="updatePaymentStatus" tabindex="-1" role="dialog" style="z-index: 1050; display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header text-write">
                    <h4 class="modal-title">Payment</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="ti-close"></i></span>
                    </button>
                </div>
                <form action="" method="POST" id="confirmPayments">
                {{ csrf_field() }}
                    <input type="text" hidden class="col-sm-9 form-control" id="idUpdate" name="idUpdate" value="" />
                    <div class="modal-body">
                        <input type="text" id="e_ids" name="ids" class="form-control" hidden/>
                        <input type="text" name="value" value="8"class="form-control" hidden/>
                        <div class="form-group row">
                            <h3>Confirm this payment?</h3>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="submit" id="" name="" class="btn btn-success  waves-light"><i
                                class="icofont icofont-check-circled"></i>Yes</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                class="icofont icofont-eye-alt"></i>Close</button>
                       
                    </div>
                </form>
            </div>
        </div>
    </div> -->

        <!-- Modal Update for final step-->
        <div class="modal fade" id="updatePaymentStatus" tabindex="-1" role="dialog" style="z-index: 1050; display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header text-write">
                    <h4 class="modal-title">Payment</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="ti-close"></i></span>
                    </button>
                </div>
                <form action="" method="POST" id="confirmPayments">
                    {{ csrf_field() }}
                    <input type="text" hidden class="col-sm-9 form-control" id="idUpdate" name="idUpdate" value="" />
                    <div class="modal-body">
                        <input type="text" id="e_ids2" name="ids2" class="form-control" hidden />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                class="icofont icofont-eye-alt"></i>Close</button>
                        <button type="submit" id="" name="" class="btn btn-success  waves-light"><i
                                class="icofont icofont-check-circled"></i>Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End modal --}} 

@endsection