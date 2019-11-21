<?php

namespace App\Http\Controllers;

use App\Projekt;
use App\Projektnummer;
use Auth;
use DB;
use Illuminate\Http\Request;

class ProjektController extends Controller
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
        $knumm = env("KUNDEN_NUMM");
        $pcod = env("PROJEKT_COD");
        $user = Auth::user();
        $random = time();

        $projektnum = new Projektnummer;
        $projektnum->random = $random;
        $projektnum->user_id = $user->id;
        $projektnum->save();
        $NUM = Projektnummer::where('random', $random)->first();
        $pn = $pcod . ($NUM->id + $knumm);

        Projektnummer::where('random', $random)
            ->update(['num' => $pn]);


        $pro = new Projekt;
        $pro->kunden_id = $request->edit;
        $pro->projektnummer = $pn;
        $pro->save();

        $projekt = Projekt::where('projektnummer', $pn)->first();

        return response()->json([
            'projekt' => $projekt,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Projekt  $projekt
     * @return \Illuminate\Http\Response
     */
    public function show(Projekt $projekt)
    {
        $projekt = DB::table('projekts')

            ->leftJoin('kundens', 'kundens.id', '=', 'projekts.kunden_id')
            ->select('kundens.name', 'kundens.vorname', 'projekts.*')
            ->where('projekts.projektcloss', '=', NULL)

            ->paginate(15);
        return response()->json([
            'projekt' => $projekt,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Projekt  $projekt
     * @return \Illuminate\Http\Response
     */
    public function edit(Projekt $projekt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Projekt  $projekt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projekt $projekt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Projekt  $projekt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projekt $projekt)
    {
        //
    }
}
