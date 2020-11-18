@extends('tema')

@section('content')

                <div class="container-fluid">

                    <!-- Breadcrumbs-->
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Hasil</a>
                    </li>
                    </ol>
                    <div class="col">
                        <h4>Hasil Monitoring Kehadiran</h4>
                        <p> Guru dengan nilai tertinggi merupakan guru dengan tingkat kehadiran terendah</p>
                        <hr>
                        <p> Akm Tugas : merupakan jumlah akumulasi tugas tambahan dalam hitungan jam <br>
                            
                         <!--
                        <div class="col-md-3 mb-3">
                            <label for="validationDefault02"><b>Bulan</b></label>
                
                            <select class="custom-select" id="bulan" required>
                                <option selected disabled value="">Bulan</option>
                                <option>Januari</option>
                                <option>Februari</option>
                            </select>
                        </div>
                        -->
                        <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <thead>
                                    <tr class="table-info">
                                        <th>Nama Guru</th>
                                        <th>Akm Tugas</th>
                                        <th>Jml Jam</th>
                                        <th>Jml Kosong</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                @foreach ( $monitor as $hasil)
                               
                                <tbody>
                                    <tr>
                                        <td>{{$hasil->guru_id}}</td>
                                        <td></td>
                                        <td>{{$hasil->jml_jam}}</td>
                                        <td>{{$hasil->kehadiran}}</td>
                                        
                                    </tr>
                                </tbody>
                                @endforeach
                        </table>
                        </div>
                        {{ $monitor->links() }}
                    </div>
                </div>
                <!-- /.container-fluid -->
           
@endsection

@section('footer')

@endsection