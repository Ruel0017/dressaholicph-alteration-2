@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title', 'Admin-Assign')

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
            <table id="example" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">Reference Number</th>
                        <th scope="col">Status</th>
                        <th scope="col">Name</th>
                        <th scope="col">Clothes</th>
                        <th scope="col">Repair</th>
                        <th scope="col">Appointment Date and Time</th>
                        <th scope="col">Total Amount</th>
                        <th scope="col">Action</th>
                        <th scope="col" hidden>Mobile Number</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointment as $appointments)
                        <tr>
                            <td class="ids text-center">{{ $appointments->id }}</td>
                            <td>{{ $appointments->statusName->status }}</td>
                            <td>{{ $appointments->users->fname . ' ' . $appointments->users->lname }}</td>
                            <td>{{ $appointments->clothes->clothesName }}</td>
                            <td>{{ $appointments->repair->repairName }}</td>
                            <td>{{ $appointments->appointment_date }}</td>
                            <td>{{ $appointments->totalAmount }}</td>
                            @if ($appointments->status == 4)
                                <td>
                                    <button type="button" class="btn btn-block btn-primary btn-sm assignEmp"
                                        data-toggle="modal" data-idUpdate="''" data-target="#userUpdate">Perform
                                        Action</button>
                                </td>
                            @else
                                <td>
                                    <button type="submit" class="btn btn-block btn-danger btn-sm disabled" disabled
                                        data-toggle="modal" data-target="#modal-lg">Already Assigned</button>
                                </td>
                            @endif
                            <td class="number text-center" hidden>{{ $appointments->users->mobilenumber }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    <!-- Modal Update-->
    <div class="modal fade" id="userUpdate" tabindex="-1" role="dialog" style="z-index: 1050; display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header text-write">
                    <h4 class="modal-title">List of Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="ti-close"></i></span>
                    </button>
                </div>
                <form action="" method="POST" id="assignUpdate">
                    {{ csrf_field() }}
                    <input type="text" hidden class="col-sm-9 form-control" id="idUpdate" name="idUpdate" value="" />
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-sm-9">
                                <input type="text" id="e_ids" name="ids" class="form-control" hidden />
                                <input type="text" id="e_number" name="number" class="form-control" hidden />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Employee Name</label>
                            <div class="col-sm-9">
                                <input type="text" id="e_status" name="status" class="form-control" value="" hidden />
                                <select class="form-control text-left" id="e_emp_id" name="emp_id">
                                    @foreach ($employee as $employees)
                                        <option value={{ $employees->id }}>{{ $employees->fullname }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
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
