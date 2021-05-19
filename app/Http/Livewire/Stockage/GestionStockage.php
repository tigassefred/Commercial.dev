<?php

namespace App\Http\Livewire\Stockage;

use App\Models\Stockage;
use Livewire\Component;

class GestionStockage extends Component
{
    protected $listeners =['RefreshForCount'=> '$refresh']; 
    public $count = 0;
    public $search;


    public function render()
    {
        return view('livewire.stockage.gestion-stockage',[
            'Articles' => Stockage::Where('statut', 1)
                       ->where('name','like','%'.$this->search.'%')->paginate(25),
        ]);
    }


    public function countInc($ref)
    {
        $article = Stockage::where('ref',$ref)->first();
        if($this->count === 0){
            if($article->qte_magasin > 0)
            {
                $article->qte_magasin -=1;   
                $article->qte_boutique +=1;  
            }

        }   else{

               if($this->count <0){$this->count *= (-1);}
                $article->qte_magasin -=$this->count;   
                $article->qte_boutique +=$this->count; 
        }
        $article->save(); 
    }


    public function countDesc($ref)
    {
        $article = Stockage::where('ref',$ref)->first();
        if($this->count === 0){
            if($article->qte_boutique > 0)
            {
                $article->qte_magasin +=1;   
                $article->qte_boutique -=1;  
            }  
        }   else{

                if($this->count <0){$this->count *= (-1);}
                $article->qte_magasin +=$this->count;   
                $article->qte_boutique -=$this->count; 
        }
        $article->save(); 
    }


}
