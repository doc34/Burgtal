<?php

namespace App\Http\Controllers;

use App\Block;
use App\UnTafel;
use Auth;
use Illuminate\Http\Request;
use DB;
class UnTafelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $block = DB::table('blocks')
        ->leftJoin('arts', 'arts.id', '=', 'blocks.art_id')
        ->leftJoin('materials', 'materials.id', '=', 'blocks.material_id')
        ->leftJoin('starcks', 'starcks.id', '=', 'blocks.stark_id')
        ->select('materials.material','arts.art','starcks.stark',  'blocks.*')
        ->where('blocks.del', '=', NULL)
        ->orderBy('blocks.created_at', 'desc')
        ->get();
        return response()->json(
            ["block" => $block]

        );


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
        /*
        $request->bolck:1575033471420
        $request->breite:"1,85"
        $request->kundenid:31
        $request->leange:"2,80"
        $request->materialid:1
        $request->materiallistid:1
        $request->starkid:4
        $request->stuek:"12"
 $table->unsignedBigInteger('block_lieferantnum');
            $table->unsignedBigInteger('art_id');
            $table->unsignedBigInteger('stark_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('material_id');
            $table->unsignedBigInteger('materiallist_id');
s_qm



 */



        $user = Auth::user();

        /*
$blockt = Block::firstOrCreate([
    'block' => $request->bolck,
    'material_id' => $request->materialid,
    'art_id' => $request->artidk,
    'stark_id' => $request->starkid,
    'materiallist_id' => $request->materiallistid,
    'lieferant_id' => $request->kundenid,
    's_qm' => $qm,
    'user_id'=>$user->id
    ]); */


        $block = new Block;
        $block->block = $request->bolck;
        $block->material_id = $request->materialid;
        $block->art_id = $request->artid;
        $block->stark_id = $request->starkid;
        $block->materiallist_id = $request->materiallistid;
        $block->lieferant_id = $request->kundenid;
        $block->s_qm = $request->sqm;
        $block->user_id = $user->id;
        $block->save();

        $blockid = db::table('blocks')->where('block', $request->bolck)->first();
        for ($i = 1; $i <= $request->stuek; $i++) {


            $um = new UnTafel;
            $um->leange = $request->leange * 1000;
            $um->breite = $request->breite * 1000;
            $um->um_nr = $i;
            $um->qm = $request->leange*$request->breite;
            $um->block_id = $blockid->id;
            $um->save();
        }

        $um = DB::table('blocks')
        ->leftJoin('arts', 'arts.id', '=', 'blocks.art_id')
        ->leftJoin('materials', 'materials.id', '=', 'blocks.material_id')
        ->leftJoin('starcks', 'starcks.id', '=', 'blocks.stark_id')
        ->select('materials.material','arts.art','starcks.stark',  'blocks.*')
        ->where('blocks.del', '=', NULL)
        ->orderBy('blocks.created_at', 'desc')

        ->get();

        return response()->json(
            ["block" => $um]

        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UnTafel  $unTafel
     * @return \Illuminate\Http\Response
     */
    public function show(UnTafel $unTafel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UnTafel  $unTafel
     * @return \Illuminate\Http\Response
     */
    public function edit(UnTafel $unTafel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UnTafel  $unTafel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnTafel $unTafel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UnTafel  $unTafel
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnTafel $unTafel)
    {
        //
    }
}
