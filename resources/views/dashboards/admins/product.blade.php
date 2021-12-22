@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title', 'Add Product')

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Product</h3>
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
            <div class="d-flex flex-row-reverse">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Add
                    Products</button>
            </div>
            <br>

            <table id="example" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">Product Code</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Prices</th>
                        <th scope="col">Image</th>
                        {{-- <th scope="col">Action</th> --}}
                    </tr>
                </thead>

                <tbody>
                    @foreach ($product as $products)
                        <tr>
                            <td class="ids text-center">{{ $products->id }}</td>
                            <td>{{ $products->product_name }}</td>
                            <td>{{ $products->qty }}</td>
                            <td>{{ $products->product_price }}</td>
                            <td><img src="\product\{{ $products->image }}" alt="IMG to tanga"
                                    style="width:60px;height:60px;" class="mx-auto"></td>
                            {{-- <td>
                                <button type="button" class="btn btn-block btn-primary btn-sm" disabled>Perform
                                    Action</button>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" style="z-index: 1050; display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header text-write">
                    <h4 class="modal-title">Add Products</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="ti-close"></i></span>
                    </button>
                </div>
                <form action="{{ route('admin.addProduct') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Product Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="productName" class="form-control" value="" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Quantity</label>
                            <div class="col-sm-9">
                                <input type="text" name="quantity" class="form-control" value="" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Price</label>
                            <div class="col-sm-9">
                                <input type="text" name="price" class="form-control" value="" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="file" accept="image/*" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                class="icofont icofont-eye-alt"></i>Close</button>
                        <button type="submit" id="" name="" class="btn btn-success  waves-light"><i
                                class="icofont icofont-check-circled"></i>Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
