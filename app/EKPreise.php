<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class EKPreise extends Model
{


    protected $table='ekpreises';
  protected $fillable = ['EKpreis', 'produkt_id', 'kunde_id'];

     public function check($id) {


$check = EKPreise::find($id);

$check->check('1')->save($comment);


        return $ek;
    }
}
