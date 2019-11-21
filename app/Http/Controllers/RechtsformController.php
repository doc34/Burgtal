<?php

namespace App\Http\Controllers;

use App\Rechtsform;
use Illuminate\Http\Request;

class RechtsformController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rechtsform=Rechtsform::all();

        return response()->json([
            'rechtsform' => $rechtsform,

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
     * @param  \App\Rechtsform  $rechtsform
     * @return \Illuminate\Http\Response
     */
    public function show(Rechtsform $rechtsform)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rechtsform  $rechtsform
     * @return \Illuminate\Http\Response
     */
    public function edit(Rechtsform $rechtsform)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rechtsform  $rechtsform
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rechtsform $rechtsform)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rechtsform  $rechtsform
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rechtsform $rechtsform)
    {
        //
    }
}
