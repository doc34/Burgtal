<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{

    public function allMaterial(){

        return Material::all();
    }

}
