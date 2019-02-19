<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    //
    protected $table ="tb_penerbit";
    public $timestamps = false;
    protected $guarded = ['kd_penerbit'];
}
