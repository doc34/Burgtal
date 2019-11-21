<?php

namespace App\Http\Controllers;

use App\Starck;
use Illuminate\Http\Request;

class StarckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stark= Starck::all();
        return response()->json([
            'stark' => $stark,
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
     * @param  \App\Starck  $starck
     * @return \Illuminate\Http\Response
     */
    public function show(Starck $starck)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Starck  $starck
     * @return \Illuminate\Http\Response
     */
    public function edit(Starck $starck)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Starck  $starck
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Starck $starck)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Starck  $starck
     * @return \Illuminate\Http\Response
     */
    public function destroy(Starck $starck)
    {
        //
    }
}
