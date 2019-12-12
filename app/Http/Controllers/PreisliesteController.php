<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use App\Preislieste;
use Illuminate\Http\Request;

class PreisliesteController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        //
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        //
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {
        $user = Auth::user();
        foreach ( $request->art_id as $art ) {

            $new = new Preislieste;
            $new->preis = $request->preis;
            $new->kunde_id = $request->kunde_id;
            $new->user_id = $user->id;
            $new->art_id = $art['id'];
            $new->material_id = $request->material_id;
            $new->stark_id = $request->stark_id;
            $new->materiallist_id = $request->materiallist_id;
            $new->save();

        }

        $preisliste = DB::table( 'preisliestes AS P' )
        ->leftJoin( 'kundens AS K', 'K'.'kundens.id', '=', 'P.kunden_id' )
        ->leftJoin( 'starcks AS S', 'S'.'kundens.id', '=', 'P.stark_id' )
        ->leftJoin( 'art AS A', 'A'.'kundens.id', '=', 'P.art_id' )

        ->select( 'P.preis', 'S.stark', 'A.art' )
        ->latest( 5 );

        $success = count( $request->art_id ).' daten gespeichert';
        return response()->json( [
            'preisliste'=>$preisliste,
            'success' => $success,
        ] );

    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Preislieste  $preislieste
    * @return \Illuminate\Http\Response
    */

    public function serach( Request $request, Preislieste $preislieste ) {


        $Kunde = $request->kunde_id;
        $material = $request->material_id;
        $preisliste = '';
        if ( $Kunde == false && $material > 0 ) {
            $preisliste = DB::table( 'preisliestes' )
            ->leftJoin( 'kundens', 'kundens.id', '=', 'preisliestes.kunde_id' )
            ->leftJoin( 'starcks', 'starcks.id', '=', 'preisliestes.stark_id' )
            ->leftJoin( 'arts', 'arts.id', '=', 'preisliestes.art_id' )
            ->leftJoin( 'materiallists', 'materiallists.id', '=', 'preisliestes.materiallist_id' )
            ->leftJoin( 'factors', 'factors.id', '=', 'materiallists.1_factor_id' )
            ->leftJoin( 'materials', 'materials.id', '=', 'preisliestes.material_id' )
            ->select( 'preisliestes.id', 'preisliestes.preis', 'starcks.stark', 'arts.art', 'kundens.name', 'kundens.alias', 'materials.material','factors.factor','materiallists.materal_list_cod' )
            ->where( 'preisliestes.material_id', '=', $material )
            ->get();
        }
        elseif ( $Kunde > 0 && $material > 0 ) {
            $preisliste = DB::table( 'preisliestes' )
            ->leftJoin( 'kundens', 'kundens.id', '=', 'preisliestes.kunde_id' )
            ->leftJoin( 'starcks', 'starcks.id', '=', 'preisliestes.stark_id' )
            ->leftJoin( 'arts', 'arts.id', '=', 'preisliestes.art_id' )
            ->leftJoin( 'materiallists', 'materiallists.id', '=', 'preisliestes.materiallist_id' )
            ->leftJoin( 'factors', 'factors.id', '=', 'materiallists.1_factor_id' )
            ->leftJoin( 'materials', 'materials.id', '=', 'preisliestes.material_id' )
            ->select( 'preisliestes.id', 'preisliestes.preis', 'starcks.stark', 'arts.art', 'kundens.name', 'kundens.alias', 'materials.material', 'factors.factor','materiallists.materal_list_cod')
            ->where( 'preisliestes.material_id', '=', $material )
            ->where( 'preisliestes.kunde_id', '=', $Kunde )

            ->get();

        }
        return response()->json( [
            'preisliste'=>$preisliste,

        ] );

    }
    /**
    * Display the specified resource.
    *
    * @param  \App\Preislieste  $preislieste
    * @return \Illuminate\Http\Response
    */

    public function show( Preislieste $preislieste ) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Preislieste  $preislieste
    * @return \Illuminate\Http\Response
    */

    public function edit( Preislieste $preislieste ) {
        //
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Preislieste  $preislieste
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, Preislieste $preislieste ) {
        //
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Preislieste  $preislieste
    * @return \Illuminate\Http\Response
    */

    public function destroy(Request $request, Preislieste $preislieste ) {
        Preislieste::destroy( $request->id );

    }
}