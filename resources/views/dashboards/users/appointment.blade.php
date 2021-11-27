@extends('dashboards.users.layouts.user-dash-layout')
@section('title', 'Appointment')

@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Appointment</h3>
        </div>

        <div class="callout callout-danger">
            <h5> Disclaimer : </h5>
            <p>need mo muna mag bayad ng 50% once na na approve ni admin
                ang schedule.</p>
        </div>


        <p class="mt-3 mb-1 col-md-12 ">Pili ka lods kung ano gussto mo</p>
        <div class="btn-group btn-group-toggle col-md-12" data-toggle="buttons">
            <label class="btn bg-olive active">
                <input type="radio" name="options" id="option_b1" autocomplete="off" onclick="hideFabric()" checked>
                Repair
            </label>
            <label class="btn bg-olive">
                <input type="radio" name="options" id="option_b2" autocomplete="off" onclick="hideRepair()"> Custom Made
            </label>
        </div>


        <form method="POST" action="{{ route('user.CreateAppointment') }}">
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
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label for="date">Date</label>
                            <input class="date form-control text-right" type="text" id='date'>
                            <span class="fa fa-calendar calendarspan"></span>
                        </div>

                        <div class="col-6">
                            <label for="time">Time</label>
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

                    <input class="col-6" type="text" name="appointment_date" hidden>
                    <span class="text-danger">@error('appointment_date'){{ $message }}@enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="repair">Types of Dress/Clothes</label>
                        <select class="form-control clothes" name="clothes" id="clothes">
                            <option selected value="">Please Select Dress/Clothes</option>
                            @foreach ($clothe as $clothes)
                                <option value="{{ $clothes->id }}">{{ $clothes->clothesName }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">@error('clothes'){{ $message }}@enderror</span>

                        </div>

                        <div class="form-group" id='repair'>
                            <label for="repair">Types of Repair</label>
                            <select class="form-control" name="repair" disabled>
                                <option selected value="">Please Select Types of Repair</option>
                            </select>

                            <span class="text-danger">@error('repair'){{ $message }}@enderror</span>

                            </div>

                            <div class="form-group" id='fabric'>
                                <label for="repair" id='fab'>Types of Fabric</label>
                                <select class="form-control" name="fabric" disabled>
                                    <option selected value="">Please Select Types of Fabric</option>
                                    @foreach ($fabric as $fabrics)
                                        <option value="{{ $fabrics->id }}">{{ $fabrics->fabricName }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">@error('fabric'){{ $message }}@enderror</span>

                                </div>

                                <div class="form-group">
                                    <label for="amount">Total Amount</label>
                                    <span></span>
                                    <input class="form-control" type="text" name="amount" id="amount" value="" readonly>
                                </div>

                                {{-- <input class="form-control" type="text" name="" value="{{$repairPrice}}" readonly> --}}
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>

                    <script type="text/javascript">
                        //Date picker
                        var date = new Date();
                        date.setDate(date.getDate());

                        let input = $('[name = "date"],[name = "time"]')
                        let appointmentDate = $("input[name='date']");
                        let appointmentTime = $('[name = "time"]');
                        let appointmentDateTime = $('[name = "appointment_date"]');

                        $('.date').datepicker({
                            startDate: date,
                            format: 'yyyy-mm-dd',
                        });

                        input.change(function() {
                            appointmentDateTime.val($('.date').val() + ' ' + appointmentTime.val());
                        })

                        $(document).ready(function() {
                            $('#clothes').on('change', function() {
                                var clothesID = $(this).val();
                                if (clothesID) {
                                    $.ajax({
                                        url: 'user/getPrice/' + clothesID,
                                        type: "GET",
                                        dataType: "json",
                                        success: function(data) {
                                            if (data) {
                                                console.log(data);
                                                $('#repair').empty();
                                                $('#repair').append('<option hidden>Types of Repair</option>');
                                                $('#repair').disabe
                                                $.each(data, function(key, repairPriceDB) {
                                                    $('select[name="repair"]').prop('disabled', false)
                                                        .append(
                                                            '<option value="' + repairPriceDB.id +
                                                            '">' +
                                                            repairPriceDB.repairName + '</option>');
                                                });
                                            } else {
                                                console.log('error to tanga')
                                                $('#repair').empty();
                                            }
                                        }
                                    });
                                } else {
                                    $('#repair').empty();
                                }
                            });
                        });

                        $(document).ready(function() {
                            var a = [];
                            $('#repair').on('change', function() {
                                var repairID = $(this).val();
                                if (repairID) {
                                    $.ajax({
                                        url: 'user/getAmount/' + repairID,
                                        type: "GET",
                                        dataType: "json",
                                        success: function(data) {
                                            if (data) {
                                                $('#amount').empty();
                                                $.each(data, function(repairAmount) {
                                                    for (i in data) {
                                                        a.push(data[i].amount);
                                                    }
                                                    // console.log(a[0]);
                                                    $('input[name=amount]').val(a[0]);
                                                });
                                            } else {
                                                console.log('error to tanga')
                                                $('#repair').empty();
                                            }
                                        }
                                    });
                                } else {
                                    $('#repair').empty();
                                }
                            });
                        });

                        function hideFabric() {
                            var x = document.getElementById("fabric");
                            var y = document.getElementById('repair')

                            if (x.style.display === "none") {
                                x.style.display = "block";
                                y.style.display = "none"
                            } else {
                                x.style.display = "none";
                                y.style.display = "block"
                            }
                        }

                        function hideRepair() {
                            var x = document.getElementById("repair");
                            var y = document.getElementById('fabric')

                            if (x.style.display === "none") {
                                x.style.display = "block";
                                y.style.display = "none"
                            } else {
                                x.style.display = "none";
                                y.style.display = "block"
                            }

                        }
                    </script>
                @endsection
