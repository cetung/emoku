@extends('tema')

@section('content')

                <div class="container-fluid">

                <div class="col">
                    <h5>Silahkan cari jadwal sesuai kelas</h5>
                    <br>

                    <form action="cari" method="GET">
                    
                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label for="validationDefault01"><b>Kelas</b></label>
                                <select class="custom-select" name ="kelas" id="kelas" required>
                                    <option selected disabled value="">Kelas</option>
                                    @foreach($kelass as $kelas)
                                        <option>{{ $kelas->kelas_id }}</option>
                                    @endforeach
                                </select>
                            </div>                       

                            <div class="col-md-3 mb-3">
                                <label for="validationDefault02"><b>Hari</b></label>
                                <select class="custom-select" id="hari" name="hari" required>
                                    <option selected disabled value="">Hari</option>
                                    <option>Senin</option>
                                    <option>Selasa</option>
                                    <option>Rabu</option>
                                    <option>Kamis</option>
                                    <option>Jumat</option>
                                </select>
                            </div>

                            <div class="col-md-3 mb-5">
                            <div class="col-md-3 mb-4">   
                            </div>
                            <button type="submit" class="btn btn-info" name="cari">Cari</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
                 </div>
                <!-- /.container-fluid -->
            
@endsection

@section('footer')

@endsection