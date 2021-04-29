<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::where('ref', $request->role_ref)->first();
        $user->Role()->detach(Role::where('name','supervisseur')->first()->pluck('id'));  

        if(isset($request->supervisseur))
        {
            $user->Role()->attach(Role::where('name','supervisseur')->first()->id);
        }else{
            $user->Role()->detach(Role::where('name','supervisseur')->first()->id);  
        }
        if(isset($request->stockage))
        {
            $user->Role()->attach(Role::where('name','stockage')->first()->id);
        }else{
            $user->Role()->detach(Role::where('name','stockage')->first()->id);  
        }
        if(isset($request->caissier))
        {
            $user->Role()->attach(Role::where('name','caissier')->first()->id);
        }else{
            $user->Role()->detach(Role::where('name','caissier')->first()->id);  
        }
        if(isset($request->vendeur))
        {
            $user->Role()->attach(Role::where('name','vendeur')->first()->id);
        }else{
            $user->Role()->detach(Role::where('name','vendeur')->first()->id);  
        }

        return Response()->json($user);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ref)
    {
        return Response()->json(User::where('ref',$ref)->first()->Role);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
