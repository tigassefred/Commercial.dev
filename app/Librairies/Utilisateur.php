<?php

namespace App\Librairies;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Utilisateur
{
    use Reference;

    private $lastname, $firstname, $phone, $password, $Reference;

    public function __construct($ref = null)
    {
        if($ref !=null){
           $User = User::where('ref', $ref)->first();
           $this->setLastname($User->lastname);
           $this->setFirstname($User->firstname);
           $this->setPhonename($User->phone);
           $this->setReference($User->ref);
        }
    }

  
  
    public function UserArray()
    {
        return ['lastname'=>$this->lastname, 'firstname'=>$this->firstname, 'phone'=>$this->phone, 'ref'=>$this->Reference];
    }
    public function setLastname($variable)
    {
        $this->lastname = $variable;
    }
    public function setFirstname($variable)
    {
        $this->firstname = $variable;
    }
    public function setPhonename($variable)
    {
        $this->phone = $variable;
    }
    public function setPassword($variable)
    {
        $this->password = Hash::make($variable);
    }
    public function setReference($variable)
    {
        $this->Reference = $variable;
    }

    public function SaveUser()
    {
        if (empty($this->Reference)) {

            User::create([
                'ref' => Utilisateur::Make_user_ref(),
                'phone' => $this->phone,
                'lastname' => $this->lastname,
                'firstname' => $this->firstname,
                'name' => $this->lastname . ' ' . $this->firstname,
                'password'=>$this->password,
            ]);
        } else {

            $tab =  [
                'phone' => $this->phone,
                'lastname' => $this->lastname,
                'firstname' => $this->firstname,
                'name' => $this->lastname . ' ' . $this->firstname
            ];

            $user = User::where('ref', $this->Reference)->first();
            $user->update($tab);
            $user->save();

            $this->Reference = "";
        }
    }

    public function DeleteUser($Ref)
    {
        User::where('ref', $Ref)->delete();
    }

    public function EditUser(Utilisateur $me)
    {
    }
}
