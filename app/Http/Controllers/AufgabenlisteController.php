<?php

namespace App\Http\Controllers;

use App\Aufgabenliste;
use Auth;
use DB;
use Illuminate\Http\Request;

class AufgabenlisteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { }

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function queryshow(Request $request)
    {
        $Aufgabeliste = DB::table('aufgabenlistes')
            ->leftJoin('arts', 'arts.id', '=', 'aufgabenlistes.art_id')
            ->leftJoin('materials', 'materials.id', '=', 'aufgabenlistes.material_id')
            ->leftJoin('starcks', 'starcks.id', '=', 'aufgabenlistes.stark_id')
            ->select('materials.material', 'arts.art', 'starcks.stark',  'aufgabenlistes.*')
            ->where('aufgabenlistes.aufgabeteile_id', '=', $request->aufgabeteile_id)
            ->orderBy('aufgabenlistes.created_at', 'desc')
            ->get();

        return response()->json(
            ["aufgabelist" => $Aufgabeliste]

        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, aufgabenliste $aufgabenliste)
    {

        $user = Auth::user();

        $part = '/storage/img/';
        $laenge = $request->leange;
        $breite = $request->breite;
        $qm = ($laenge * $breite / 1000000);
        if ($qm < 0.2) {
            $qm = 0.2;
        }


        $nummber = $request->nummber;


        for ($i = 0; $i < $request->stuck; $i++) {

            $store = new Aufgabenliste;
            $store->laenge = $laenge;
            $store->breite = $breite;
            $store->svgpath = $part . $request->svgpath;
            $store->VK = $request->VK;
            $store->UK = $request->UK;
            $store->KL = $request->KL;
            $store->KR = $request->KR;
            $store->KH = $request->KH;
            $store->SK = $request->SK;
            $store->qm = $qm;
            $store->a_num = $nummber;
            $store->aufgabeteile_id = $request->aufgabeteile_id;
            $store->art_id = $request->artid;
            $store->stark_id = $request->starkid;
            $store->projekt_id = $request->projektid;
            $store->material_id = $request->materialid;
            $store->user_id = $user->id;
            $store->save();
            $nummber++;
        }
        $Aufgabeliste = DB::table('aufgabenlistes')
            ->leftJoin('arts', 'arts.id', '=', 'aufgabenlistes.art_id')
            ->leftJoin('materials', 'materials.id', '=', 'aufgabenlistes.material_id')
            ->leftJoin('starcks', 'starcks.id', '=', 'aufgabenlistes.stark_id')
            ->select('materials.material', 'arts.art', 'starcks.stark',  'aufgabenlistes.*')
            ->where('aufgabenlistes.aufgabeteile_id', '=', $request->aufgabeteile_id)
            ->orderBy('aufgabenlistes.created_at', 'desc')
            ->get();

        return response()->json(
            ["aufgabelist" => $Aufgabeliste]

        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\aufgabenliste  $aufgabenliste
     * @return \Illuminate\Http\Response
     */
    public function show(aufgabenliste $aufgabenliste)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\aufgabenliste  $aufgabenliste
     * @return \Illuminate\Http\Response
     */
    public function edit(aufgabenliste $aufgabenliste)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\aufgabenliste  $aufgabenliste
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, aufgabenliste $aufgabenliste)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\aufgabenliste  $aufgabenliste
     * @return \Illuminate\Http\Response
     */
    public function destroy(aufgabenliste $aufgabenliste)
    {
        //
    }
}
