<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MRak extends Model
{
    //
    protected $table ="tb_rak";
    public $timestamps = false;
    protected $guarded = ['kd_rak'];
}
