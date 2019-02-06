<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MPengarang extends Model
{
    //
    protected $table ="tb_pengarang";
    public $timestamps = false;
    protected $guarded = ['kd_pengarang'];
}
