<?php

namespace App\Http\Controllers;

use App\Material;
use DB;
use Image;
use Illuminate\Http\Request;

class MaterialController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        //
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        //
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {
        $material = new Material;
        $material->material = $request->material;
        $material->m_cod = $request->m_cod;
        $material->calk = $request->calk;
        $material->save();

        $material = DB::table( 'materials' )
        ->orderBy('material', 'desc')
        ->paginate( 15 );
        return response()->json( [
            'material' => $material ,
        ] );
    }
    /**
    * Display the specified resource.
    *
    * @param  \App\Material  $kunden
    * @return \Illuminate\Http\Response
    */

    public function searchQuery( Request $request, Material $material ) {

        $material = DB::table( 'materials' )
        ->Where( 'material', 'LIKE',  $request->suchen . '%' )
        ->orderBy('material','asc')
        ->paginate( 15 );

        return response()->json( [
            'material' => $material ,
        ] );
    }
    /**
    * Display the specified resource.
    *
    * @param  \App\Material  $material
    * @return \Illuminate\Http\Response
    */

    public function show( Material $material ) {
        $material = DB::table( 'materials' )
        ->orderBy('material', 'asc')
        ->paginate( 15 );
        return response()->json( [
            'material' => $material ,
        ] );
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Material  $material
    * @return \Illuminate\Http\Response
    */

    public function edit( Material $material, Request $request ) {
        $material = DB::table( 'materials' )
        ->Where( 'id',  $request->id )->first();
        return response()->json( [
            'material' => $material ,
        ] );
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Material  $material
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, Material $material ) {

        $material = Material::find( $request->id );
        $material->material = $request->material;
        $material->m_cod = $request->m_cod;
        $material->calk = $request->calk;
        $material->save();

        $material = DB::table( 'materials' )
        ->orderBy('material', 'desc')
        ->paginate( 15 );
        return response()->json( [
            'material' => $material ,
        ] );

    }
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Material  $material
    * @return \Illuminate\Http\Response
    */

    public function updateimg( Request $request, Material $material, $id ) {
        $path = '/storage/material/';
        $material = Material::find( $id );

        $filenamewithextension = $request->file->getClientOriginalName();
        $fileName = $material->material.'.'.$request->file->getClientOriginalExtension();
        // $fileName = $request->data( 'material' ).'.'.$request->file->getClientOriginalExtension();
        $request->file->move( public_path( $path ), $fileName );

        $material = Material::find( $id );
        $material->img = $path.$fileName;
        $material->save();

        return $this->show();
    }
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Material  $material
    * @return \Illuminate\Http\Response
    */

    public function destroy( Request $request, Material $material ) {
        Material::destroy( $request->id );

        return $this->show();
    }
}
