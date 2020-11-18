<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $primaryKey = 'guru_id';
    public $incrementing = false;

    protected $fillable = ['guru_id','guru_nama'];

    
}
