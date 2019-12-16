<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Produkt;
use App\EKPreise;
use App\Materiallist;
use Illuminate\Http\Request;

class ProduktController extends Controller
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
    public function store(Request $request, Produkt $produkt, EKPreise $eKPreise)
    {
        $user = Auth::user();
        $factor = Materiallist::select('UMfactor_id')->where('id', '=', $request->materiallist_id)->first();
        $factor_id = $factor->UMfactor_id;

        $format_id = $request->format_id;
        $material_id = $request->material_id;
        $stark_id = $request->stark_id;
        $materiallist_id = $request->materiallist_id;
        $art_id = $request->art_id;

        foreach ($request->art_id as $art) {

            $produkt_id = $produkt->insert($format_id, $user->id, $material_id, $stark_id, $materiallist_id, $art['id'], $factor_id);

            $new = new EkPreise();
            $new->EKpreis = $request->preis;
            $new->produkt_id = $produkt_id->id;
            $new->kunde_id = $request->kunde_id;
            $new->material_name = $request->materialname;
            $new->material_id =$material_id;
            $new->save();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produkt  $produkt
     * @return \Illuminate\Http\Response
     */
    public function show(Produkt $produkt)
    {
        $produkt = DB::table('produkts')
            ->leftJoin('starcks', 'starcks.id', '=', 'produkts.stark_id')
            ->leftJoin('arts', 'arts.id', '=', 'produkts.art_id')
            ->leftJoin('materiallists', 'materiallists.id', '=', 'produkts.materiallist_id')
            ->leftJoin('materials', 'materials.id', '=', 'produkts.material_id')
            ->leftJoin('formats', 'formats.id', '=', 'produkts.format_id')
            ->select('materials.material', 'arts.art','starcks.stark' , 'produkts.ekpreis_id' )
            ->get();
    }

  /**
     * Display the specified resource.
     *
     * @param  \App\Produkt  $produkt
     * @return \Illuminate\Http\Response
     */



    public function serach(Request $request){

        $produkt = DB::table('produkts')
        ->leftJoin('starcks', 'starcks.id', '=', 'produkts.stark_id')
        ->leftJoin('arts', 'arts.id', '=', 'produkts.art_id')
        ->leftJoin('materiallists', 'materiallists.id', '=', 'produkts.materiallist_id')
        ->leftJoin('materials', 'materials.id', '=', 'produkts.material_id')
        ->leftJoin('formats', 'formats.id', '=', 'produkts.format_id')
        ->leftJoin('factors', 'factors.id', '=', 'produkts.factor_id')
     ->leftJoin('ekpreises' ,'ekpreises.id','=', 'produkts.ekpreis_id' )
        ->select('produkts.id as produktid' ,'materials.material', 'arts.art','starcks.stark' ,'factors.factor','factors.id as factorid','produkts.ekpreis_id as ekpreis_id', 'ekpreises.EKpreis',
          )
        ->where('produkts.material_id' , $request->material_id)

        ->get();
        return response()->json( [
            'produkt'=>$produkt,

        ] );
    }
/**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produkt  $produkt
     * @return \Illuminate\Http\Response
     */
    public function ckeckpreis(Request $request)
    {
        $update = Produkt::find($request->id);
        $update->ekpreis_id = $request->ekpreis_id;
        $update->save();

        $del=EKPreise::where('produkt_id',$request->id)
        ->where('activ','1')
        ->update(['activ' => '0' ]);

        $new=EKPreise::where( 'id' , $request->ekpreis_id)
        ->update(['activ'=>'1' ]);

        $showmin = DB::table('ekpreises')
        ->leftJoin('kundens', 'kundens.id', '=', 'ekpreises.kunde_id')
        ->orderby('produkt_id')
        ->select('ekpreises.*', 'kundens.name', 'kundens.alias' )
        ->where('ekpreises.material_id' , $request->material_id)
        ->get();




    return response()->json( [
        'showmin'=>$showmin,

    ] );



    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produkt  $produkt
     * @return \Illuminate\Http\Response
     */
    public function edit(Produkt $produkt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produkt  $produkt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produkt $produkt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produkt  $produkt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produkt $produkt)
    {
        //
    }
}
