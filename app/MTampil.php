<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MTampil extends Model
{
    //
    protected $table ="tb_peminjaman";
    public $timestamps = false;
    protected $guarded = ['kd_peminjaman'];
}
