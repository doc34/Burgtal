<?php

namespace App\Http\Controllers;

use App\Partnertyp;
use Illuminate\Http\Request;

class PartnertypController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partnertype=Partnertyp::all();
        return response()->json([
            'partnertype' => $partnertype,

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partnertyp  $partnertyp
     * @return \Illuminate\Http\Response
     */
    public function show(Partnertyp $partnertyp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Partnertyp  $partnertyp
     * @return \Illuminate\Http\Response
     */
    public function edit(Partnertyp $partnertyp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partnertyp  $partnertyp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partnertyp $partnertyp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partnertyp  $partnertyp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partnertyp $partnertyp)
    {
        //
    }
}
