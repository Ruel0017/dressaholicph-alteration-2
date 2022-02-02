@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title', 'Update Pickup date and Time')
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
                        <th scope="col" hidden>Status</th>
                        <th scope="col">Status</th>
                        <th scope="col">Name</th>
                        <th scope="col">Clothes</th>
                        <th scope="col">Repair</th>
                        <th scope="col">Appointment Date and Time</th>
                        <th scope="col">Pickup Date and Time</th>
                        <th scope="col">Total Amount</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listOfAppointment as $appointments)
                        <tr>
                            <td hidden class="ids">{{ $appointments->id }}</td>
                            <td>{{ $appointments->statusName->status }}</td>
                            <td>{{ $appointments->users->fname . ' ' . $appointments->users->lname }}</td>
                            <td>{{ $appointments->clothes->clothesName }}</td>
                            <td>{{ $appointments->repair->repairName }}</td>
                            <td>{{ $appointments->appointment_date }}</td>
                            <td>{{ $appointments->pickup_date ? $appointments->pickup_date : 'N/A' }}</td>
                            <td>{{ $appointments->totalAmount }}</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-block btn-primary btn-sm updatePickupDate"
                                    data-toggle="modal" data-idUpdate="''" data-target="#updatePickupDate1">Perform
                                    Action</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Update for final step-->
    <div class="modal fade" id="updatePickupDate1" tabindex="-1" role="dialog" style="z-index: 1050; display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header text-write">
                    <h4 class="modal-title">Update Pickupdate</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="ti-close"></i></span>
                    </button>
                </div>
                <form action="" method="POST" id="updatePickupDate">
                    {{ csrf_field() }}
                    <input type="text" hidden class="col-sm-9 form-control" id="idUpdate" name="idUpdate" value="" />
                    <div class="modal-body">
                        <input type="text" id="e_ids" name="ids" class="form-control" hidden />
                        <div class="form-group row">
                            <label for="date" class="col-sm-3 col-form-label">Pick-up date</label>
                            <div class="col-sm-9">
                                <input class="date form-control text-right" type="text" id='date' name='date'
                                    autocomplete="off" required>
                                <span class="fa fa-calendar calendarspan"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="time" class="col-sm-3 col-form-label">Time</label>
                            <div class="col-sm-9">
                                <select class="form-control text-left" name="time">
                                    <option selected value="">Please Select Your Time</option>
                                    <option value="8:00 AM">8:00 AM</option>
                                    <option value="9:00 AM">9:00 AM</option>
                                    <option value="10:00 AM">10:00 AM</option>
                                    <option value="11:00 AM">11:00 AM</option>
                                    <option value="1:00 PM">1:00 PM</option>
                                    <option value="2:00 PM">2:00 PM</option>
                                    <option value="3:00 PM">3:00 PM</option>
                                    <option value="4:00 PM">4:00 PM</option>
                                    <option value="5:00 PM">5:00 PM</option>
                                </select>
                            </div>
                        </div>
                        <input class="col-6" type="text" name="pickupdate" hidden>
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
    <script type="text/javascript">
        var date = new Date();
        date.setDate(date.getDate());

        let input = $('[name = "date"],[name = "time"]')
        let appointmentDate = $("input[name='date']");
        let appointmentTime = $('[name = "time"]');
        let pickUpDate = $('[name = "pickupdate"]');

        $('.date').datepicker({
            startDate: date,
            format: 'yyyy-mm-dd',

        });

        input.change(function() {
            pickUpDate.val(appointmentDate.val() + ' ' + appointmentTime.val());
        })
    </script>
@endsection
