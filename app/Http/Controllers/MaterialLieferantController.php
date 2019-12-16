<?php

namespace App\Http\Controllers;

use App\Preislieste;
use DB;
use Illuminate\Http\Request;

class MaterialLieferantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Preislieste  $preislieste
     * @return \Illuminate\Http\Response
     */

    public function show(Preislieste $preislieste)
    {
        $test =DB::table('preisliestes')
        ->leftJoin('materials', 'materials.id', '=', 'preisliestes.material_id')
        ->leftJoin('arts', 'arts.id', '=', 'preisliestes.art_id')
        ->leftJoin('starcks', 'starcks.id', '=', 'preisliestes.stark_id')
        ->select('materials.material','starcks.stark','arts.art');





$test1 =DB::table('preisliestes')
->leftJoin('materials', 'materials.id', '=', 'preisliestes.material_id')
->Join('arts', 'arts.id', '=', 'preisliestes.art_id')
->Join('starcks', 'starcks.id', '=', 'preisliestes.stark_id')
->select('preisliestes.art_id','preisliestes.stark_id','preisliestes.material_id','preisliestes.preis as preis-31 ')
->where('preisliestes.kunde_id','31')
->union($test)
->get();



        $art = DB::table('arts')
        ->Join('preisliestes', 'preisliestes.art_id', '=', 'arts.id')
        ->select('arts.art')
        ->GROUPBY('arts.art')
        ->orderby('arts.sort')
        ->get();



        $stark = DB::table('starcks')
            ->Join('preisliestes', 'preisliestes.stark_id', '=', 'starcks.id')
            ->select('starcks.stark')
            ->GROUPBY('starcks.stark')
            ->get();

        $material = DB::table('materials')
            ->rightJoin('preisliestes', 'materials.id', '=', 'preisliestes.material_id')
            ->select('materials.id')
            ->GROUPBY('materials.id')
            ->orderby('materials.material')

            ->get();

        /*    DB::table('users')
        ->join('contacts', function ($join) {
        $join->on('users.id', '=', 'contacts.user_id')
        ->where('contacts.user_id', '>', 5);
        })
        ->get(); */

        return response()->json([
            'art' => $art,'stark'=>$stark , 'material'=>$material,'test' =>$test
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Preislieste  $preislieste
     * @return \Illuminate\Http\Response
     */

    public function edit(Preislieste $preislieste)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Preislieste  $preislieste
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Preislieste $preislieste)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Preislieste  $preislieste
     * @return \Illuminate\Http\Response
     */

    public function destroy(Preislieste $preislieste)
    {
        //
    }
}
