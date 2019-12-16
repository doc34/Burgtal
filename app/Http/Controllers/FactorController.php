<?php

namespace App\Http\Controllers;

use App\Factor;
use Illuminate\Http\Request;

class FactorController extends Controller
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
    public function store(Request $request,Factor $factor)
    {
       $info='';
       $info=$request->info ;
       $facto=$request->factor;

       $flight = Factor::create(['factor' => $facto, 'info'=>$info ]);

       $fact= $factor->show();

       return response()->json( [
           'factor'=>$fact

       ] );




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Factor  $factor
     * @return \Illuminate\Http\Response
     */
    public function show(Factor $factor)
    {
        $fact= $factor->show();

        return response()->json( [
            'factor'=>$fact

        ] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Factor  $factor
     * @return \Illuminate\Http\Response
     */
    public function edit(Factor $factor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Factor  $factor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Factor $factor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Factor  $factor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Factor $factor)
    {
        //
    }
}
