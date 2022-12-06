<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


//spatie
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
        $permisos = [
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'eliminar-rol',
            //Reportes
            'ver-EDG-30',
            'ver-EDG-27',
            'ver-EDG-27-2',
            //Reportes de asistencia
            'ver-EDG-31-Asistencia',
            'crear-EDG-31-Asistencia',
            //Atletas
            'solicitud-Atletas',
            'listado-Atletas',
            //Configuraciones
            'ver-configuraciones',
            //Entrenadores
            'ver-Entrenadores',
            'registrar-Entrenadores',
            //Psicologa
            'registrar-Psicologo',
            'ver-Psicologos',
            'slider-crear',
            'slider-editar',
            'slider-ver',
            'notificaciones',
            'crear-Usuarios',
            'eliminar-Usuarios',
            'editarUsuarios',
            'otras-configuraciones',
            'ver-Tareas-Asignada',
            'crearTerapias',
            'lista-Terapias',
            'ver-listado-tareas',
            'asignar-Tareas',

        ];
        foreach($permisos as $permiso){
            Permission::create(['name' => $permiso]);
        }

    }
}
