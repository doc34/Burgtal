<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factor extends Model
{
protected$fillable=['factor', 'info' ];

public function show(){
return Factor::all();

}

public function store($factor, $info){

    //
}


}
