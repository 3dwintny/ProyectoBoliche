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
            'Administración',
            'Listar roles',
            'Crear roles',
            'Editar roles',
            'Eliminar roles',
            //Reportes
            'Reporte EDG-31',
            'Reporte EDG-27',
            'Reporte EDG-27-2',
            //Reportes de asistencia
            'Reporte EDG-30',
            'Toma de asistencia',
            'Editar asistencia',
            //Atletas
            'Solicitudes pendientes',
            'Listar atletas',
            'Eliminar atletas',
            'Editar atletas',
            'Asistencia personal',
            'Perfil de atleta',
            'Información de encargados',
            'Actividad casa',
            'Actividad asignada',
            //Configuraciones
            'Configuración',
            //Entrenadores
            'Listar entrenadores',
            'Registrar entrenadores',
            'Perfil de entrenador',
            'Asignar entreno',
            //Psicologa
            'Registrar psicólogos',
            'Listar psicólogos',
            'Crear slider',
            'Editar slider',
            'Ver slider',
            'Notificaciones',
            'Crear administradores',
            'Eliminar administradores',
            'Editar administradores',
            'Otras configuraciones',
            'Listar tarea asignada',
            'Registrar sesiones',
            'Listar sesiones',
            'Ver listado de tareas',
            'Asignar tarea',
            'Seguridad',
            'Perfil psicólogo',
            'Editar código de correo',
            //Funcionalidades del sedevar
            'Menú de atleta',
            'Menú de entrenador',
            'Menú de psicología',
        ];
        foreach($permisos as $permiso){
            Permission::create(['name' => $permiso]);
        }

    }
}
