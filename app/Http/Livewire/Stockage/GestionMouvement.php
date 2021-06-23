<?php

namespace App\Http\Livewire\Stockage;

use Livewire\Component;
use App\Models\Stockage;
use Livewire\WithPagination;

class GestionMouvement extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $qte,$quantite_valeur;
    public $quantite_signe = '>';
    public $search;
    public function render()
    {
        return view('livewire.stockage.gestion-mouvement',[
            'Articles'=>Stockage::where('statut',1)
            ->where('name','like','%'.$this->search.'%')
              ->where('qte_magasin', $this->quantite_signe, intval($this->quantite_valeur))->paginate(),
        ]);
    }

    public function mise_a_jour($ref)
    {
        $article = Stockage::where('ref',$ref)->first();
        $article->qte_magasin += $this->qte;  
        $article->save();
        $this->qte = 0;
    }
}
