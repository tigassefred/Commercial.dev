<?php

namespace App\Http\Livewire\Stockage;

use Livewire\Component;
use App\Models\Stockage;
use Livewire\WithPagination;

class TabList extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $qte_magazin = -1;
    public $qte_boutique = -1;
    public $filtre = 1, $PageRow=25, $search;
    public $Nom, $Prix_vente, $Prix_achat, $boutiq, $magazin, $nbrpaquet, $nbrSeuil;
    public $qte_boutique_signe = '>',$qte_magazin_signe = '>';

    protected $listeners =['RefreshArticle'=> '$refresh'];   
    public function render()
    {
        return view('livewire.stockage.tab-list', [
            'Articles' => Stockage::where('statut',$this->filtre)
                      ->where('name','like','%'.$this->search.'%')
                      ->where('qte_magasin',$this->qte_magazin_signe,intval($this->qte_magazin))
                      ->where('qte_boutique',$this->qte_boutique_signe,intval($this->qte_boutique))
                      ->OrderBy('name','DESC')->paginate($this->PageRow),
        ]);
    }

     public function change_state($ref)
     {
           $article = Stockage::where('ref',$ref)->first();
           ($article->statut == 0) ? $article->statut = 1: $article->statut = 0;  
            $article->save();
     }


     public function launchToEdit($ref)
     {  
           $response = Stockage::where('ref',$ref)->first();
           $this->dispatchBrowserEvent('event-edit', ['response' => $response]);
     }

     public function Delete($ref)
     {
         Stockage::destroy($ref);
     }

}
