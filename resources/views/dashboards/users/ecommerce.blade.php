
@extends('dashboards.users.layouts.user-dash-layout')
@section('title', 'Appointment')
    
@section('content')
<!--
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.html">Our Very Own Products</a>
    </div>
</nav>

<div class="container">
    <div class="row">
             <p class="btn btn-success btn-sm ml-1">   Shopping Cart  
             <i class="fa fa-shopping-cart"></i> 
             <span class="badge badge-light" id="CountCart"></span> 
            </p>  
      
        <table id="MyProducts" class="table table-bordered table-striped">
                
        </table>
           
        <div class="col">
        <p>Product Catalog</p> 
        <hr>
            <div class="row">
            @foreach ($product as $products)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card">
                        <input type="text" id="ProductID" value="{{ $products->id }}" hidden/>  
                        <img class="card-img-top" src="\product\{{ $products->image }}" alt="Card image cap"  width="500" height="333">
                        <div class="card-body">
                        <input type="text"   id="ProductName" name="ProductName" value="{{ $products->product_name }}"  hidden/>  
                            <h4 class="card-title">  {{ $products->product_name }} </h4>
                            @if ($products->qty > 0)
                            <h4 class="card-title" style="float:right;">In stock: {{ $products->qty }}</h4>
                            @else
                            <h4 class="card-title" style="float:right">Not available</h4>
                            @endif
                            <p class="card-text"></p>
                            <div class="row">
                                <div class="col">
                                    <p class="btn btn-danger btn-block"  >Php {{ $products->product_price }}</p>
                                    <input type="text"   id="ProductPrice" name="ProductPrice" value="{{ $products->product_price }}"  hidden/>  

                                <input type="number"  id="ProductQty" class="form-control" size="4" min="1" max={{ $products->qty }}>
                                @if ($products->qty > 0)
                            </br>
                                <button type="button" class="btn btn-success" id="AddToCart" onclick="myFunction()">
                                Add to cart
                                </button>
                                @endif 
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div> 
        </div>
      

    </div>
</div> 

<script>
function myFunction() {
  var table = document.getElementById("MyProducts");
  var row = table.insertRow(0);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1); 
  var cell3 = row.insertCell(2);  
  var cell4 = row.insertCell(3); 
  var cell5 = row.insertCell(4); 
  var ProductCode = document.getElementById("ProductID").value;  
  var ProductName = document.getElementById("ProductName").value;  
  var Quantity = document.getElementById("ProductQty").value;  
  var TotalAmount  = document.getElementById("ProductPrice").value; 
  cell1.innerHTML = ProductCode;
  cell2.innerHTML = ProductName;
  cell3.innerHTML = Quantity + ' items';
  cell4.innerHTML = TotalAmount * Quantity;
  cell5.innerHTML = " <button type='button' class='btn btn-block btn-danger btn-sm '> Remove </button>"
}
</script>

-->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
   
    <link rel="stylesheet" type="text/css" href="css/ecommerce.css">

<body>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-12 main-section">
            <div class="dropdown">
                <button type="button" class="btn btn-info" data-toggle="dropdown">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                </button>
                <div class="dropdown-menu">
                    <div class="row total-header-section">
                        <div class="col-lg-6 col-sm-6 col-6">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                        </div>
                        @php $total = 0 @endphp
                        @foreach((array) session('cart') as $id => $details)
                            @php $total += $details['product_price'] * $details['quantity'] @endphp
                        @endforeach
                        <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                            <p>Total: <span class="text-info">₱ {{ $total }}</span></p>
                        </div>
                    </div>
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            <div class="row cart-detail">
                                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                    <img src="\product\{{ $details['image']}}" /> 
                                </div>
                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                    <p>{{ $details['product_name'] }}</p>
                                    <span class="price text-info"> ₱{{ $details['product_price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                            <a href="{{ route('cart') }}" class="btn btn-primary btn-block">View all</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  
  
<br/>
<div class="container">
  
    @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
    @endif
  
</div>

<div class="row">
     
    @foreach($product as $products)
        <div class="col-xs-18 col-sm-6 col-md-3">
            <div class="thumbnail">
            <img src="\product\{{ $products->image }}" alt="IMG to tanga"  style="width:200;height:200px;" class="mx-auto">
                <div class="caption">
                    <h4>{{ $products->product_name }}</h4> 
                    <p><strong>Price: </strong> {{ $products->product_price }}</p>
                    <p class="btn-holder"><a href="{{ route('add.to.cart', $products->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection

