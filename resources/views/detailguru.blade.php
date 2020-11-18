
@extends('tema')

@section('content')
    <div class="container-fluid">
    
    
        <div class="col">
       
      
            <p>        
            <p>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-info">
                            <th>Id</th>
                            <th>Nama</th>
                            <th>Tugas</th>
                            <th>JML Jam</th>
                            <th>Mata Pelajaran</th>
                            <th>Kelas</th>
                            <th>Jml Jam</th>
                        </tr>
                    </thead>
                    @foreach($gurus as $gt)
                    <tbody>
                    <tr>
                
                        </tr>
                            <td>{{ $gt->id_guru}}</td>
                            <td>{{ $gt->guru_nama}}</td>                       
                            <td>{{ $gt->nama_tugas}}</td>
                            <td>{{ $gt->akumulasi_tugas}}</th>
                            <td>{{ $gt->nama_mapel}}</th>
                            <td>{{ $gt->kelas_nama}}</th>
                            <td>{{ $gt->jml_jam}}</td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
            {{ $gurus->links() }}
               
        </div>    
    
    </div>
    <!-- /.container-fluid -->
@endsection

@section('footer')

@endsection
           
