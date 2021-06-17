<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Librairies\Utilisateur;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \view('Pages.Users.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($ref)
    {
        $Utilisateur  = new Utilisateur($ref);
        return Response()->json($Utilisateur->UserArray());
    }

    public function Password(Request $request)
    {
      dd($request);
    }
    
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
  
}
