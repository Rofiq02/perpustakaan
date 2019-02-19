<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    //
    protected $table ="tb_rak";
    public $timestamps = false;
    protected $guarded = ['kd_rak'];
}
