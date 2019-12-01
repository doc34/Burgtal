<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class UnTafel extends Model
{
    use SoftDeletes; //add this line

    protected $table='untafels';
}
