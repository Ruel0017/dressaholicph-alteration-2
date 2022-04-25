@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title', 'Walk - In')


@section('content')

<div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Walkin Application</h3>
      </div>

      <div class="card-body"> 
          @if (Session::get('success'))
          <div class="alert alert-success">
              {{ Session::get('success') }}
          </div> @endif @if (Session::get('error')) 
          
          <div class="alert alert-danger">
            {{ Session::get('error') }} 
          </div> @endif 
      </div>

      <form method="POST" action="{{ route('admin.walkinStore') }}">

      <div class="card-body"> 
          @csrf 
          <div class="row">
            <div class="col-4">
              <div class="form-group">
                <label for="fname">First Name</label>
                <input id="fname" type="text" class="form-control" name="fname" required placeholder="First Name">
                <span class="text-danger">@error('fname'){{ $message }}@enderror</span>
              </div>
            </div>

            <div class="col-4">
              <div class="form-group">
                <label for="mname">Middle Name</label>
                <input id="mname" type="text" class="form-control" name="mname" autofocus placeholder="Middle Name">
              </div>
            </div>

            <div class="col-4">
              <div class="form-group">
                <label for="lname">Last Name</label>
                <input id="lname" type="text" class="form-control" name="lname" required autofocus placeholder="Last Name">
                <span class="text-danger">@error('lname'){{ $message }}@enderror</span>
              </div>
            </div> 
          </div>

          <div class="row">

            <div class="col-4">
              <div class="form-group">
                <label for="sex">Sex</label>
                <select class="form-control" name="sex" id="gender"> 
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  </option>
                </select>
              </div>
            </div>

            <div class="col-4">
              <span class="text-danger">@error('sex'){{ $message }}@enderror</span>
              <div class="form-group">
                <label for="mobilenumber">Mobile Number</label>
                <input id="mobilenumber" id="mobileno" type="text" minlength="11" maxlength="11" class="form-control" name="mobilenumber" required autofocus placeholder="Mobile Number">
                <span class="text-danger">@error('mobilenumber'){{ $message }}@enderror</span>
              </div>
            </div>
            <!-- </form> -->
          </div>

          <div class="form-group">
            <div class="row">

              <div class="col-6">
                <label for="date">Date</label>
                <input class="date form-control text-right" type="text" id='date' name='date'
                    required>
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
                  <input class="col-6" type="text" name="appointment_date" hidden>

            </div>
            </div>

            <div class="form-group ">
                <label>Employee Name</label>
                    <select class="form-control text-left"  name="emp_id">
                        @foreach ($employee as $employees)
                            <option value={{ $employees->id }}>{{ $employees->fullname }}</option>
                        @endforeach
                    </select>
            </div>
      </div> 
                <div class="card-body p-3">
                <p>Choose your type of repair</p>
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active" href="#Repair" data-toggle="tab">Repair</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#CustomMade" data-toggle="tab">Custom Made</a>
                    </li>
                </ul>
                </div>  
 
            <div class="card-body">
            <div class="tab-content">
              <div class="active tab-pane" id="Repair" style="">
              <!-- <form method="POST" action="{{ route('admin.walkin') }}"> -->
              <!-- @csrf  --> 

            <div class="form-group">
            <label for="repair">Types of Dress/Clothes</label>
                                    <select class="form-control clothes" name="clothes" id="clothes">
                                        <option selected value="">Please Select Dress/Clothes</option>
                                        @foreach ($clothe as $clothes) <option value="{{ $clothes->id }}">{{ $clothes->clothesName }}</option> @endforeach
                                    </select>
            </div>

                                      <div class="form-group">
                                        <label for="repair">Types of Repair</label>
                                        <select class="form-control" name="repair" id='repair' disabled>
                                            <option selected value="">Please Select Types of Repair</option>
                                        </select>
                                        <span class="text-danger">@error('repair'){{ $message }}@enderror</span>
                                      </div>
                                      
                                        <div class="form-group">
                                            <label for="amount">Total Amount</label>
                                            <span></span>
                                            <input class="form-control" type="text" name="amount" id="amount" value="" readonly>
                                        </div>
                                        <!-- {{-- <input class="form-control" type="text" name="" value="{{$repairPrice}}" readonly> --}}  -->
                                        
                                            <!-- <button type="submit" class="btn btn-primary" id="btnCheck">Submit</button>  -->


              <!-- </form> -->
              </div>  

              <div class="tab-pane" id="CustomMade">
              <!-- <form method="POST" action="{{ route('admin.walkin') }}"> -->
                                    <!-- @csrf -->
                                    <div class="form-group">
                                        <div class="row">
                                            <!-- <div class="col-6">
                                                <label for="date">Date</label>
                                                <input class="date form-control text-right" type="text" name="date_fabric"
                                                    id="date_fabric" required>
                                                <span class="fa fa-calendar calendarspan"></span>
                                            </div> -->
                                            <!-- <div class="col-6">
                                                <label for="time">Time</label>
                                                <select class="form-control text-left" name="time_fabric">
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
                                            </div> -->
                                            <!-- <input class="col-6" type="text" name="appointment_date_fabric" hidden> -->
                                            <!-- <span class="text-danger">@error('appointment_date'){{ $message }}@enderror</span> -->
                                            </div>

                                            <div class="form-group">
                                                <label for="repair">Types of Dress/Clothes</label>
                                                <select class="form-control clothes" name="clothes_Fabric" id="clothes_Fabric" >
                                                    <option selected value="">Please Select Dress/Clothes</option>
                                                    <option value="1">Barong</option>
                                                    <option value="2">Blouse</option>
                                                    <option value="3">Dress</option>
                                                    <option value="4">Gown</option>
                                                    <option value="7">Polo</option>
                                                    <option value="12">Slacks</option>
                                                    <option value="11">Uniform</option>
                                                    <option value="13">Costume</option>
                                                    <!-- @foreach ($clothe as $clothes)
                                                                                                            <option value="{{ $clothes->id }}">{{ $clothes->clothesName }}</option>
                                                                                                            @endforeach -->
                                                </select>
                                                <!-- <span class="text-danger">@error('clothes'){{ $message }}@enderror</span> -->
                                                </div>
                                                <div class="form-group">
                                                    <label for="repair" id='fab'>Types of Fabric</label>
                                                    <select class="form-control" name="fabric" id="fabric" disabled>
                                                        <option selected value="">Please Select Types of Fabric</option>
                                                        @foreach ($fabric as $fabrics) <option value="{{ $fabrics->id }}">{{ $fabrics->fabricName }}</option> @endforeach
                                                    </select>
                                                    <span class="text-danger">@error('fabric'){{ $message }}@enderror</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="amount">Total Amount</label>
                                                        <span></span>
                                                        <input class="form-control" type="text" name="amount_fabric" id="amount_fabric" value=""
                                                            readonly> 
                                                    </div> 
                                                       <!-- {{-- <input class="form-control" type="text" name="" value="{{$repairPrice}}" readonly> --}}  -->
            </div>
            </div>
            </div>
            </form>
            <button type="submit" class="btn btn-primary" id="btnCheck">Submit</button>
            </div>
           
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
                                    appointmentDateTime.val(appointmentDate.val() + ' ' + appointmentTime.val());
                                })


                                var date_fabric = new Date();
                                date_fabric.setDate(date_fabric.getDate());

                                let input_fabric = $('[name = "date_fabric"],[name = "time_fabric"]')
                                let appointmentDate_fabric = $("input[name='date_fabric']");
                                let time_fabric = $('[name = "time_fabric"]');
                                let appointmentDateTime_fabric = $('[name = "appointment_date_fabric"]');

                                $('.date_fabric').datepicker({
                                    startDate: date_fabric,
                                    format: 'yyyy-mm-dd',
                                });
                                //console.log($('.date_fabric'));

                                input_fabric.change(function() {
                                    //appointmentDateTime_fabric.val($('.date_fabric').val() + ' ' + time_fabric.val());
                                    appointmentDateTime_fabric.val(appointmentDate_fabric.val() + ' ' + time_fabric.val());
                                })



                                $(document).ready(function() {
                                    $('#clothes').on('change', function() {
                                        var clothesID = $(this).val(); 
                                    
                                        // $('#clothesIDs').val("clothesID"); 
                                        if (clothesID) {
                                            $.ajax({
                                                url: 'admin/getPrice/' + clothesID,
                                                type: "GET",
                                                dataType: "json",
                                                success: function(data) {
                                                    if (data) {
                                                        //console.log(data);
                                                        $('#repair').empty();
                                                        $('#repair').append('<option hidden>Types of Repair</option>');
                                                        $('#repair').disabled
                                                        $.each(data, function(key, repairPriceDB) {
                                                            $('select[name="repair"]').prop('disabled', false)
                                                                .append(
                                                                    '<option value="' + repairPriceDB.id +
                                                                    '">' +
                                                                    repairPriceDB.repairName + '</option>');
                                                            document.getElementsByName('amount')[0].value = '';
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
                                        var clothesID = $('#clothes').val();
                                        // console.log(clothesID)
                                        // console.log(repairID)
                                        if (repairID) {
                                            $.ajax({
                                                url: 'admin/getAmount/' + repairID + ',' + clothesID,
                                                type: "GET",
                                                dataType: "json",
                                                // data:{clothesID,},
                                                success: function(data) {
                                                    if (data) {
                                                        $('#amount').empty();
                                                        $.each(data, function(repairAmount) {
                                                            var Amount = '';
                                                            for (i in data) {
                                                                a.push(data[i].amount);
                                                                Amount = data[i].amount / 2;
                                                                // {break;}
                                                            }
                                                            // $('input[name=amount]').val();
                                                            // $('input[name=amount]').val()= ;
                                                            // alert(a[0]/2);
                                                            document.getElementsByName('amount')[0].value =
                                                                Amount;
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


                                // START OF FABRIC AJAX

                                $(document).ready(function() { 

                                    $('#clothes_Fabric').on('change', function() {
                                        var clothesID = $(this).val();
                                        // $('#clothesIDs').val("clothesID");
                                        if (clothesID) {
                                            $.ajax({
                                                url: 'admin/getPrice_FABRIC/' + clothesID,
                                                type: "GET",
                                                dataType: "json",
                                                success: function(data) {
                                                    if (data) {
                                                        // console.log(data);
                                                        $('#fabric').empty();
                                                        $('#fabric').append('<option hidden>Types of Fabric</option>');
                                                        $('#fabric').disabled
                                                        $.each(data, function(key, repairPriceDB) {
                                                            $('select[name="fabric"]').prop('disabled', false)
                                                                .append(
                                                                    '<option value="' + repairPriceDB.id +
                                                                    '">' +

                                                                    repairPriceDB.fabricName + '</option>');
                                                            document.getElementsByName('amount_fabric')[0]
                                                                .value = '';
                                                        });
                                                    } else {
                                                        console.log('error to tanga')
                                                        $('#fabric').empty();
                                                    }
                                                }
                                            });
                                        } else {
                                            $('#fabric').empty();
                                        }
                                    });
                                });

                                $(document).ready(function() {
                                    var a = [];
                                    $('#fabric').on('change', function() {
                                        var fabricID = $(this).val();
                                        var clothesID = $('#clothes_Fabric').val();
                                        console.log(fabricID)
                                        console.log(clothesID)
                                        if (fabricID) {
                                            $.ajax({
                                                url: 'admin/getAmount_Fabric/' + clothesID + ',' + fabricID,
                                                type: "GET",
                                                dataType: "json",
                                                // data:{clothesID,},
                                                success: function(data) {
                                                    if (data) {
                                                        $('#amount_fabric').empty();
                                                        $.each(data, function(repairAmount) {
                                                            var Amount = '';
                                                            for (i in data) {
                                                                a.push(data[i].amount);
                                                                Amount = data[i].amount / 2;
                                                                // {break;}
                                                            }
                                                            // $('input[name=amount]').val();
                                                            // $('input[name=amount]').val()= ;
                                                            // alert(a[0]/2);
                                                            document.getElementsByName('amount_fabric')[0]
                                                                .value = Amount;
                                                        });
                                                    } else {
                                                        console.log('error to tanga')
                                                        $('#fabric').empty();
                                                    }
                                                }
                                            });
                                        } else {
                                            $('#fabric').empty();
                                        }
                                    });
                                });



                                //END OF FABRIC AJAX

                function formSubmit() 
                        {
                            if ( $.trim($("#fname").val()) == "" || $.trim($("#mname").val()) == "" || $.trim($("#lname").val()) == "" ) 
                            {
                                alert("Please enter full name.");
                                return false;
                            }

                            if ( $.trim($("#gender").val()) == "" || $.trim($("#mobilenumber").val()) == "" ) 
                            {
                                alert("Please enter Gender and Mobile Number.");
                                return false;
                            }
                            
                            let text = "Are you sure to save this Walk in application?";
                            if (confirm(text) == true) 
                            {
                                
                            } 
                            else 
                            {
                                return false;
                            }
                    }
        

        $('#btnCheck, #btnCheck2').click(formSubmit);    
                            </script>
                        @endsection
