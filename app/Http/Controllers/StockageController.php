<?php

namespace App\Http\Controllers;

use App\Models\Stockage;
use App\Librairies\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\Return_;

class StockageController extends Controller
{

       public function index()
       {
          return view('Pages.Stockage.index');
       }

       public function index_by_name()
       {
           return Response()->json(Stockage::where('name',Request('key'))->count());
       }

       public function index_by_name_edit()
       {
        return Response()->json(Stockage::where('name',Request('key'))->where('ref','!=',Request('ref'))->count());
   //     return Response()->json([Request('key'),Request('ref')]);
       }

       public function delete()
       {
          DB::table('stockages')->where('id',Request('ref'))
          ->delete();

          return Response()->json(Request('ref'));
       }

       public function store(Request $request)
       {
      
           $validator = Validator::make($request->all(), [
              'Nom'=>'required',
              'Prix_achat'=>'nullable|numeric',
              'Prix_vente'=>'required|numeric',
              'magazin'=>'nullable|numeric',
              'boutiq'=>'nullable|numeric',
              'nbrpaquet'=>'nullable|numeric',
              'nbrSeuil'=>'nullable|numeric',
           ]);
       
           if($validator->fails())
           {
               return  response()->json(['statut'=>'errors', 'message'=>$validator->errors()->first()]);
           }
           
              $art =  new Article();
              $art->setName($request->Nom);
              $art->setPrixAchat($request->Prix_achat);
              $art->setPrixVente($request->Prix_vente);
              $art->setNbrMagasin($request->magazin);
              $art->setNbrBoutique($request->boutiq);
              $art->setNbrPaquet($request->nbrpaquet);
              $art->setQte_seuil($request->nbrSeuil);
               $art->SaveProduct();
           return Response()->json(['statut'=>'success']);
       }



        public function update(Request $request)
        {
           
            $validator = Validator::make($request->all(), [
                'name'=>'required',
                'prix_achat'=>'nullable|numeric',
                'prix_vente'=>'required|numeric',
                'qte_magasin'=>'nullable|numeric',
                'qte_boutique'=>'nullable|numeric',
                'nombre_paquet'=>'nullable|numeric',
                'qte_seuil'=>'nullable|numeric',
             ]);
         
             if($validator->fails())
             {
                 return  response()->json(['statut'=>'errors', 'message'=>$validator->errors()->first()]);
             }

            $art =  new Article();
            $art->setName($request->name);
            $art->setPrixAchat($request->prix_achat);
            $art->setPrixVente($request->prix_vente);
            $art->setNbrMagasin($request->qte_magasin);
            $art->setNbrBoutique($request->qte_boutique);
            $art->setNbrPaquet($request->nombre_paquet);
            $art->setQte_seuil($request->qte_seuil);
            $art->setRef($request->ref);
             $art->SaveProduct();
            return Response()->json(['statut'=>'success']);

        }


        public function index_stockage()
        {
            return view('Pages.Stockage.Gestion_stockage');
        }

        public function index_mouvement()
        {
            return view('Pages.Stockage.mouvement_stockage');
        }


}
