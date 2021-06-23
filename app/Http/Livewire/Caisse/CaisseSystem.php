<?php

namespace App\Http\Livewire\Caisse;

use App\Models\Panier;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CaisseSystem extends Component
{
    public $lesVentes = [];
    public $Selling_ref,$Selling_value,$remise,$monnaie;

    public $Encaissement,$traite,$abandonne,$caisse;

    public function mount()
    {
        $this->listeDesVente();
    }

    public function render()
    {
        return view('livewire.caisse.caisse-system');
    }

    public function listeDesVente(){

          $this->lesVentes =  Panier::join('clients','clients.id','id_client')
                        ->join('users','users.id','id_vendeurs')
                        ->where('status','non traite')
                        ->select('paniers.*','lastname','firstname','users.name')
                        ->orderBy('paniers.created_at','DESC')
                        ->get()->toArray();
           $this->traite = Panier::where('status','traite')->count();             
           $this->abandonne = Panier::where('status','abandonne')->count();   
           
           $this->caisse =  DB::table('caisses')
           ->select(DB::raw('sum(valeur)-sum(reste) as somme'))->whereRaw('dayofyear(created_at) =  dayofyear(now())')->get();


    }

    public function SendToPay($ref)
    {
        $P = Panier::where('ref',$ref)->first();

        $this->Selling_ref = $ref;
        $this->Selling_value = $P->valeurs;
        $this->remise = $P->remise;
        $this->monnaie = 0;
    }

    public function updatingEncaissement($value)
    {
      $this->monnaie = $value -  $this->Selling_value ;
    }

    public function Paid()
    {
        if(Str::length($this->Selling_ref) > 5){
            $tab = [
                'ref_vente'=>$this->Selling_ref,
                'caissier_id'=>Auth::user()->id,
                'valeur'=>$this->Selling_value,
                'sommes_remise'=>$this->Encaissement,
                'reste'=> ($this->Encaissement - $this->Selling_value) >= 0 ? 0 :  $this->Selling_value-$this->Encaissement,
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
          DB::table('paniers')->where('ref',$this->Selling_ref)->update(['status'=>'traite']);
          return true;
        }
        return false;
    }

    public function Encaissement(){

          if($this->Paid()){
            $this->listeDesVente();
        
            $this->Selling_ref = '';
            $this->Selling_value = '';
            $this->remise = 0;
            $this->monnaie = 0;
            $this->Encaissement = 0;
          }
        }
    

        public function Encaissement_facture()
        {
            $ref = $this->Selling_ref;
        
            if($this->Paid()){
                $this->listeDesVente();
                
                $this->Selling_ref = '';
                $this->Selling_value = '';
                $this->remise = 0;
                $this->monnaie = 0;
                $this->Encaissement = 0;

                $this->dispatchBrowserEvent('event_print_build',['ref'=>$ref]);
             }
        }

        private function Paid_credit(){
            if(Str::length($this->Selling_ref) > 5){
                $tab = [
                    'ref_vente'=>$this->Selling_ref,
                    'caissier_id'=>Auth::user()->id,
                    'valeur'=>$this->Selling_value,
                    'sommes_remise'=>0,
                    'reste'=> $this->Selling_value,
                    'status'=> 'credit',
                ];
        
        
              DB::table('caisses')->insert($tab);
              DB::table('paniers')->where('ref',$this->Selling_ref)->update(['status'=>'traite']);
              return true;
            }
            return false;
        }

        public function Encaissement_credit()
        {
            if($this->Paid_credit()){
                $this->listeDesVente();
            
                $this->Selling_ref = '';
                $this->Selling_value = '';
                $this->remise = 0;
                $this->monnaie = 0;
                $this->Encaissement = 0;
              }
        }
        public function Encaissement_credit_facture()
        {
            $ref = $this->Selling_ref;
            if($this->Paid_credit()){
                $this->listeDesVente();
                $this->Selling_ref = '';
                $this->Selling_value = '';
                $this->remise = 0;
                $this->monnaie = 0;
                $this->Encaissement = 0;

                $this->dispatchBrowserEvent('event_print_build',['ref'=>$ref]);
              }
        }

        public function Abandonner(){
            if(Str::length($this->Selling_ref) > 5){

                $P = Panier::where('ref',$this->Selling_ref)->first();
                $P->status = 'abandonne';
                $P->save();
                $this->listeDesVente();
                $this->Selling_ref = '';
                $this->Selling_value = '';
                $this->remise = 0;
                $this->monnaie = 0;
                $this->Encaissement = 0;
            }   
        }
}
