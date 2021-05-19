<?php

namespace App\Http\Livewire\Stockage;

use App\Models\Stockage;
use Livewire\Component;

class GestionMouvement extends Component
{
    public $qte;
    public function render()
    {
        return view('livewire.stockage.gestion-mouvement',[
            'Articles'=>Stockage::where('statut',1)->paginate(),
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
