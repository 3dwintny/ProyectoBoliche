<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\EDG272Controller;
use App\Http\Controllers\AsistenciaController;
use Carbon\Carbon;

class EDG272Export implements FromView
{
    public function view(): View
    {
        $fecha = Carbon::now();
        $mes = Carbon::parse($fecha)->format('m');
        $capturarAnio = Carbon::parse($fecha)->format('Y');
        $meses = new AsistenciaController();
        $mostrarMes = $meses->mesLetras($mes);
        $edg272 = new EDG272Controller();
        $atletas = $edg272->bitacoraExcel();
        $fechasNacimiento = array();
        $fechaCompleta = "";
        foreach($atletas as $atleta){
            $fechaNacimiento = Carbon::parse($atleta->alumno->fecha);
            $fechaCompleta = $fechaNacimiento->day . "/" . strtolower($meses->mesLetras($fechaNacimiento->month)) . "/" . $fechaNacimiento->year;
            array_push($fechasNacimiento,$fechaCompleta);
        }
        return view('Reportes/edg272/exportar',compact('atletas','mostrarMes','capturarAnio','fechasNacimiento'));
    }
}
