<?php

namespace App\Http\Livewire\User;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use App\Librairies\Utilisateur;

class TabList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $qry;

    protected $listeners = [
        'RefreshUserList'=>'$refresh'
    ];
     
    
    public function render()
    {
        return view('livewire.user.tab-list',
        ['Users'=>user::where('name','like', '%'.$this->qry.'%')->paginate(10),]
       );
    }

    public function store(Request $request)
    {   $Utilisateur =  Null;
        if(isset($request->ref))
        {
            $Utilisateur =  new Utilisateur($request->ref);
        }else{
            $Utilisateur =  new Utilisateur();
            $Utilisateur->setPassword("teste");
            $Utilisateur->setReference("");
        }
      
         $Utilisateur->setLastname($request->lastname);
         $Utilisateur->setFirstname($request->firstname);
         $Utilisateur->setPhonename($request->phone);
         $Utilisateur->SaveUser();

         return response()->json($Utilisateur);
    }

    public function destroy($ref)
    {  
        $user = User::where('ref', $ref)->first();
        $user->Role()->detach(Role::all()->pluck('id'));
        User::destroy($user->id);  
        return back();
    }

    public function Statut($ref)
    {
        $user = User::where('ref', $ref)->first();
        if($user === 0)
             $user->statut = 1;
         else
           $user->statut  = 1;    

           $user->save();
    }
}
