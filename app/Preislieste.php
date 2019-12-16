<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preislieste extends Model
{

    public function insert($format_id,$user_id,$material_id,$stark_id,$materiallist_id){
        $new = new Preislieste;
        if($request->format_id)$new->format_id = $request->format_id;
        $new->user_id = $user->id;
        $new->art_id = $art['id'];
        $new->material_id = $request->material_id;
        $new->stark_id = $request->stark_id;
        $new->materiallist_id = $request->materiallist_id;
        $new->save();
    }

    public function show($format_id,$user_id,$material_id,$stark_id,$materiallist_id){
        return Preisliste::where('materiallist_id', $materiallist_id)
        ->where('material_id', $material_id)
        ->where('stark_id', $stark_id)
        ->where('art_id', $art_id)
        ->where('stark_id', $stark_id)
        ->first();

    }
}
