<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Homecontroller extends Controller
{
    // Halaman Home
  public function index()
  {
   $mp = DB::table('pelajarans')
               ->select('guru_id', \DB::raw('COUNT(mapel_id) as jml_ml'))
               ->groupByraw('mapel_id');
  
     $tugas = DB::table('gurutugass')
                 ->join('tugass', 'gurutugass.id_tugas','=','tugass.tugas_id')
                 ->select('id_guru', DB::raw('SUM(akumulasi_tugas) as jml_tugas'))
                 ->groupby('id_guru');
     
     $jam = DB::table('pelajarans')
              ->select('guru_id', DB::raw('SUM(jml_jam) as jml_jam'))
              ->groupBy('guru_id');

     $kosong = DB::table('monitor')
               ->select('guru_id', DB::raw('SUM(kehadiran) as jml_kosong'))
               ->groupBy('guru_id');

     $hasil = DB::table('gurus')
               ->joinSub($kosong,'kosong', function ($join)
               {
                 $join->on('kosong.guru_id','=','gurus.guru_id');
               })
               ->joinSub($jam,'jam', function ($join)
               {
                 $join->on('jam.guru_id','=','gurus.guru_id');
               })
               ->joinSub($tugas,'tugas', function ($join)
               {
                 $join->on('tugas.id_guru','=','gurus.guru_id');
               })
               ->get();  

     return view('home', ['monitor' => $hasil]);
  }


  public function cari(Request $request)
  {
     $bln = $request->caribulan; 

     $kosong = DB::table('monitor')
           ->select('guru_id', DB::raw('SUM(kehadiran) as jml_kosong'))
           ->from('monitor')
           ->where('bulan', 'like', "%" .$bln. "%")
           ->groupBy('guru_id');

     $tugas = DB::table('gurutugass')
             ->join('tugass', 'gurutugass.id_tugas','=','tugass.tugas_id')
             ->select('id_guru', DB::raw('SUM(akumulasi_tugas) as jml_tugas'))
             ->groupby('id_guru');

     $jam = DB::table('pelajarans')
         ->select('guru_id', DB::raw('SUM(jml_jam) as jml_jam'))
         ->groupBy('guru_id');
    
     $hasil = DB::table('gurus')
           ->joinSub($kosong,'kosong', function ($join)
             {
               $join->on('kosong.guru_id','=','gurus.guru_id');
             })
           ->joinSub($jam,'jam', function ($join)
             {
               $join->on('jam.guru_id','=','gurus.guru_id');
             })
           ->joinSub($tugas,'tugas', function ($join)
             {
               $join->on('tugas.id_guru','=','gurus.guru_id');
             })
           ->get();  
           return view('home', ['monitor' => $hasil]);
  }
}

