@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title', 'Dashboard')

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Dashbard</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Appointments</h3>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="areaChart"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Small Box (Stat card) -->
            <h5 class="mb-2 mt-4"></h5>
            <div class="row">
                <div class="col-lg-4 col-6">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $CountAppointment ? $CountAppointment : 0 }}</h3>
                            <p>Count of appointments</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <a href="admin/appointmentlist" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small card -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $AppointmentToday ? $AppointmentToday : 0 }}</h3>

                            <p>Appointments Today</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-calendar"></i>
                        </div>
                        <a class="small-box-footer">
                            <i>
                                <br>
                            </i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <!-- small card -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $approvalAppointment ? $approvalAppointment : 0 }}</h3>

                            <p>For Approval</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-thumbs-up"></i>
                        </div>
                        <a href="admin/forapproval" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
            </div>



            <input type="text" value={{ $AppointmentMonth1 ? $AppointmentMonth1 : 0 }} id='1' hidden>
            <input type="text" value={{ $AppointmentMonth2 ? $AppointmentMonth2 : 0 }} id='2' hidden>
            <input type="text" value={{ $AppointmentMonth3 ? $AppointmentMonth3 : 0 }} id='3' hidden>
            <input type="text" value={{ $AppointmentMonth4 ? $AppointmentMonth4 : 0 }} id='4' hidden>
            <input type="text" value={{ $AppointmentMonth5 ? $AppointmentMonth5 : 0 }} id='5' hidden>
            <input type="text" value={{ $AppointmentMonth6 ? $AppointmentMonth6 : 0 }} id='6' hidden>

            <p></p>


        </div>
    </div>
    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="../../plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            const firstValue = $("#1").val();
            const secondValue = $("#2").val();
            const thirdValue = $("#3").val();
            const fourthValue = $("#4").val();
            const fifthValue = $("#5").val();
            const sixthValue = $("#6").val();
            var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

            var areaChartData = {
                labels: ['Febuary', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'Digital Goods',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [firstValue, secondValue, thirdValue, fourthValue, fifthValue, sixthValue]
                }, ]
            }

            var areaChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }]
                }
            }

            // This will get the first returned node in the jQuery collection.
            new Chart(areaChartCanvas, {
                type: 'line',
                data: areaChartData,
                options: areaChartOptions
            })


            new Chart(stackedBarChartCanvas, {
                type: 'bar',
                data: stackedBarChartData,
                options: stackedBarChartOptions
            })
        })
    </script>





@endsection
