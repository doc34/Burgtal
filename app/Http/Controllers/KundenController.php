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
        $knumm = env("KUNDEN_NUMM");
        $kcod = env("KUNDEN_COD");
        $lcod = env("LIEFERANT_COD");
        $random = time();
        $user = Auth::user();
        $lief=$request->lieferantenconf;
        $kun=$request->kundenconf;



        if ($kun == 1 ) {
            $Kundennum = new Kundennummer;
            $Kundennum->random = $random;
            $Kundennum->user_id = $user->id;
            $Kundennum->save();
            $NUM = Kundennummer::where('random', $random)->first();
            $kn = $kcod . ($NUM->id + $knumm);

            Kundennummer::where('random', $random)
                ->update(['num' => $kn]);
        }


        if ( $lief == 1 ) {
            $Lieferantnum = new Lieferant;
            $Lieferantnum->random = $random;
            $Lieferantnum->user_id = $user->id;
            $Lieferantnum->save();
            $lNUM = Lieferant::where('random', $random)->first();
            $ln = $lcod . ($lNUM->id + $knumm);
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
        return response()->json();
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
