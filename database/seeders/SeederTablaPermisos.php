<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//Spatie
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Deficion roles
        $permisos =[
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',
            //Permisos para CRUD
        ];
        foreach($permisos as $permiso){
            Permission::create(['name'=>$permiso]);
        }
    }
}
