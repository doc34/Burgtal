<?php

namespace App\Http\Controllers;

use App\Anrede;
use Illuminate\Http\Request;

class AnredeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $anrede= Anrede::all();

       return response()->json([

        'anrede' => $anrede
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
     * @param  \App\Anrede  $anrede
     * @return \Illuminate\Http\Response
     */
    public function show(Anrede $anrede)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Anrede  $anrede
     * @return \Illuminate\Http\Response
     */
    public function edit(Anrede $anrede)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Anrede  $anrede
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anrede $anrede)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Anrede  $anrede
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anrede $anrede)
    {
        //
    }
}
