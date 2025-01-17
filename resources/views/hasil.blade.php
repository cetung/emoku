@extends('tema')

@section('content')

                <div class="container-fluid">

                    
                    <div class="col">
                        <h4>Hasil Monitoring Kehadiran</h4>
                        <hr>                    
                         <form action="caribulan" method="GET">
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
                            </div>
                         </form>
                                
                      
                        <div class="table-responsive">
                        <table class="table table-bordered" class="table align-middle" style="font-size: 85%;">
                            <thead class="thead-dark">
                                <thead>
                                    <tr class="table-info align-center">
                                        <th style="text-align:center" >Nama Guru</td>
                                        <th>Tugas</th>
                                        <th>Jam Mengajar</th>
                                        <th>Jam kosong</th>
                                        <th style="text-align:center" colspan="3">Tugas</td>
                                        <th style="text-align:center" colspan="3">Jam Mengajar</td>
                                        <th style="text-align:center" colspan="2">Jam Kosong</td>
                                        
                                        <th style="text-align:center" >Nilai</th>
                                        
                                        
                                    </tr>
                                    <tr class="table-info">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <th style="text-align:center">Rendah</td>
                                        <th style="text-align:center">Sedang</td>
                                        <th style="text-align:center">Tinggi</td>
                                        <th style="text-align:center">Rendah</td>
                                        <th style="text-align:center">Sedang</td>
                                        <th style="text-align:center">Tinggi</td>
                                        <th style="text-align:center">Rendah</td>
                                        <th style="text-align:center">Tinggi</td>
                                       
                                        <th style="text-align:center">Kehadiran</th>
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

                                        <td>{{$tugasrendah}} </td>
                                        <td>{{$tugassedang}}</td>
                                        <td>{{$tugastinggi}}</td>
  
                                        <td>{{$jamrendah}}</td>
                                        <td>{{$jamsedang}}</td>
                                        <td>{{$jamtinggi}}</td>

                                        <td>{{round($kosongrendah,1)}}</td>
                                        <td>{{round($kosongtinggi,1)}}</td>
                                      
                                        
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
                                        // nilai kehadrian rendah
                                        if ($nilaikosong == "Tinggi")
                                            { $kehadiran = "Rendah"; }
                                                //nilai kehadrian Tinggi
                                                   elseif ($nilaitugas == "Tinggi" && $nilaijam == "Tinggi" && $nilaikosong == "Rendah")
                                                        {$kehadiran = "Tinggi";}
                                                   elseif ($nilaitugas == "Sedang" && $nilaijam == "Tinggi" && $nilaikosong == "Rendah")
                                                        {$kehadiran = "Tinggi";}   
                                                   elseif ($nilaitugas == "Tinggi" && $nilaijam == "Sedang" && $nilaikosong == "Rendah")
                                                         {$kehadiran = "Tinggi";}
                                                   elseif ($nilaitugas == "Tinggi" && $nilaijam == "Rendah" && $nilaikosong == "Rendah")
                                                         { $kehadiran = "Tinggi"; }
                                                    elseif ($nilaitugas == "Rendah" && $nilaijam == "Tinggi" && $nilaikosong == "Rendah")
                                                            {$kehadiran = "Tinggi"; }
                                                    elseif ($nilaitugas == "Sedang" && $nilaijam == "Sedang" && $nilaikosong == "Rendah")
                                                         { $kehadiran = "Tinggi"; }
                                                        //Nilai Kehadiran Sedang
                                                        elseif ($nilaitugas == "Rendah" && $nilaijam == "Rendah" && $nilaikosong == "Rendah")
                                                            { $kehadiran = "Sedang"; }
                                                        elseif ($nilaitugas == "Rendah" && $nilaijam == "Sedang" && $nilaikosong == "Rendah")
                                                                { $kehadiran = "Sedang"; }
                                                        elseif ($nilaitugas == "Sedang" && $nilaijam == "Rendah" && $nilaikosong == "Rendah")
                                                            { $kehadiran = "Sedang";}                        
                                        ?>

                                        <td>{{$kehadiran}}</td>
                                    </tr>
                                </tbody>
                                
                                @endforeach
                        </table>
                        </div>
                        
                    </div>
                </div>
                <!-- /.container-fluid -->
           
@endsection

@section('footer')

@endsection