<?php

namespace App\Http\Livewire\Vente;

use DateTime;
use App\Models\Client;
use App\Models\Panier;
use App\Models\PanierItem;
use Livewire\Component;
use App\Models\Stockage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class VenteSystem extends Component
{
    public $Search_article_to_sell;
    public $Response_articles;
    public $highlightIndex = 0;
    public $Article = [];

    public $nom_article,$prix_vente,$valeur_total,$quantite_article= 0; 

    public $numero_vente,$client_id,$qte_article,$valeur_panier,$remise=0;

    public $Panier = [];

    public $Response_client= [], $client_search,$client_search_tmp;

    public function mount(){
       $this->getVenteNumber();
    }

    public function render()
    {
        return view('livewire.vente.vente-system');
    }

    private function getVenteNumber()
    {
        $date =  new DateTime();
        $count =DB::select('select count(*) nombre from paniers where dayofyear(created_at)  =  dayofyear(now()) and id_vendeurs = ?',[Auth::user()->id]);
        $this->numero_vente =$date->format('dmy').'-'.Auth::user()->id.'-'.str_pad($count[0]->nombre +1,4,"0", STR_PAD_LEFT);
    }

    public function updatingSearchArticleToSell($value)
    {
        $this->Response_articles = Stockage::where('name', 'like', $value ."%")->take(5)->get()->toArray();

    }

    public function updatingClientSearch($value)
    {
        $this->Response_client = Client::where('name', 'like', $value ."%")->take(5)->get()->toArray();
        $this->client_search_tmp = $value;
    }

    private function Reset_search(){
        $this->Response_articles= [];
        $this->Search_article_to_sell = "";
        $this->highlightIndex = "";
    }

    public function hightlight_increment()
    {

        if ($this->highlightIndex === count($this->Response_articles) - 1) {
            $this->highlightIndex = 0;
            return;
        }
        $this->highlightIndex++;
    }

    public function hightlight_decrement()
    {
        if ($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->Response_articles) - 1;
            return;
        }
        $this->highlightIndex--;
    }

    public function selectItem($ref = null)
    { 
    
        if($ref !== null){
             $id = array_search($ref , array_column($this->Response_articles,'ref'));
           
             $this->load_card_items($this->Response_articles[$id]);

        }else{
           $this->load_card_items($this->Response_articles[$this->highlightIndex ]);
        }
    }

    private function load_card_items($panier){
        $this->Article['ref'] = $panier['ref'];
        $this->Article['ref_vente'] = $this->numero_vente;
        $this->Article['name'] = $panier['name'];
        $this->Article['prix_vente'] = $panier['prix_vente'];
        $this->View_article($this->Article);
    }

    private function View_article($Article){
        $this->nom_article=$Article['name'];
        $this->prix_vente = $Article['prix_vente'];
        $this->valeur_total =$Article['prix_vente'];
        $this->quantite_article= 1; 
        $this->Reset_search();
    }

    public function updatingQuantiteArticle($value)
    {
        if($value === ""){
            $this->valeur_total = $this->prix_vente * 0;
        }else{
            $this->valeur_total = $this->prix_vente * $value;
        }
    }

    public function updatingPrixVente($value)
    {
        if($value === ""){
            $this->valeur_total = $this->quantite_article * 0;
        }else{
            $this->valeur_total = $this->quantite_article * $value; 
        }
    }

    public function Add_Products()
    {
         if(trim($this->nom_article) !=="" && trim($this->valeur_total) !=="" ){
            $this->Article['name'] = $this->nom_article;
            $this->Article['prix_vente'] = $this->prix_vente ;
            $this->Article['prix_total']  = $this->valeur_total;
            $this->Article['quantite_article'] =  $this->quantite_article; 
   
           array_push($this->Panier , $this->Article);
           $this->Article = [];
           $this->nom_article="";
           $this->prix_vente ="";
           $this->valeur_total ="";
           $this->quantite_article= 0; 
           $this->Calculate_Panier();

         }
    }

    public function Increment_Panier($key)
    {
       $qte=  $this->Panier[$key]['quantite_article'];  
       $this->Panier[$key]['quantite_article'] = intval($qte)+1 ;  
       $this->Panier[$key]['prix_total'] = intval($this->Panier[$key]['quantite_article']  * $this->Panier[$key]['prix_vente']) ;  
       $this->Calculate_Panier();
    }

    public function Descrement_Panier($key)
    {
       $qte=  $this->Panier[$key]['quantite_article']; 
       if((intval($qte)-1) > 0 ){

           $this->Panier[$key]['quantite_article'] = intval($qte)-1 ;  
       } 
       $this->Panier[$key]['prix_total'] = intval($this->Panier[$key]['quantite_article']  * $this->Panier[$key]['prix_vente']) ;  
       $this->Calculate_Panier();
    }   
    public function Delete_Panier($key)
    {
       array_splice($this->Panier,$key ,1);
       $this->Calculate_Panier();
    }   

    private function Calculate_Panier()
    {
        $tab  = array_column($this->Panier, 'prix_total') ;
        $this->qte_article = count($tab);
        $this->valeur_panier = array_sum($tab);
    }

    public function Abandonner(){
        $this->Reset_search();
        $this->Panier = [];
        $this->Article = [];
        $this->nom_article="";
        $this->prix_vente ="";
        $this->valeur_total ="";
        $this->quantite_article= 0; 
        $this->qte_article =0;
        $this->remise =0;
        $this->valeur_panier = 0;
        $this->client_id = 1;
        $this->client_search = "Client Ordinaire";
    }

    public function Add_Article()
    {
        $this->dispatchBrowserEvent('event_add_article');
    }
    public function Add_Client()
    {
        $this->dispatchBrowserEvent('event_add_client');
    }
    
    public function SelectClient($id = "NULL"){
        
        if($id !== "NULL"){
            $id = array_search($id , array_column($this->Response_client,'id'));
           
           $this->client_search = $this->Response_client[$id]['name'];
           $this->client_id = $this->Response_client[$id]['id'];
           $this->Response_client= [];
           $this->client_search_tmp= "";
       }else{
              if($this->client_search === "Client Ordinaire" || count($this->Response_client) <= 0 )
              {
                $this->client_search_tmp = "";
                $this->client_id = 1;
                $this->client_search = "Client Ordinaire";
                $this->Response_client= [];
              }
       }
    }

    private function prepare_item_to_save($tableau) 
    {
        $tab = [];
        for ($i=0; $i < count($tableau) ; $i++) { 
           
             array_push($tab, [
                 'ref_vente'=>$tableau[$i]['ref_vente'],
                 'ref_article'=>$tableau[$i]['ref'],
                 'valeur'=>$tableau[$i]['prix_vente'],
                 'quantite'=>$tableau[$i]['quantite_article'],
                 'created_at'=>now(),
                 'updated_at'=>now(),
             ]);
        }
    
        return $tab;
    }

    private function Store_vente()
    {
        $Panier = 'null';
      DB::beginTransaction();  
        if(count($this->Panier)>0){

           $Panier =  Panier::create([
                        'ref'=>$this->numero_vente,
                        'id_vendeurs'=>Auth::user()->id,
                        'id_client'=> (intval($this->client_id) > 1) ?  $this->client_id : 1,
                        'valeurs'=>$this->valeur_panier,
                        'remise'=>trim($this->remise) === "" ? 0 : $this->remise,
                        'status'=>'non traite',
                   ]);
            $tableau_article_vente = $this->prepare_item_to_save($this->Panier);
            DB::table('panier_items')->insert($tableau_article_vente);   
            
            $this->Destockage($tableau_article_vente);
        }

      if($Panier->count()>0)
      {
        DB::commit();
      }else{
        DB::rollBack();
      }
       
         return $Panier;    
    }

    private function Destockage($tableau)
    {
            for ($i=0; $i < count($tableau); $i++) { 
                $Stockage =  Stockage::where('ref',$tableau[$i]['ref_article'])->first();
                 $Stockage->qte_boutique -= $tableau[$i]['quantite'];
                 $Stockage->save();
            }
    }

    public function Envoyer_caisse()
    {
       $Panier =  $this->Store_vente();
      if($Panier !== 'null')
      {
        $this->Abandonner();
        $this->getVenteNumber();
      }
        
    }
    public function Faire_paiement()
    {
        $Panier =  $this->Store_vente();
        if($Panier !== 'null')
        {
          $this->Abandonner();
          $reference = $this->numero_vente;
          $this->getVenteNumber();
          $this->dispatchBrowserEvent('event_cash_pay',['reference'=>$reference]);
        }
    }

  





    
}
