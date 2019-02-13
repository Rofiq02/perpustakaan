<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MAdmin extends Model
{
    //
    protected $table ="users";
    public $timestamps = false;
    protected $guarded = ['id'];
}
