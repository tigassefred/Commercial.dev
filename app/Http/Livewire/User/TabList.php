<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Librairies\Utilisateur;

class TabList extends Component
{
    public function render()
    {
        return view('livewire.user.tab-list');
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
    }
}
