<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use App\Models\Alumno;
use App\Models\Atleta;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
        $mostrarMes = "";
        switch ($this->obtenerMes){
            case 1:
                $mostrarMes = "Enero";
                break;
            case 2:
                $mostrarMes = "Febrero";
                break;
            case 3:
                $mostrarMes = "Marzo";
                break;
            case 4:
                $mostrarMes = "Abril";
                break;
            case 5:
                $mostrarMes = "Mayo";
                break;
            case 6:
                $mostrarMes = "Junio";
                break;
            case 7:
                $mostrarMes = "Julio";
                break;
            case 8:
                $mostrarMes = "Agosto";
                break;
            case 9:
                $mostrarMes = "Septiembre";
                break;
            case 10:
                $mostrarMes = "Octubre";
                break;
            case 11:
                $mostrarMes = "Noviembre";
                break;
            case 12:
                $mostrarMes = "Diciembre";
                break;
        }
        //return view('Reportes/RepFor30/exportar',compact('mostrarMes'));
        $mes = 0;
        $anio = 0;
        $diaActual = 15;
        $diaSiguiente = 15;
        if($this->obtenerMes == 12){
            $mes = 1;
            $anio = $this->obtenerAnio+1;
        }        
        else{
            $mes = $this->obtenerMes+1;
            $anio = $this->obtenerAnio;
        }

        $fechaActual = $this->obtenerAnio.'-'.$this->obtenerMes.'-'.$diaActual;
        $fechaSiguiente = $anio.'-'.$mes.'-'.$diaSiguiente;

        $fechaInicial = Carbon::createFromFormat('Y-m-d',$fechaActual);
        $fechaFinal = Carbon::createFromFormat('Y-m-d',$fechaSiguiente);
        $alumno = Alumno::where('correo',auth()->user()->email)->get();

        if(count($alumno)==1){
            $atleta = Atleta::where('alumno_id',$alumno[0]->id)->get();
            $asistencia = DB::table('asistencia')->whereBetween('fecha',[$fechaInicial,$fechaFinal])->where('atleta_id',$atleta[0]->id)->orderBy('fecha','asc')->get();
        }
        else{
            $asistencia = DB::table('asistencia')->whereBetween('fecha',[$fechaInicial,$fechaFinal])->orderBy('fecha','asc')->get();
        }

        $fecha = array();

        foreach($asistencia as $asis){
            if(in_array($asis->fecha,$fecha)==false){
                array_push($fecha,$asis->fecha);
            }
        }

        $atletas = array();

        if(count($alumno)==1){
            array_push($atletas,$atleta[0]->id);
        }
        else{
            foreach($asistencia as $asis){
                if(in_array($asis->atleta_id,$atletas)==false){
                    array_push($atletas,$asis->atleta_id);
                }
            }
            sort($atletas);
        }
        
        $mostrarAtletas = array();
        foreach($atletas as $atl){
            array_push($mostrarAtletas,$atl);
        }
        $estado = array();
        $asistenciaOrdenada = array();
        
        $asistencia = $asistencia->sortBy(function ($item) {
            return $item->fecha;
        })->sortBy(function ($item) {
            return $item->atleta_id;
        });

        foreach($asistencia as $asis){
            array_push($asistenciaOrdenada,$asis);
        }

        $controlDatos=0;
        $controlAtletas = 0;
        while(count($estado) !=count($fecha)*count($atletas)){
            for($i=0;$i<count($fecha);$i++){
                if($asistenciaOrdenada[$controlDatos]->atleta_id == $mostrarAtletas[$controlAtletas] && $asistenciaOrdenada[$controlDatos]->fecha == $fecha[$i]){
                    array_push($estado,$asistenciaOrdenada[$controlDatos]->estado);
                    $controlDatos++;
                }
                else{
                    array_push($estado,"");
                }
            }
            $controlAtletas++;
        }
        $atleta = Atleta::wherein('id',$mostrarAtletas)->with('alumno')->get();
        //Array que almacena la cantidad de días entrenados del Atleta
        $contarDias = array();

        //Array que almacena el promedio de días entrenados del Atleta
        $promedio = array();
        
        for($i=0;$i<count($mostrarAtletas);$i++){
            $dias = 0;
            $avg = 0;
            $diasEntrenados = 0;
            for($j=$i*count($fecha);$j<($i+1)*count($fecha);$j++){
                if($estado[$j]!=""){
                    if($estado[$j]=="X" || $estado[$j]=="L" || $estado[$j]=="C"){
                        $diasEntrenados++;
                    }
                    $dias++;
                }
            }
            $avg = round(($diasEntrenados/$dias)*100,2);
            array_push($contarDias,$diasEntrenados);
            array_push($promedio,$avg);
        }

        $fechas = [];

        foreach($fecha as $fch){
            $fc = Carbon::createFromFormat('Y-m-d',$fch);
            $fechas[] = $fc;
        }
        return view('Reportes/RepFor30/exportar',compact('fechas','atleta','promedio','contarDias','estado','mostrarMes','capturarAnio'));
    }
}
