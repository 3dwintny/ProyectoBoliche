<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\EDG31Controller;
use App\Http\Controllers\AsistenciaController;
use Carbon\Carbon;

class EDG31Export implements FromView
{
    public function view(): View
    {
        $fecha = Carbon::now();
        $mes = Carbon::parse($fecha)->format('m');
        $capturarAnio = Carbon::parse($fecha)->format('Y');
        $meses = new AsistenciaController();
        $mostrarMes = $meses->mesLetras($mes);
        $edg31 = new EDG31Controller();
        $datos = $edg31->showData();
        $atletasFederados = $datos['atletasFederados'];
        $atletasOtrosProgramasAtenction = $datos['atletasOtrosProgramasAtenction'];
        $atletasDeporteAdaptado = $datos['atletasDeporteAdaptado'];
        $totalFemeninas = $datos['totalFemeninas'];
        $totalMasculinos = $datos['totalMasculinos'];
        $totalAtletas = $datos['totalAtletas'];
        return view('Reportes/edg31/exportar',compact('atletasDeporteAdaptado','atletasOtrosProgramasAtenction','atletasFederados','mostrarMes','capturarAnio','totalFemeninas','totalMasculinos','totalAtletas'));
    }
}