<?php

namespace App\Http\Controllers;

use App\Aufgabenteile;
use App\Aufgabenummer;
use App\Burtalconf;
use Auth;
use DB;
use Illuminate\Http\Request;

class AufgabenummerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function infoindex(Request $request)
    {
        $auftrag=DB::table('aufgabeteiles')
        ->leftJoin('aufgabenummers', 'aufgabenummers.id', '=', 'aufgabeteiles.aufgabenum_id')
        ->leftJoin('statuss', 'statuss.id', '=', 'aufgabenummers.status_id')
        ->where('aufgabenummers.projekt_id',$request->projekt_id )
        ->select('aufgabeteiles.teilenum' ,'aufgabeteiles.id AS teile_id', 'aufgabenummers.*', 'statuss.status', 'statuss.css')
        ->get();


      return response()->json([
        'auftragnummer' =>$auftrag ,
    ]);
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
        $user = Auth::user();
        $random = time();
        $aufcod= Burtalconf::where('key','AUFGABE_COD')->first();
        $aufnum= Burtalconf::where('key','AUFGABE_NUMM')->first();
        $new= new Aufgabenummer();
        $new->random=$random;
        $new->titel=$request->titel;
        $new->info=$request->info;
        $new->beschreibung=$request->beschreibung;
        $new->projekt_id=$request->projekt_id;
        $new->user_id=$user->id;
        $new->save();

        $key=Aufgabenummer::where('random',$random)->first();

         $cod=$key->id + $aufnum->var;
        $NUMM = $aufcod->var.$cod;

        Aufgabenummer::where('random', $random)
          ->update(['aufgabenum' => $NUMM,
            'status_id'=>'1'
          ]);

         $teile = new Aufgabenteile;
         $teile->aufgabenum_id=$key->id;
         $teile->random=$random;
         $teile->user_id=$user->id;
         $teile->save();
         $teilenum=Aufgabenteile::where('aufgabenum_id', $key->id)->get();
         Aufgabenteile::where('random', $random)
          ->update(['teilenum'=> $NUMM . '-'. count($teilenum)
          ]);
            $auftrag=DB::table('aufgabeteiles')
            ->leftJoin('aufgabenummers', 'aufgabenummers.id', '=', 'aufgabeteiles.aufgabenum_id')
            ->where('aufgabeteiles.aufgabenum_id',$key->id )
            ->select('aufgabeteiles.teilenum' ,'aufgabeteiles.id AS teile_id', 'aufgabenummers.*')
            ->get();


          return response()->json([
            'auftragnummer' =>$auftrag ,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aufgabenummer  $aufgabenummer
     * @return \Illuminate\Http\Response
     */
    public function show(Aufgabenummer $aufgabenummer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aufgabenummer  $aufgabenummer
     * @return \Illuminate\Http\Response
     */
    public function edit(Aufgabenummer $aufgabenummer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aufgabenummer  $aufgabenummer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aufgabenummer $aufgabenummer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aufgabenummer  $aufgabenummer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aufgabenummer $aufgabenummer)
    {
        //
    }
}
