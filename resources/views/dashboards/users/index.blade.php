@extends('dashboards.users.layouts.user-dash-layout')
@section('title', 'List Of Appointment')

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
            <form method="GET" action="{{ route('user.generateReport') }}">
                <button type="submit" class="btn btn-primary" id="btnCheck">Generate Report</button>
            </form>
            <table id="listOfappointment" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Status</th>
                        <th scope="col">Clothes</th>
                        <th scope="col">Repair</th>
                        <th scope="col">Appointment Date and Time</th>
                        <th scope="col">Pickup Date and Time</th>
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
                            <td>{{ $appointment->pickup_date ? $appointment->pickup_date : 'N/A' }}</td>
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

    <!-- Modal Update-->
    <div class="modal fade" id="userUpdate" tabindex="-1" role="dialog" style="z-index: 1050; display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Payment</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="" id="editStatus">
                    @csrf
                    <div class="modal-body">
                        <div class="callout callout-danger">
                            <h5> Disclaimer : </h5>
                            <p>You'll need to pay the other 50% to the shop.</p>
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <input type="text" id="e_ids" name="ids" class="form-control" hidden />
                                <input type="text" hidden class="col-sm-9 form-control" id="idUpdate" name="idUpdate"
                                    value="" />

                                <!--
                                <label for="listOfPayment">Channel of Payment</label>

                                <select class="form-control text-left" name="time" id="dlist" onChange="swapImage()"
                                    required>
                                    <option selected value="">Select your channel of Payment</option>
                                    <option
                                        value="['https://upload.wikimedia.org/wikipedia/commons/4/49/BDO_Unibank_%28logo%29.svg', '1']">
                                        BDO</option>
                                    <option
                                        value="['https://upload.wikimedia.org/wikipedia/commons/9/9a/PayMaya_Logo.png', '2']">
                                        PAYMAYA</option>
                                    <option
                                        value="['https://logos-download.com/wp-content/uploads/2020/06/GCash_Logo_text.png', '3']">
                                        GCASH</option>
                                    <option
                                        value="['https://www.businessnewsasia.com/wp-content/uploads/2015/09/rcbc.png', '4']">
                                        RCBC</option>
                                    <option
                                        value="['https://www.asiamiles.com/content/dam/am-content/brand-v2/finance-pillar/logo-image/eastwest/EastWest_logo.png/jcr:content/renditions/cq5dam.resize.390.234.png', '5']">
                                        EAST WEST BANK</option>
                                    <option
                                        value="['https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Landbank.svg/1200px-Landbank.svg.png', '6']">
                                        LANDBANK</option>
                                    <option
                                        value="['https://upload.wikimedia.org/wikipedia/en/thumb/c/c2/Bank_of_the_Philippine_Islands_logo.svg/612px-Bank_of_the_Philippine_Islands_logo.svg.png', '7']">
                                        BPI</option>
                                    <option
                                        value="['https://www.gtcapital.com.ph/storage/uploads/2017/09/59bc94ce59565.png', '8']">
                                        METROBANK</option>
                                </select>
                                <br>
                                -->
                                <img id="imageToSwap" src="https://logos-download.com/wp-content/uploads/2020/06/GCash_Logo_text.png" width="70" height="30" />
                            </div>
                            <div class="form-group">
                                <label for="amount">Amount to pay</label>
                                <input type="text" class="form-control" id="e_amount" name="amount" readonly>
                                <span class="text-danger">@error('amount'){{ $message }}@enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="accountnumber">Account Number</label>
                                    <input type="text" class="form-control" id="accountnumber" name="accountnumber" placeholder="" required>
                                    <span class="text-danger">@error('accountnumber'){{ $message }}@enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="accountname">Account Name</label>
                                        <input type="text" class="form-control" id="accountname" name="accountname" placeholder="" required>
                                        <span class="text-danger">@error('accountname'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label for="referenceno">Reference No</label>
                                    <input type="text" class="form-control" id="referenceno" name="referenceno" placeholder="" required>
                                    <span class="text-danger">@error('referenceno'){{ $message }}@enderror</span>
                            </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                        </button>
                                        <button type="button"  class="btn btn-primary" onclick="submitDetailsForm(1)">Save</button> 
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- End modal --}}

                {{-- MODAL SECTION --}}


                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script type="text/javascript">
                    $('input[name="accountnumber"]').keyup(function(e) {
                        if (/\D/g.test(this.value)) {
                            // Filter non-digits from input value.
                            this.value = this.value.replace(/\D/g, '');
                        }
                    });

                    function submitDetailsForm(e) 
                    { 
                        if ( $.trim($("#accountname").val()) == "" || $.trim($("#accountnumber").val()) == "" || $.trim($("#referenceno").val()) == "" ) 
                            {
                                alert("Please enter all fields.");
                                return false;
                            }
                        else
                        {
                            let text = "NOTE: Please be advise that the store has implemented a NO REFUND policy. Make sure that your REFERENCE NO. is CORRECT.";
                            if (confirm(text) == true) {
                                if(e == 1)
                                { 
                                    $("#editStatus").submit();  
                                } 
                            } 
                            else 
                            {
                                return false;
                            }
                        }
                    }

                </script>


                <script type="text/javascript">
                    function swapImage() {
                        var image = document.getElementById("imageToSwap");
                        var dropd = document.getElementById("dlist");
                        var v = dropd.value;
                        v = v.replace(/^\[\'|\'\]$/g, '').split("', '");
                        image.src = v[0];
                        image.hidden = false;
                        console.log(v[1]);
                    };
                </script>
                {{-- END MODAL SECTION --}}

            @endsection
