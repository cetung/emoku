<?php

use Illuminate\Support\Facades\Route;

//menampilkan halaman login 
Route::get('/', function () {
         return view('login');
});

//menampilkan halaman dashbord
Route::get('index', 'EmokuController@index');

//menampilkan halaman detail guru
Route::get('guru', 'EmokuController@detailguru');


//menampilkan halaman hasil monitoring
Route::get('hasil', 'EmokuController@hasil');

//halaman input monitoring

    //mencari jadwal sesuai kelas
    Route::get('kelas', 'EmokuController@kelas');

    //melakukan pencarian
    Route::get('cari', 'EmokuController@cari');

    //input kehadiran
     Route::get('input', 'EmokuController@store');

//menampilkan halaman input monitoring
//Route::get('input', function () {
 //   return view('input');
//});
