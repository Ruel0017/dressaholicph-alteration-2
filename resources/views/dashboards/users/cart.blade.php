
@extends('dashboards.users.layouts.user-dash-layout')
@section('title', 'Ecommerce')
    
@section('content')
@if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
    @endif
<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                @php $total += $details['product_price'] * $details['quantity'] @endphp
                <tr data-id="{{ $id }}">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="\product\{{ $details['image']}}" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['product_name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">₱{{ $details['product_price'] }}</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
                    </td>
                    <td data-th="Subtotal" class="text-center">₱{{ $details['product_price'] * $details['quantity'] }}</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right"><h3><strong>Total ₱{{ $total }}</strong></h3></td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ route('user.ecommerce') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                <button class="btn btn-success"  data-toggle="modal" data-idUpdate="''" data-target="#userUpdate">Checkout</button>
            </td>
        </tr>
    </tfoot>
</table> 

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
                            <p>Hi shopper! This payment is for 50% to make a legitimate transaction to our shop. Other 50% will be your payment balance to make a succesful payment.</p>
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <input type="text" id="e_ids" name="ids" class="form-control" hidden />
                                <input type="text" hidden class="col-sm-9 form-control" id="idUpdate" name="idUpdate"
                                    value="" />


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
                                <img id="imageToSwap" src="" width="70" height="30" hidden />
                            </div>
                            <div class="form-group">
                                <label for="amount">Amount to pay</label>
                                <input type="text" class="form-control" id="e_amount" name="amount" value="₱  {{ $total / 2 }} " readonly>
                                <span class="text-danger">@error('amount'){{ $message }}@enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="accountnumber">Account Number</label>
                                    <input type="text" class="form-control" name="accountnumber" placeholder="" required>
                                    <span class="text-danger">@error('accountnumber'){{ $message }}@enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="accountname">Account Name</label>
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
                {{-- End modal --}}

   
<script type="text/javascript">
  
    $(".update-cart").change(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
  
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });

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
@endsection