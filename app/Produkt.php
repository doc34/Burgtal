<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produkt extends Model
{

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function insert($format_id, $user_id, $material_id, $stark_id, $materiallist_id, $art_id, $factor_id)
    {
        $new = Produkt::firstOrCreate(
            ['format_id' => $format_id
                , 'user_id' => $user_id
                , 'art_id' => $art_id
                , 'material_id' => $material_id
                , 'stark_id' => $stark_id
                , 'materiallist_id' => $materiallist_id
                , 'factor_id' => $factor_id]);
        return $new;

    }
}
