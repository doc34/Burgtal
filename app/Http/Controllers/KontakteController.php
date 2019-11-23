<?php

namespace App\Http\Controllers;

use Auth;
use App\Kontakte;
use App\Kontakteliste;
use DB;
use Illuminate\Http\Request;

class KontakteController extends Controller
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
        $projekt_id = $request->projektid;
        $kunden_id = $request->kundenid;
        $random = time();


        $user = Auth::user();
        $query = new Kontakte();
        $query->anrede_id = $request->anredeid;
        $query->name = $request->nachname;
        $query->vorname = $request->vorname;
        $query->position = $request->pos;
        $query->strasse = $request->strasse;
        $query->plz = $request->plz;
        $query->ort = $request->ort;
        $query->strasse = $request->strasse;
        $query->tel = $request->tel;
        $query->tel_privat = $request->tel1;
        $query->geb = $request->geb;
        $query->handy = $request->handy;
        $query->email = $request->email;
        $query->random = $random;
        $query->land_id = $request->landid;
        $query->user_id = $user->id;
        $query->save();

        $find = DB::table('kontaktes')->where('random', $random)->first();

        $liste = new Kontakteliste;
        $liste->kunden_id = $kunden_id;
        $liste->projekt_id = $projekt_id;
        $liste->kontakte_id = $find->id;
        $liste->save();



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kontakte  $kontakte kontaktes
     * @return \Illuminate\Http\Response
     */
    public function showprojekt(Kontakte $kontakte, Request $request)
    {
        $kontakte = DB::table('kontaktelistes')
        ->leftJoin('kontaktes', 'kontaktes.id', '=', 'kontaktelistes.kontakte_id')
            ->where('projekt_id', $request->projektid)
            ->get();

        return response()->json([
            'kontakte' => $kontakte,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kontakte  $kontakte
     * @return \Illuminate\Http\Response
     */
    public function edit(Kontakte $kontakte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kontakte  $kontakte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kontakte $kontakte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kontakte  $kontakte
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kontakte $kontakte)
    {
        //
    }
}
