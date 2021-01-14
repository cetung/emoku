@extends('tema')

@section('content')

<div class="container-fluid">

    <div class="col">
        <h5>Isi kehadiran di bawah ini</h5>
        <br>


        <form action="input" method="POST">
            {{csrf_field()}}
            <div class="form-row">

                <div class="col-md-3 mb-2">
                    <select class="custom-select" id="bulan" name="bulan" required>
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

            </div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-info">
                        <tr class="table-info">
                            <th>Id Guru</th>
                            <th>Nama Guru</th>
                            <th>Mapel</th>
                            <th>Jml Jam</th>
                            <th>Kehadiran</th>

                        </tr>
                    </thead>

                    @foreach ($pelajarans as $i => $jadwal)

                    <tbody>
                        <tr>
                            <td>
                                <input name="guru_id_{{$i}}" id="guru_id_{{$i}}" value="{{ $jadwal->guru_id}}" readonly \>
                            </td>
                            <td>{{ $jadwal->guru_nama}}</td>
                            <td>{{ $jadwal->nama_mapel}}</td>
                            <td>{{ $jadwal->jml_jam}}</td>
                            <td>
                                <select class="custom-select" name="kehadiran_{{$i}}" required>
                                    <option selected disabled>KEHADIRAN</option>
                                    <option value='0'>Hadir</option>
                                    <option value='1'>Kosong</option>
                                </select>
                            </td>

                        </tr>
                    </tbody>
                    @endforeach

                </table>
                <div class="col-md-3 mb-3">
                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                </div>
        </form>
    </div>
</div>

</div>
</div>
<!-- /.container-fluid -->

@endsection

@section('footer')

@endsection