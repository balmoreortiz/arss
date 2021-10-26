<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;

class SeederTableRoles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'root',
            'cliente'
        ];
        //
        $id = 1;
        foreach($roles as $rol){
            $role = Role::create(['id' => $id , 'name'=>$rol]);
            $id++;             
        }
    }
}
