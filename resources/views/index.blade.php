
@extends('tema')

@section('content')
    <div class="container-fluid">
        <div class="col">
            <p>
            <h4> Daftar Guru </h4>
            <p>
            <p>
            <table class="table table-bordered">
                <thead>
                    <tr class="table-info">
                        <th>Id Guru</th>
                        <th>Nama</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                    @foreach($gurus as $guru)
                    <tr>
                        <td>{{ $guru->guru_id}}</td>
                        <td>{{ $guru->guru_nama }}</td>
                        <td>
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detail">
                                Detail
                                </button> 
                        </td>
                    </tr>
                    @endforeach
               
            </table>
            {{ $gurus->links() }}
        </div>    

        </div>  
    </div>
    <!-- /.container-fluid -->
@endsection

@section('footer')

@endsection
           
