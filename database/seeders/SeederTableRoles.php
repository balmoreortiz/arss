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
            if($id==1)
                $role->syncPermissions(['1','2', '3', '4','4','5','6','7','8','9','10','11','12','13','14','15','16']);
            else
                $role->syncPermissions(['9','13']);
            $id++;             
        }
    }
}
