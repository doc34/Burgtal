<?php

namespace App\Http\Controllers;

use App\Kunden;
use DB;
use Illuminate\Http\Request;

class LieferantController extends Controller
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
     * @param  \App\Kunden  $kunden
     * @return \Illuminate\Http\Response
     */
    public function searchQuery(Request $request, Kunden $kunden)
    {

        $kunde = Kunden::where('lieferantconf', '1')
        ->Where('name', 'LIKE',  '%'. $request->suchen . '%')
  
            ->paginate(15);




        return response()->json([
            'kunde' => $kunde,
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Lieferant  $lieferant
     * @return \Illuminate\Http\Response
     */
    public function show(Kunden $kunden, Request $request)
    {
        $kunden = DB::table('kundens')->where([
            ['lieferantconf', '=', '1'],
            ['name', '=', '1'],
            ['vorname', '=', '1'],

        ])->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lieferant  $lieferant
     * @return \Illuminate\Http\Response
     */
    public function edit(Kunden $kunden)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lieferant  $lieferant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kunden $kunden)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lieferant  $lieferant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kunden $kunden)
    {
        //
    }
}
