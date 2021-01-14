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
                                <th style="text-align:center">Id Guru</th>
                                <th style="text-align:center">Nama</th>
                                
                            </tr>
                        </thead>
                        @foreach($gurus as $guru)
                        <tr>
                            <td>{{ $guru->guru_id}}</td>
                            <td>{{ $guru->guru_nama }}</td>
                           
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