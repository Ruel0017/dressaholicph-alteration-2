@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title', 'List Of Appointment')

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Appointment Reports</h3>
        </div>
        <div class="card-body">
                    <p>Reports</p>
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active" href="#Daily" data-toggle="tab">Daily</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#Weekly" data-toggle="tab">Weekly</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#Monthly" data-toggle="tab">Monthly</a>
                        </li>
                    </ul>

            <div class="tab-content">
                <div class="active tab-pane" id="Daily" style="">
                    <label for="Daily">Daily Report</label>
                        <form method="GET" action="{{ route('admin.daily') }}">
                            <button type="submit" class="btn btn-primary" id="btnCheck">Generate Daily Report</button>
                        </form>
                </div>
                <div class="tab-pane" id="Weekly">  
                    <div class="form-group">
                        <label for="mname">Weekly Report</label>
                        <form method="GET" action="{{ route('admin.weekly') }}">
                            <button type="submit" class="btn btn-primary" id="btnCheck">Generate Weekly Report</button>
                        </form>
                    </div>
                </div>
                <div class="tab-pane" id="Monthly">  
                    <label for="mname">Monhtly Report</label>
                        <form method="GET" action="{{ route('admin.mohtly') }}">
                            <button type="submit" class="btn btn-primary" id="btnCheck">Generate Monthly Report</button>
                        </form>
                </div>
            </div>

        </div>
    </div>
    <div class="card-body">
                    <p>Ecommerce Reports</p>
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active" href="#EDaily" data-toggle="tab">Daily</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#EWeekly" data-toggle="tab">Weekly</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#EMonthly" data-toggle="tab">Monthly</a>
                        </li>
                    </ul>

            <div class="tab-content">
                <div class="active tab-pane" id="EDaily" style="">
                    <label for="Daily">Daily Report</label>
                        <form method="GET" action="{{ route('admin.ecommercedaily') }}">
                            <button type="submit" class="btn btn-primary" id="btnCheck">Generate Daily Report</button>
                        </form>
                </div>
                <div class="tab-pane" id="EWeekly">  
                    <div class="form-group">
                        <label for="mname">Weekly Report</label>
                        <form method="GET" action="{{ route('admin.ecommerceweekly') }}">
                            <button type="submit" class="btn btn-primary" id="btnCheck">Generate Weekly Report</button>
                        </form>
                    </div>
                </div>
                <div class="tab-pane" id="EMonthly">  
                    <label for="mname">Monhtly Report</label>
                        <form method="GET" action="{{ route('admin.ecommercemohtly') }}">
                            <button type="submit" class="btn btn-primary" id="btnCheck">Generate Monthly Report</button>
                        </form>
                </div>
            </div>

        </div>
    </div>
</div>



@endsection
