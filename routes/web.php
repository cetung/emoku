<?php

use Illuminate\Support\Facades\Route;

//menampilkan halaman dashbord
Route::get('/', 'Homecontroller@index');

//menampilkan halaman dashbord
Route::get('home', 'Homecontroller@index');

//menampilkan hasil berdasarkan bulan
Route::get('cbulan', 'Homecontroller@cari');

//menampilkan halaman login 
Route::get('login', function () {
  return view('login');
});

//menampilkan halaman dashbord
Route::get('index', 'EmokuController@index');

//menampilkan halaman detail guru
Route::get('guru', 'EmokuController@detailguru');


//halaman input monitoring

    //mencari jadwal sesuai kelas
    Route::get('kelas', 'EmokuController@kelas');

    //melakukan pencarian
    Route::get('cari', 'EmokuController@cari');

    //input kehadiran
   // Route::post('input', 'EmokuController@store');

     //input kehadiran
    Route::post('input', 'EmokuController@store');

      //input kehadiran
    //Route::post('in', 'EmokuController@store');


//menampilkan halaman hasil monitoring
Route::get('hasil', 'HasilController@index');

//menampilkan hasil berdasarkan bulan
    Route::get('caribulan', 'HasilController@cari');

