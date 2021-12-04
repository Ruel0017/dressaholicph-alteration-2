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
                 <form method="POST"  action="{{ route('user.insertpartialpayment') }}">
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
                    <div class="modal-body">
                        <div class="callout callout-danger">
                            <h5> Disclaimer : </h5>
                            <p>You'll need to pay the other 50% to the shop.</p>
                        </div>
 
                        <div class="form-group">
                            <div class="form-group">
                            
                                <label for="listOfPayment">Channel of Payment</label> 
                                
                                <select class="form-control text-left" name="time" id="dlist" onChange="swapImage()" required>
                                    <option selected value="">Select your channel of Payment</option>
                                    <option value="['https://upload.wikimedia.org/wikipedia/commons/4/49/BDO_Unibank_%28logo%29.svg', '1']">BDO</option>
                                    <option value="['https://upload.wikimedia.org/wikipedia/commons/9/9a/PayMaya_Logo.png', '2']">PAYMAYA</option>
                                    <option value="['https://logos-download.com/wp-content/uploads/2020/06/GCash_Logo_text.png', '3']">GCASH</option>
                                    <option value="['https://www.businessnewsasia.com/wp-content/uploads/2015/09/rcbc.png', '4']">RCBC</option>
                                    <option value="['https://www.asiamiles.com/content/dam/am-content/brand-v2/finance-pillar/logo-image/eastwest/EastWest_logo.png/jcr:content/renditions/cq5dam.resize.390.234.png', '5']">EAST WEST BANK</option>
                                    <option value="['https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Landbank.svg/1200px-Landbank.svg.png', '6']">LANDBANK</option>
                                    <option value="['https://upload.wikimedia.org/wikipedia/en/thumb/c/c2/Bank_of_the_Philippine_Islands_logo.svg/612px-Bank_of_the_Philippine_Islands_logo.svg.png', '7']">BPI</option>
                                    <option value="['https://www.gtcapital.com.ph/storage/uploads/2017/09/59bc94ce59565.png', '8']">METROBANK</option>
                                </select> 
                                <br>
                                <img id="imageToSwap" src="" width="70" height="30" hidden/>
                            </div>
                            <div class="form-group">
                                <label for="amount">Amount to pay</label>
                                <input type="text" class="form-control" value="100" name="amount" readonly>
                                <span class="text-danger">@error('amount'){{ $message }}@enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="amount">Account Number</label>
                                <input type="text" class="form-control" name="accountnumber" placeholder="" required>
                                <span class="text-danger">@error('accountnumber'){{ $message }}@enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="amount">Account Name</label>
                                <input type="text" class="form-control" name="accountname" placeholder="" required>
                                <span class="text-danger">@error('accountname'){{ $message }}@enderror</span>
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

    <script type="text/javascript">
                            function swapImage(){
                                var image = document.getElementById("imageToSwap");
                                var dropd = document.getElementById("dlist");
                                var v = dropd.value;
                                v = v.replace(/^\[\'|\'\]$/g,'').split("', '");
                                image.src = v[0];
                                image.hidden = false;
                                console.log(v[1]);
                            };
                            </script>
    {{-- END MODAL SECTION --}}

@endsection
