@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title', 'Appointment Approval')
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">List of Appointment</h3>
        </div>
        <div class="card-body">
            <table id="example" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th hidden scope=" col">ID</th>
                        <th scope="col">Status</th>
                        <th scope="col">Name</th>
                        <th scope="col">Clothes</th>
                        <th scope="col">Repair</th>
                        <th scope="col">Appointment Date and Time</th>
                        <th scope="col">Total Amount</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointment as $appointments)
                        <tr role="row" class="odd">
                            <td hidden class="ids">{{ $appointments->id }}</td>
                            <td class="status" hidden>{{ $appointments->status }}</td>
                            <td>{{ $appointments->statusName->status }}</td>
                            <td class="fullname">
                                {{ $appointments->users->fname . ' ' . $appointments->users->lname }}
                            </td>
                            <td class="clothesName">{{ $appointments->clothes->clothesName }}</td>
                            <td class="repairName">{{ $appointments->repair->repairName }}</td>
                            <td class="date">{{ $appointments->appointment_date }}</td>
                            <td class="totalAmount">{{ $appointments->totalAmount }}</td>
                            <td hidden class="approved">{{ Auth::user()->fname . ' ' . Auth::user()->lname }}
                            <td hidden class="email">{{ $appointments->users->mobilenumber }}
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-block btn-primary btn-sm statusEdit"
                                    data-toggle="modal" data-idUpdate="''" data-target="#userUpdate">Perform
                                    Action</button>
                            </td>
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
                    <h4 class="modal-title">Update Status</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="ti-close"></i></span>
                    </button>
                </div>
                <form action="" method="GET" id="editStatus">
                    {{ csrf_field() }}
                    <input type="text" hidden class="col-sm-9 form-control" id="idUpdate" name="idUpdate" value="" />
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-sm-9">
                                <input type="text" id="e_ids" name="ids" class="form-control" hidden />
                                <input type="text" id="e_fname" name="name" class="form-control" hidden />
                                <input type="text" id="e_email" name="email" class="form-control" hidden />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <input type="text" id="e_status" name="status" class="form-control" value="" hidden />
                                <select class="form-control text-left" name="status">
                                    <option selected value="">Update Status</option>
                                    <option value="1">Denied</option>
                                    <option value="3">Approved</option>
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
