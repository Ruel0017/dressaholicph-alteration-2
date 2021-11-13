@extends('dashboards.users.layouts.user-dash-layout')
@section('title', 'Appointment')

@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Appointment</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
            <div class="card-body">

                
                <div class="form-group">
                    <label for="repair">Date Today</label>
                    <input class="form-control" type="text" id='dateToday' readonly />
                </div>

                <div class="form-group">
                    <label for="repair">Types of Dress/Clothes</label>
                    <select class="form-control" name="repair">
                        <option selected value="">Please Select Dress/Clothes</option>
                        @foreach ($clothe as $clothes)
                            <option value="{{ $clothes->id }}">{{ $clothes->clothesName }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="repair">Types of Repair</label>
                    <select class="form-control" name="repair">
                        <option selected value="">Please Select Types of Repair</option>
                        @foreach ($repair as $repairs)
                            <option value="{{ $repairs->id }}">{{ $repairs->repairName }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="repair">Types of Fabric</label>
                    <select class="form-control" name="repair">
                        <option selected value="">Please Select Types of Fabric</option>
                        @foreach ($fabric as $fabrics)
                            <option value="{{ $fabrics->id }}">{{ $fabrics->fabricName }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    <script type="text/javascript">
        const today = new Date().toISOString().slice(0, 10)
        document.getElementById('dateToday').value = today;
    </script>
@endsection
