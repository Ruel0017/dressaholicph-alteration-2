<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <base href="{{ \URL::to('/') }}" <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">

    {{-- Date picker --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
        rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ \URL::to('/admin/index') }}" class="brand-link">
                <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Dressaholichph</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="/admin/index"
                            class="d-block">{{ Auth::user()->fname . ' ' . Auth::user()->lname }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-compact nav-child-indent nav-collapse-hide-child nav-flat"
                        data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}"
                                class="nav-link {{ request()->is('admin/dashboard*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.profile') }}"
                                class="nav-link {{ request()->is('admin/profile*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Profile
                                </p>
                            </a>
                        </li> 

                        <li class="nav-item">
                            @if (\Auth::user()->is_guest == 0)
                                <a href="#" class="nav-link ">
                                    <i class="nav-icon fas fa-table"></i>
                                    <p>
                                        Appointment
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                            @else
                                <a href="#" class="nav-link disabled">
                                    <i class="nav-icon fas fa-table"></i>
                                    <p>
                                        Appointment
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                            @endif
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                    <a href="{{ route('admin.appointmentlist') }}"
                                        class="nav-link {{ request()->is('admin/appointmentlist*') ? 'active' : '' }}">
                                        <i class="fa fa-list nav-icon"></i>
                                        <p class="small">List of Appointment</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.forapproval') }}"
                                        class="nav-link {{ request()->is('admin/forapproval*') ? 'active' : '' }}">
                                        <i class="fa fa-thumbs-up nav-icon"></i>
                                        <p class="small">For Approval</p>
                                    </a>
                                </li>    
                                <li class="nav-item">
                                    <a href="{{ route('admin.pendingpage') }}"
                                        class="nav-link {{ request()->is('admin/pendingpage*') ? 'active' : '' }}">
                                        <i class="fa fa-money-bill nav-icon"></i>
                                        <p class="small">Pending Payments</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.assign') }}"
                                        class="nav-link {{ request()->is('admin/assign*') ? 'active' : '' }}">
                                        <i class="fa fa-plus nav-icon"></i>
                                        <p class="small">Assign</p>
                                    </a>
                                </li>
                             
                               
                                <li class="nav-item">
                                    <a href="{{ route('admin.pickupdate') }}"
                                        class="nav-link {{ request()->is('admin/pickupdate*') ? 'active' : '' }}">
                                        <i class="fa fa-calendar nav-icon"></i>
                                        <p class="small">Pickup date and time</p>
                                    </a>
                                </li> 
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-walking"></i>
                                <p>
                                    Walk-In
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                    <a href="{{ route('admin.walkin') }}"
                                        class="nav-link {{ request()->is('admin/walkin*') ? 'active' : '' }}">
                                        <i class="fa fa-list nav-icon"></i>
                                        <p class="small">Registration & Appointment </p>
                                    </a>
                            </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            @if (\Auth::user()->is_guest == 0)
                                <a href="{{ route('admin.indexProduct') }}"
                                    class="nav-link {{ request()->is('admin/indexProduct*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-shopping-cart"></i>
                                    <p>
                                        Add Product
                                    </p>
                                </a>
                            @else
                                <a href="{{ route('admin.indexProduct') }}"
                                    class="nav-link disabled {{ request()->is('admin/indexProduct*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-shopping-cart"></i>
                                    <p>
                                        Add Product
                                    </p>
                                </a>
                            @endif
                        </li>
                        <li class="nav-item">
                            @if (\Auth::user()->is_guest == 0)
                                <a href="{{ route('admin.paymenthistory') }}"
                                    class="nav-link {{ request()->is('admin/paymenthistory*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>
                                        Payment History
                                    </p>
                                </a>
                            @else
                                <a href="{{ route('admin.paymenthistory') }}"
                                    class="nav-link disabled {{ request()->is('admin/paymenthistory*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>
                                        Payment History
                                    </p>
                                </a>
                            @endif
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.settings') }}"
                                class="nav-link {{ request()->is('admin/settings*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Settings
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- Default to the left -->
            <strong>Copyright &copy; 2021 Dressaholichph</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>


    <!--CUSTOM JS CODE-->
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(function() {
            /* UPDATE ADMIN PERSONAL INFO */
            $('#AdminInfoForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    data: new FormData(this),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(document).find('span.error-text').text('');
                    },
                    success: function(data) {
                        console.log(data);
                        if (data.status == 0) {
                            $.each(data.error, function(prefix, val) {
                                $('span.' + prefix + '_error').text(val[0]);
                            });
                        } else {
                            $('.admin_name').each(function() {
                                $(this).html($('#AdminInfoForm').find($(
                                    'input[name="name"]')).val());
                            });
                            alert(data.msg);
                        }
                    }
                });
            });
        });
    </script>

    <script>
        // select edit user
        $(document).on('click', '.statusEdit', function() {
            var _this = $(this).parents('tr');
            let getMobile = _this.find('.email').text()
            let approvedBy = _this.find('.fullname').text()
            $('#idUpdate').val(_this.find('.idUpdate').text());
            $('#e_ids').val(_this.find('.ids').text());
            $('#e_status').val(_this.find('.status').text());
            $('#e_fname').val(approvedBy.trim());
            $('#e_email').val(getMobile.trim().replace('0', '63'));

            console.log(getMobile.trim().replace('0', '63'))

            $('#editStatus').attr('action', '{{ route('admin.statusUpdate') }}');
        });
    </script>

    <script>
        // for assign
        $(document).on('click', '.assignEmp', function() {
            var _this = $(this).parents('tr');
            let getMobile = _this.find('.number').text()
            $('#idUpdate').val(_this.find('.idUpdate').text());
            $('#e_ids').val(_this.find('.ids').text());
            $('#e_number').val(getMobile.trim().replace('0', '63'));

            console.log(getMobile.trim().replace('0', '63'))
            $('#assignUpdate').attr('action', '{{ route('admin.assignUpdate') }}');
        });
    </script>

    <script>
        // update status
        $(document).on('click', '.updateStatus', function() {
            var _this = $(this).parents('tr');
            $('#idUpdate').val(_this.find('.idUpdate').text());
            var test = $('#e_ids1').val(_this.find('.ids1').text());

            $('#updateStatus').attr('action', '{{ route('admin.updateStatus') }}');
        });
    </script>

    <script>
        // update pickupdate
        $(document).on('click', '.updatePickupDate', function() {
            var _this = $(this).parents('tr');
            $('#idUpdate').val(_this.find('.idUpdate').text());
            var test = $('#e_ids').val(_this.find('.ids').text());

            $('#updatePickupDate').attr('action', '{{ route('admin.updatePickupDate') }}');
        });
    </script>

    <script>
        // confirm payment
        $(document).on('click', '.confirmPayments', function() {
            var _this = $(this).parents('tr');
            $('#idUpdate').val(_this.find('.idUpdate').text());
            var test = $('#e_ids2').val(_this.find('.ids2').text());

            $('#confirmPayments').attr('action', '{{ route('admin.updatePaymentStatus') }}');
        });
    </script>

    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
        $(function() {
            $("#example").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>



</body>

</html>
