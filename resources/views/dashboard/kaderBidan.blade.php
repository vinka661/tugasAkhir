<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DIGITASI KMS || POSYANDU</title>
    <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ url('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/favicon2.ico" />
    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.css" rel="stylesheet">
        <!-- Custom styles for this page -->
        <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Select2 -->
  <link rel="stylesheet" href="{{ url('assets/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ url('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        @php
            $id = str_replace('@gmail.com', '', Auth::user()->email);
        @endphp
        <!-- Sidebar -->
        @include('layout.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layout.header')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                @yield('konten')
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <div class="card-body">
                            <div class="card" style="width: 40rem;">
                                <div class="card  shadow h-100 py-2">
                                    <div class="card-body">
                                        <b><h5 class="card-title"></i>Posyandu Darma Wanita</h5></b>
                                        <p class="card-text"></i>Alamat : Penataan,winongan,kaupaten pasuruan </p>
                                        <p class="card-text"></i>Jam Operasional Posyandu : 08:00-11:00 </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-7 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Data Bayi Balita</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $bayiBalita->count() }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-baby-carriage fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-7 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Data Bayi/Bailta Gizi Baik</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $gizibaik }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-cookie fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-7 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Bayi/Bailta Gizi BGM
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                        {{ $bgm }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-cookie-bite fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Perekmbangan Gizi Bayi Balita</h6>
                                    {{-- <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div> --}}
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        {{-- <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Direct
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Social
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Referral
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('layout.footer')
            <!-- End of Footer -->
        </div>
    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('login') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

     <!-- Bootstrap core JavaScript-->
     <script src="../../vendor/jquery/jquery.min.js"></script>
     <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 
     <!-- Core plugin JavaScript-->
     <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
 
     <!-- Custom scripts for all pages-->
     <script src="../../js/sb-admin-2.min.js"></script>
 
     <!-- Page level plugins -->
     <script src="../../vendor/chart.js/Chart.min.js"></script>
 
     <!-- Page level custom scripts -->
     <script src="../../js/demo/chart-area-demo.js"></script>
     <script src="../../js/demo/chart-pie-demo.js"></script>
 
     <!-- jQuery -->
 <script src="{{ url('assets/plugins/jquery/jquery.min.js') }}"></script>
 <!-- Bootstrap 4 -->
 <script src="{{ url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 <!-- AdminLTE App -->
 <!-- <script src="{{ url('assets/dist/js/adminlte.min.js') }}"></script> -->
 <!-- Select2 -->
 <script src="{{ url('assets/plugins/select2/js/select2.full.min.js') }}"></script>
 <!-- Page script -->
 <script>
   $(function () {
     //Initialize Select2 Elements
     $('.select2').select2()
 
     //Initialize Select2 Elements
     $('.select2bs4').select2({
       theme: 'bootstrap4'
     })
   })
   </script>
     <script>
         function myFunction(){
             var button = document.getElementById("bfinish");
             var button1 = document.getElementById('bupdate');
             var ket = document.getElementById('ket_progres');
             var tgl = document.getElementById('datepicker');
             
                 ket.disabled = true;
                 tgl.disabled = true;
                 button.disabled = true;
                 button1.disabled = true;
         }
             // button1.disabled = true;
             // x.disabled = true;
     </script>
   
      <!-- Page level plugins -->
      <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
     <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>
 
     <!-- Page level custom scripts -->
     <script src="../../js/demo/datatables-demo.js"></script>
 
 
 </body>
 
 </html>