<?php

namespace App\Http\Livewire\User;
use Livewire\Component;
use App\Models\User as Utilisateur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

class Login extends Component
{
    public $telephone='70628420';
    public $password ='teste', $message,$css="d-none";

    public function render()
    {
        return view('livewire.user.login');
    }

    public function Connecting()
    {
          $user = Utilisateur::where('phone', $this->telephone)->first();
          Auth::attempt(['phone' => $this->telephone, 'password' => $this->password]);

          if( Auth::user() !== null)
          { 
            return redirect()->to('/');
          }else{
              dd( Auth::user());
            return redirect()->to('/');
          }
    
          if ($user !== NULL) {
               if (Hash::check($this->password, $user->password)) {
                   if($this->password === 'teste')
                   {
                       
                    //   return redirect()->route('password', ['parameterKey' => $this->telephone]);
                   
                       Auth::attempt(['phone' => $this->telephone, 'password' => $this->password]);
                       return redirect()->route('Dashboard');
     
                   }else{
                       Auth::attempt(['phone' => $this->telephone, 'password' => $this->password]);
                   }
               }else{
                   $this->CodeErreur(1); 
               }
          }   else{

             $this->CodeErreur(1);
          }
    }

    public function CodeErreur($codeErreur)
    {
         if($codeErreur === 1)
         {
             $this->message = "Vos information sont incorrect";
             $this->password = "";
             $this->css = "alert alert-danger ";
         }
    }

}
