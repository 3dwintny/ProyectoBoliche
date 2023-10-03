<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\EDG272Controller;
use App\Http\Controllers\AsistenciaController;
use Carbon\Carbon;

class EDG27Export implements FromView
{
    public function view(): View
    {
        $fecha = Carbon::now();
        $mes = Carbon::parse($fecha)->format('m');
        $capturarAnio = Carbon::parse($fecha)->format('Y');
        $meses = new AsistenciaController();
        $mostrarMes = $meses->mesLetras($mes);
        $edg27 = new EDG27Controller();
        $atletas = $edg27->bitacoraExcel();
        return view('Reportes/edg27/exportar',compact('atletas','mostrarMes','capturarAnio'));
    }
}
