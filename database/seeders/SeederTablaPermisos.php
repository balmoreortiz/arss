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
            //Permisos para la tabla Servicio
            'ver-servicio',
            'crear-servicio',
            'editar-servicio',
            'eliminar-servicio',
            //Permisos para la tabla Respuesto
            'ver-repuesto',
            'crear-respuesto',
            'editar-respuesto',
            'eliminar-respuesto',
        ];
        foreach($permisos as $permiso){
            Permission::create(['name'=>$permiso]);
        }
    }
}
