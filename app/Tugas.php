<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    protected $primaryKey = 'tugas_id';
    public $incrementing = false;

    protected $fillable = ['tugas_id','nama_tugas','akumulasi_tugas'];
}
