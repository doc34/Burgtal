<?php

namespace App\Http\Controllers;
use DB;
use App\EKPreise;
use Illuminate\Http\Request;

class EKPreiseController extends Controller
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
     * @param  \App\EKPreise  $eKPreise ckeckpreis
     * @return \Illuminate\Http\Response
     */
    public function showmin(EKPreise $eKPreise , Request $request)
    {
        $showmin = DB::table('ekpreises')
        ->leftJoin('kundens', 'kundens.id', '=', 'ekpreises.kunde_id')
        ->orderby('produkt_id')
        ->select('ekpreises.*', 'kundens.name', 'kundens.alias' )
        ->where('ekpreises.material_id' , $request->material_id)
        ->get();




    return response()->json( [
        'showmin'=>$showmin,

    ] );
    }
     /**
     * Display the specified resource.
     *
     * @param  \App\EKPreise  $eKPreise ckeckpreis
     * @return \Illuminate\Http\Response
     */
    public function ckeckpreis(EKPreise $eKPreise , Request $request)
    {

        



        $showmin = DB::table('ekpreises')
        ->leftJoin('kundens', 'kundens.id', '=', 'ekpreises.kunde_id')
        ->orderby('produkt_id')
        ->select('ekpreises.*', 'kundens.name', 'kundens.alias' )
        ->where('ekpreises.material_id' , $request->material_id)
        ->get();




    return response()->json( [
        'showmin'=>$showmin,

    ] );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EKPreise  $eKPreise
     * @return \Illuminate\Http\Response
     */
    public function show(EKPreise $eKPreise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EKPreise  $eKPreise
     * @return \Illuminate\Http\Response
     */
    public function edit(EKPreise $eKPreise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EKPreise  $eKPreise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EKPreise $eKPreise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EKPreise  $eKPreise
     * @return \Illuminate\Http\Response
     */
    public function destroy(EKPreise $eKPreise)
    {
        //
    }
}
