<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MBuku extends Model
{
    //
    protected $table ="tb_Buku";
    public $timestamps = false;
    protected $guarded = ['kd_Buku'];
}
