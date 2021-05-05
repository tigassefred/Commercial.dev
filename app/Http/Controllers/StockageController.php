<?php

namespace App\Http\Controllers;



use App\Models\Stockage;
use App\Librairies\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StockageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Pages.Stockage.index');
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stockage  $stockage
     * @return \Illuminate\Http\Response
     */
    public function show(Stockage $stockage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stockage  $stockage
     * @return \Illuminate\Http\Response
     */
    public function edit(Stockage $stockage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stockage  $stockage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stockage $stockage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stockage  $stockage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stockage $stockage)
    {
        //
    }
}
