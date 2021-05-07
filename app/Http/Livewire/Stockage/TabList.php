<?php

namespace App\Http\Livewire\Stockage;

use Livewire\Component;
use App\Models\Stockage;

class TabList extends Component
{
    public $qte_magazin, $qte_boutique;
    public $filtre, $PageRow, $search;
    public $Nom, $Prix_vente, $Prix_achat, $boutiq, $magazin, $nbrpaquet, $nbrSeuil, $qte_boutique_signe,$qte_magazin_signe;

    protected $listeners =['RefreshArticle'=> '$refresh'];   
    public function render()
    {
        return view('livewire.stockage.tab-list', [
            'Articles' => Stockage::paginate(),
        ]);
    }

     public function change_state($ref,$data)
     {
        
         $article = Stockage::where('ref',$ref)->first();
     
        if($article->statut == 0)
        {
             $article->statut = 1;
        }else{
            $article->statut = 0;  
        }
  
        $article->save();

        dd($article);
     }
}