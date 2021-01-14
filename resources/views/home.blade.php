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
                    <a class="nav-link" href="home">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Home</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="login">
                    <i class="fas fa-fw fa-door-open"></i>
                    <span>Login</span></a>
                </li>
            </ul>

            <div id="content-wrapper">
            <div class="row">
                <div class="container-fluid">
                    <div class="col">
                    <div class="col">
                    <div class="col">
                    <div class="col">
                             <p class="display-4">E-moku</p>
                             <p class="lead mb-1">Merupakan Aplikasi untuk monitoring kehadiran guru di kelas, E-moku akan secara otomatis menampilkan nilai kehadiran guru setiap bulannya </p>
                    </div>       
                    </div>
                    </div>      
                    </div> 
                    
                    
                    <div class="col">
                    <div class="col">
                    <div class="col">      
                    <div class="col">
                    <br>
                    <br>
                    <h4>Hasil Monitoring Kehadiran</h4>
                        <hr>                    
                        <form action="cbulan" method="GET">
                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <select class="custom-select" id="caribulan" name="caribulan" required>
                                        <option selected disabled value="">Bulan</option>
                                        <option>Januari</option>
                                        <option>Februari</option>
                                        <option>Maret</option>
                                        <option>April</option>
                                        <option>Mei</option>
                                        <option>Juni</option>
                                        <option>Juli</option>
                                        <option>Agustus</option>
                                        <option>September</option>
                                        <option>Oktober</option>
                                        <option>November</option>
                                        <option>Desember</option>
                                    </select>
                                </div>
                            
                                <div class="col-md-3 mb-3">   
                                    <button type="submit" class="btn btn-info">Cari</button> 
                                </div>

                                <div class="table-responsive">
                                <div class="table-responsive">
                                <table class="table table-bordered" class="table align-middle" style="font-size: 85%;">
                                    <thead class="thead-dark">
                                        <thead>
                                    <tr class="table-info align-center">
                                        <th style="text-align:center" >Nama Guru</td>
                                        <th>Tugas</th>
                                        <th>Jam Mengajar</th>
                                        <th>Jam kosong</th>
                                        <th style="text-align:center" >Nilai Kehadiran</th>
                                    </tr>
                                </thead>

                                @foreach ($monitor as $hasil)

                                <?php
                                    $tugas = $hasil->jml_tugas;
                                    $jam = $hasil->jml_jam;
                                    $kosong = $hasil->jml_kosong;
                                    //tugasrendah
                                    if ($tugas <= 5) 
                                        { $tugasrendah = 1; }
                                        elseif ($tugas >= 5 &&  $tugas <=10) 
                                                { $tugasrendah = (10 - $tugas)/(10-5); }
                                                 else { $tugasrendah = 0; }
                                    //tugassedang
                                    if ($tugas >= 5 && $tugas <=10) 
                                        { $tugassedang  = ($tugas - 5) / (10-5);}
                                        elseif ($tugas >= 10 && $tugas <= 15)
                                             { $tugassedang  = (15 - $tugas) / (15-10); }
                                             else { $tugassedang = 0 ; }
                                    //tugastinggi
                                    if($tugas >=10 && $tugas <=15)
                                        { $tugastinggi = ($tugas - 10) / (15-10);}
                                        elseif ($tugas >= 15)
                                            {$tugastinggi=1; }
                                            else {$tugastinggi = 0;}                                                               
                                    //jam rendah
                                    if($jam <= 10)
                                        {$jamrendah = 1;}
                                         elseif ($jam >= 10 && $jam <= 20) 
                                             {$jamrendah = (20 - $jam) / (20 - 10);}
                                          else {$jamrendah = 0;}
                                    //jam sedang
                                    if ($jam >=10 &&  $jam <= 20) 
                                        {$jamsedang = ($jam-10)/(20-10);}
                                        elseif ($jam >= 20 && $jam <= 30)
                                            {$jamsedang = (30-$jam)/(30-20);}
                                            else { $jamsedang = 0 ;}
                                    //jamtinggi
                                    if($jam >= 20 && $jam <= 30)
                                        {$jamtinggi = ($jam - 20) / (30 - 20);}
                                        elseif ($jam >= 30)
                                            {$jamtinggi = 1;}
                                            else {$jamtinggi=0;}
                                    //kosongrendah
                                    if($kosong <= 2)
                                        {$kosongrendah=1;}
                                        elseif ($kosong >= 2 && $kosong <=4) 
                                            {$kosongrendah = (4 - $kosong) / (4-2);}
                                            else {$kosongrendah = 0;}
                                    //kosongtinggi
                                    if($kosong >=3 && $kosong <= 6)
                                        {$kosongtinggi = ($kosong - 3) / (6 - 3);}
                                        elseif ($kosong >= 6)
                                            {$kosongtinggi = 1;}
                                            else {$kosongtinggi = 0 ;}                                    
                                  ?>

                                <tbody>
                                    <tr>
                                        <td>{{$hasil->guru_nama}}</td>
                                        <td>{{$tugas}}</td>
                                        <td>{{$jam}}</td>
                                        <td>{{$kosong}}</td>                                     
                                        
                                        <?php  
                                        //tugas 
                                        if (max($tugasrendah,$tugassedang,$tugastinggi) == $tugasrendah)
                                            {
                                                $nilaitugas="Rendah";
                                            }
                                            elseif (max($tugasrendah,$tugassedang,$tugastinggi) == $tugassedang) 
                                                {
                                                    $nilaitugas="Sedang";
                                                 }
                                                else { $nilaitugas="Tinggi"; }

                                        //jam
                                        if (max($jamrendah,$jamsedang,$jamtinggi) == $jamrendah)
                                            {
                                                $nilaijam="Rendah";
                                            }
                                            elseif (max($jamrendah,$jamsedang,$jamtinggi) == $jamsedang)
                                                {
                                                    $nilaijam="Sedang";
                                                }
                                                else {$nilaijam="Tinggi";}
                                                
                                        //kosong
                                        if(max($kosongrendah,$kosongtinggi == $kosongrendah))
                                            {
                                                $nilaikosong = "Rendah";
                                            }
                                            else { $nilaikosong = "Tinggi";}
                                        ?>
                                      
                                        
                                        <?php
                                        if ($nilaikosong == "Tinggi")
                                            {
                                                $kehadiran = "Rendah";
                                            }
                                             elseif ($nilaitugas == "Tinggi" && $nilaijam == "Tinggi" && $nilaikosong == "Rendah")
                                                {
                                                    $kehadiran = "Tinggi";
                                                }
                                                elseif ($nilaitugas == "Rendah" && $nilaijam == "Tinggi" && $nilaikosong == "Rendah")
                                                    {
                                                        $kehadiran = "Tinggi";
                                                    }
                                                    elseif ($nilaitugas == "Tinggi" && $nilaijam == "Rendah" && $nilaikosong == "Rendah")
                                                    {
                                                        $kehadiran = "Tinggi";
                                                    }
                                                    else {$kehadiran = "Sedang"; }
                        
                                        ?>

                                        <td>{{$kehadiran}}</td>
                                    </tr>
                                </tbody>                                
                                @endforeach
                                </table>
                            </div>
                         </form>
                        </div>
                        </div>
                        </div>
                        </div>
                    </div> 
                </div>
                 
                
     
<!-- /.container-fluid -->
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



    </body>
</html>
