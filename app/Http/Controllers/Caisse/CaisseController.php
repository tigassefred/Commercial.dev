<?php

namespace App\Http\Controllers\Caisse;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CaisseController extends Controller
{
    public function Store(Request $resquest)
    {
        $tab = [
            'ref_vente'=>$resquest->ref,
            'caissier_id'=>Auth::user()->id,
            'valeur'=>$resquest->valeur,
            'sommes_remise'=>$resquest->sommes,
            'reste'=> $resquest->sommes - $resquest->valeur,
        ];

        if($tab['reste'] >= 0)
        {
            $tab['status'] = 'payer';
        }else{
            $tab['status'] = 'credit';
        }


      DB::table('caisses')->insert($tab);
      DB::table('paniers')->where('ref',$resquest->ref)->update(['status'=>'taite']);

        return Response()->json($resquest);
    }

    public function facture()
    {
        return view('Pages.Vente.facture');
    }

    public function abandonner(){
        DB::table('paniers')->where('ref',Request('ref'))->update(['status'=>'abandonne']);
    }
}
