<?php

namespace App\Http\Controllers\Caisse;


use App\Models\Caisse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class CaisseController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('Pages.Caisse.index');
    }

    public function Store(Request $resquest)
    {
        $tab = [
            'ref_vente'=>$resquest->ref,
            'caissier_id'=>Auth::user()->id,
            'valeur'=>$resquest->valeur,
            'sommes_remise'=>$resquest->sommes,
            'reste'=> ($resquest->sommes - $resquest->valeur) < 0 ? (-1*($resquest->sommes - $resquest->valeur)) : 0 ,
            'created_at'=>now(),
            'updated_at'=>now(),
        ];

        if($tab['reste'] >= 0)
        {
            $tab['status'] = 'payer';
        }else{
            $tab['status'] = 'credit';
        }


      DB::table('caisses')->insert($tab);
      DB::table('paniers')->where('ref',$resquest->ref)->update(['status'=>'traite']);

        return Response()->json($resquest);
    }

    public function facture()
    {
          Gen_facture();
    }

    public function abandonner(){
        DB::table('paniers')->where('ref',Request('ref'))->update(['status'=>'abandonne']);
    }

    public function liste(){
        $response =  Caisse::join('paniers','paniers.ref','caisses.ref_vente')->join('clients','clients.id','paniers.id_client')
        ->OrderBy('caisses.created_at','DESC')
        ->where('paniers.status','traite')
        ->select('paniers.*','name')->paginate(20);
        return view('Pages.Caisse.historique')->with('caisses',$response);
    }
}
