<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class Password extends Component
{
    public $message,$password;
    
    public function render()
    {
        return view('livewire.user.password');
    }

    public function ChangePasse()
    { 
       
    

        $this->CodeErreur();
    }

    public function CodeErreur()
    {
        $this->message = "Vous devez changer votre mot de passe";
    }


}
