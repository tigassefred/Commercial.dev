<?php

namespace App\Http\Controllers\Ventes;

use DateTime;
use App\Models\Panier;
use App\Models\Stockage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class VenteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('Pages.Vente.index');
    }

    public function Show($id)
    {
       $response = Panier::where('ref',$id)->first();
       $Date  = new DateTime($response->created_at);
       $valeur_calculer = $this->calculate_price($response->Item); 

       if($valeur_calculer  !== ($response->valeurs - $response->remise))
       {
          $response->valeurs = $valeur_calculer  ;
          $response->save();
       }
       $tab = new Collection([
             'reference' => $response->ref,
             'Date_vente' => $Date->format('d-m-Y H:i:s'),
             'Vendeur' => $response->Vendeur->name,
             'client' => $response->Client->name,
             'NbArticle' => count($response->Item),
             'valeur' => $response->valeurs - $response->remise ,
       ]);

        return Response()->json($tab);
    }
    
    
    private function calculate_price($tab)
    {
        $valeur = 0;
       for ($i=0; $i <count($tab) ; $i++) { 
            $valeur += $tab[$i]['valeur']*$tab[$i]['quantite'];
       }

       return $valeur;
    } 

    public function getAll()
    {
      $response =   DB::table('paniers')->join('clients','clients.id','id_client')
      ->whereRaw('dayofyear(paniers.created_at) = dayofyear(now())')
      ->where('id_vendeurs',Auth::user()->id)->take(10)
      ->orderBy('paniers.created_at','DESC')->get(['paniers.ref','name','id_client','valeurs','status']);

      return response()->json($response);
    }
  




   
  
}
