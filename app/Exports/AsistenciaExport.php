<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\AsistenciaController;

class AsistenciaExport implements FromView
{
    protected $obtenerMes;
    protected $obtenerAnio;

    public function __construct($obtenerMes,$obtenerAnio){
        $this->obtenerMes = $obtenerMes;
        $this->obtenerAnio = $obtenerAnio;
    }

    public function view(): View
    {
        $capturarAnio = $this->obtenerAnio;
        $asistencia = new AsistenciaController();
        $datos = $asistencia->mostrarAsistencia($this->obtenerMes,$this->obtenerAnio);
        $fechas = $datos['fechas'];
        $atleta = $datos['atleta'];
        $promedio = $datos['promedio'];
        $contarDias = $datos['contarDias'];
        $estado = $datos['estado'];
        $mostrarMes = $datos['mostrarMes'];
        return view('Reportes/RepFor30/exportar',compact('fechas','atleta','promedio','contarDias','estado','mostrarMes','capturarAnio'));
    }
}
