<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>E-Moku</title>

        <!-- Bootstrap core CSS-->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <!-- Page level plugin CSS-->
        <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="vendor/css/sb-admin.css" rel="stylesheet">
        
    </head>
    <body id="page-top" class="">  
       
        <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
            <a class="navbar-brand" href="index">
                <img src="vendor/img/smk.png" width="40" height="40" alt="" loading="lazy">
            </a>

            <a class="navbar-brand mr-1" href="index"><h3>E-Moku</h3></a>

            <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
                <i class="fas fa-bars"></i>
            </button>
        </nav>

        <div id="wrapper">
            
                @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            <a href="{{ url('/') }}">Home</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif


            <!-- Sidebar -->
            <ul class="sidebar navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="kelas">
                    <i class="fas fa-fw fa-plus-square"></i>
                    <span>Input Kehadiran</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="hasil">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Hasil Monitoring</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="home">
                    <i class="fas fa-fw fa-door-open"></i>
                    <span>Logout</span></a>
                </li>
            </ul>

            <div id="content-wrapper">
            <div class="row">

                @yield("content")
                               
            
                @yield("footer")
              <!-- Sticky Footer -->
             <footer class="sticky-footer">
                    <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright © E-Moku 2020</span>
                    </div>
                    </div>
                </footer>
                

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
            </a>

        </div>
            <!-- /.content-wrapper -->

             

    </div>
        <!-- /#wrapper -->



<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Yakin untuk Logout</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="modal-body">Yakin untuk Logout</div>
    <div class="modal-footer">
      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
      <a class="btn btn-primary" href="login.html">Logout</a>
    </div>
  </div>
</div>
</div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="vendor/js/sb-admin.min.js"></script>

    </body>
</html>
