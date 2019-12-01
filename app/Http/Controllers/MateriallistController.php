<?php

namespace App\Http\Controllers;

use App\Materiallist;
use Illuminate\Http\Request;

class MateriallistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materiallist= Materiallist::all();
        
        return response()->json([
            'materiallist' => $materiallist ,
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
     * @param  \App\Materiallist  $materiallist
     * @return \Illuminate\Http\Response
     */
    public function show(Materiallist $materiallist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Materiallist  $materiallist
     * @return \Illuminate\Http\Response
     */
    public function edit(Materiallist $materiallist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Materiallist  $materiallist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materiallist $materiallist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Materiallist  $materiallist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materiallist $materiallist)
    {
        //
    }
}
