<?php

namespace App\Http\Controllers;

use App\Kunden;
use DB;

use App\Kundennummer;
use App\Lieferant;
use Auth;

use Illuminate\Http\Request;

class KundenController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function info()
    { }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kunde = DB::table('kundens')->paginate(15);

        return response()->json([
            'kunde' => $kunde,

            'page' => 'Kunden'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ln = '';
        $kn = '';
        $lief='';
        $kun='';

        $random = time();
        $user = Auth::user();
        $lief=$request->lieferantenconf;
        $kun=$request->kundenconf;
        $lcod=DB::table('burtalconfs')->where('key','LIEFERANT_COD')->first();
        $kcod=DB::table('burtalconfs')->where('key','KUNDEN_COD')->first();
        $knumm=DB::table('burtalconfs')->where('key','KUNDEN_NUMM')->first();

        if ($kun == 1 ) {
            $Kundennum = new Kundennummer;
            $Kundennum->random = $random;
            $Kundennum->user_id = $user->id;
            $Kundennum->save();
            $NUM = Kundennummer::where('random', $random)->first();
            $kn = $kcod->var . ($NUM->id + $knumm->var);

            Kundennummer::where('random', $random)
                ->update(['num' => $kn]);
        }


        if ( $lief == 1 ) {
            $Lieferantnum = new Lieferant;
            $Lieferantnum->random = $random;
            $Lieferantnum->user_id = $user->id;
            $Lieferantnum->save();
            $lNUM = Lieferant::where('random', $random)->first();
            $ln = $lcod->var. ($lNUM->id +  $knumm->var);
            Lieferant::where('random', $random)
                ->update(['num' => $ln]);

        }


       $kunde = new Kunden;
        $kunde->kundeconf = $request->kundenconf;
        $kunde->lieferantconf = $request->lieferantenconf;
        $kunde->kundennum = $kn;
        $kunde->lieferantnum = $ln;
        $kunde->anrede_id = $request->anredeid;
        $kunde->partnertype_id = $request->partnertypeid;
        $kunde->alias = $request->alias;
        $kunde->name = $request->name;
        $kunde->vorname = $request->vorname;
        $kunde->adresse = $request->strasse;
        $kunde->plz = $request->plz;
        $kunde->ort = $request->ort;
        $kunde->land_id = $request->land_id;
        $kunde->tel = $request->tel;
        $kunde->handy = $request->handy;
        $kunde->email = $request->email;
        $kunde->steuernumme = $request->steuernumme;
        $kunde->handelnummer = $request->handelnummer;
        $kunde->umsatzsteuerpflichtig = $request->umsatzsteuerpflichtig;
        $kunde->umsatzsteuer_id = $request->umsatzsteuerid;
        $kunde->rechtsform_id = $request->rechtsformid;
        $kunde->user_id = $user->id;
        $kunde->save();

        return response()->json([
            'kundennum' =>  $kn,
            'page'=>$request->page
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kunden  $kunden
     * @return \Illuminate\Http\Response
     */
    public function searchQuery(Request $request, Kunden $kunden)
    {

        $kunde = DB::table('kundens')
        ->where('kundeconf', '=', '1')
        ->Where('name', 'LIKE',  $request->suchen . '%')

            ->paginate(15);




        return response()->json([
            'kunde' => $kunde,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kunden  $kunden
     * @return \Illuminate\Http\Response
     */
    public function show(Kunden $kunden)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kunden  $kunden
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kunden $kunden)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kunden  $kunden
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kunden $kunden)
    {
        //
    }
}
