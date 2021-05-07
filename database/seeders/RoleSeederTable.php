<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('insert into roles (id, name) values (?, ?)', [1, 'supervisseur']);
        DB::insert('insert into roles (id, name) values (?, ?)', [2, 'stockage']);
        DB::insert('insert into roles (id, name) values (?, ?)', [3, 'caissier']);
        DB::insert('insert into roles (id, name) values (?, ?)', [4, 'vendeur']);

    }
}
