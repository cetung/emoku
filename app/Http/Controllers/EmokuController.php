<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmokuController extends Controller
{
   public function index()
   {
      $guru = DB::table('gurus')->paginate(10);
      return view('index', ['gurus' => $guru]);
   }

   public function detailguru()
   {

      $gt = DB::table('gurus')
         ->join('gurutugass', 'gurus.guru_id', '=', 'gurutugass.id_guru')
         ->leftjoin('tugass', 'tugass.tugas_id', '=', 'gurutugass.id_tugas')
         ->leftjoin('pelajarans', 'pelajarans.guru_id', '=', 'gurus.guru_id')
         ->leftjoin('mapels', 'pelajarans.mapel_id', '=', 'mapels.mapel_id')
         ->leftjoin('kelass', 'kelass.kelas_id', '=', 'pelajarans.kelas_id')
         ->orderBy('id_guru', 'asc')
         ->paginate(10);

      return view('detailguru', ['gurus' => $gt]);
   }

   //<a href="/pegawai/edit/{{ $p->pegawai_id }}

   public function kelas()
   {
      $kelas = DB::table('kelass')->paginate(10);
      return view('carikelas', ['kelass' => $kelas]);
   }

   public function cari(Request $request)
   {
      $ckelas = $request->kelas;
      $chari = $request->hari;


      $jadwal = DB::table('pelajarans')
         ->join('gurus', 'gurus.guru_id', '=', 'pelajarans.guru_id')
         ->join('mapels', 'mapels.mapel_id', '=', 'pelajarans.mapel_id')
         ->where('kelas_id', 'like', "%" . $ckelas . "%")
         ->where('hari', 'like', "%" . $chari . "%")
         ->get();

      return view('input', ['pelajarans' => $jadwal]);
   }

   public function proses(Request $request)
   {
      $this->validate($request,[
         'guru_id' => 'required|nullable',
         'kehadiran' => 'required|numeric|nullable',
         'bulan' => 'required'
      ]);

      $count = DB::table('pelajarans')->count();

      for ($i = 0; $i < $count; $i++) {
         $data = [[
            "guru_id" => $request->input("guru_id_" . $i),
            "kehadiran" => $request->input("kehadiran_" . "$i"),
            "bulan" => $request->bulan,
         ]];

         DB::table('monitor')->insert($data);
      }

      return redirectTopage ('hasil');
   }









   
  
   public function store(Request $request)
   {
      
      $count = DB::table('pelajarans')->count();

      for ($i = 0; $i < $count; $i++) {
         $data = [[
            "guru_id" => $request->input("guru_id_" . $i),
            "kehadiran" => $request->input("kehadiran_" . "$i"),
            "bulan" => $request->bulan,
         ]];

         DB::table('monitor')->insert($data);
      }

      return redirect ('kelas');
   }
}
