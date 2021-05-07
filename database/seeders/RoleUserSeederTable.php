<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class RoleUserSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =  User::where('ref','YARN_DEV')->first();
     
            $user->Role()->attach(Role::where('name','supervisseur')->first()->id);
  
            $user->Role()->attach(Role::where('name','stockage')->first()->id);
   
            $user->Role()->attach(Role::where('name','caissier')->first()->id);

            $user->Role()->attach(Role::where('name','vendeur')->first()->id);
    }
}
