<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atleta;
use App\Models\Etapa_Deportiva;
use App\Models\Deporte;
use App\Models\Departamento;
use PDF;
use Carbon\Carbon;

class EDG31Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atletas = Atleta::where('estado','activo')->get();
        $etapa = Etapa_Deportiva::all();

        //FEDERADOS
        $s9=array();
        $s11=array();
        $s13=array();
        $s16=array();
        $s18=array();
        $s21=array();
        $sSF=array();
        $sM=array();
        for($i=0;$i<count($etapa)*2;$i++){
            array_push($s9,0);
            array_push($s11,0);
            array_push($s13,0);
            array_push($s16,0);
            array_push($s18,0);
            array_push($s21,0);
            array_push($sSF,0);
            array_push($sM,0);
        }

        $contadorFS9I=0;
        $contadorMS9I=0;
        $contadorFS9D=0;
        $contadorMS9D=0;
        $contadorFS9P=0;
        $contadorMS9P=0;
        $contadorFS9E=0;
        $contadorMS9E=0;
        $contadorFS9A=0;
        $contadorMS9A=0;

        $contadorFS11I=0;
        $contadorMS11I=0;
        $contadorFS11D=0;
        $contadorMS11D=0;
        $contadorFS11P=0;
        $contadorMS11P=0;
        $contadorFS11E=0;
        $contadorMS11E=0;
        $contadorFS11A=0;
        $contadorMS11A=0;

        $contadorFS13I=0;
        $contadorMS13I=0;
        $contadorFS13D=0;
        $contadorMS13D=0;
        $contadorFS13P=0;
        $contadorMS13P=0;
        $contadorFS13E=0;
        $contadorMS13E=0;
        $contadorFS13A=0;
        $contadorMS13A=0;

        $contadorFS16I=0;
        $contadorMS16I=0;
        $contadorFS16D=0;
        $contadorMS16D=0;
        $contadorFS16P=0;
        $contadorMS16P=0;
        $contadorFS16E=0;
        $contadorMS16E=0;
        $contadorFS16A=0;
        $contadorMS16A=0;

        $contadorFS18I=0;
        $contadorMS18I=0;
        $contadorFS18D=0;
        $contadorMS18D=0;
        $contadorFS18P=0;
        $contadorMS18P=0;
        $contadorFS18E=0;
        $contadorMS18E=0;
        $contadorFS18A=0;
        $contadorMS18A=0;

        $contadorFS21I=0;
        $contadorMS21I=0;
        $contadorFS21D=0;
        $contadorMS21D=0;
        $contadorFS21P=0;
        $contadorMS21P=0;
        $contadorFS21E=0;
        $contadorMS21E=0;
        $contadorFS21A=0;
        $contadorMS21A=0;

        $contadorFSFI=0;
        $contadorMSFI=0;
        $contadorFSFD=0;
        $contadorMSFD=0;
        $contadorFSFP=0;
        $contadorMSFP=0;
        $contadorFSFE=0;
        $contadorMSFE=0;
        $contadorFSFA=0;
        $contadorMSFA=0;

        $contadorFMI=0;
        $contadorMMI=0;
        $contadorFMD=0;
        $contadorMMD=0;
        $contadorFMP=0;
        $contadorMMP=0;
        $contadorFME=0;
        $contadorMME=0;
        $contadorFMA=0;
        $contadorMMA=0;

        //OTROS PROGRAMAS DE ATENCIÓN
        $practicantes = array();
        $discapacidad = array();
        $veteranos = array();
        for($i=0;$i<12;$i++){
            array_push($practicantes,0);
            array_push($discapacidad,0);
            array_push($veteranos,0);
        }

        $fPracticantes12 = 0;
        $mPracticantes12 = 0;
        $fPracticantes13 = 0;
        $mPracticantes13 = 0;
        $fPracticantes18 = 0;
        $mPracticantes18 = 0;
        $fPracticantes22 = 0;
        $mPracticantes22 = 0;
        $fPracticantes36 = 0;
        $mPracticantes36 = 0;
        $fPracticantes50 = 0;
        $mPracticantes50 = 0;

        $fDiscapacidad12 = 0;
        $mDiscapacidad12 = 0;
        $fDiscapacidad13 = 0;
        $mDiscapacidad13 = 0;
        $fDiscapacidad18 = 0;
        $mDiscapacidad18 = 0;
        $fDiscapacidad22 = 0;
        $mDiscapacidad22 = 0;
        $fDiscapacidad36 = 0;
        $mDiscapacidad36 = 0;
        $fDiscapacidad50 = 0;
        $mDiscapacidad50 = 0;

        $fVeteranos12 = 0;
        $mVeteranos12 = 0;
        $fVeteranos13 = 0;
        $mVeteranos13 = 0;
        $fVeteranos18 = 0;
        $mVeteranos18 = 0;
        $fVeteranos22 = 0;
        $mVeteranos22 = 0;
        $fVeteranos36 = 0;
        $mVeteranos36 = 0;
        $fVeteranos50 = 0;
        $mVeteranos50 = 0;

        //DEPORTE ADAPTADO
        $visuales=array();
        $intelecto=array();
        $sindrome=array();
        $paralisis=array();
        $amputados=array();
        $ruedas=array();
        $auditivos=array();
        for($i=0;$i<count($etapa)*2;$i++){
            array_push($visuales,0);
            array_push($intelecto,0);
            array_push($sindrome,0);
            array_push($paralisis,0);
            array_push($amputados,0);
            array_push($ruedas,0);
            array_push($auditivos,0);
        }

        $contadorFVI=0;
        $contadorMVI=0;
        $contadorFVD=0;
        $contadorMVD=0;
        $contadorFVP=0;
        $contadorMVP=0;
        $contadorFVE=0;
        $contadorMVE=0;
        $contadorFVA=0;
        $contadorMVA=0;

        $contadorFII=0;
        $contadorMII=0;
        $contadorFID=0;
        $contadorMID=0;
        $contadorFIP=0;
        $contadorMIP=0;
        $contadorFIE=0;
        $contadorMIE=0;
        $contadorFIA=0;
        $contadorMIA=0;

        $contadorFSI=0;
        $contadorMSI=0;
        $contadorFSD=0;
        $contadorMSD=0;
        $contadorFSP=0;
        $contadorMSP=0;
        $contadorFSE=0;
        $contadorMSE=0;
        $contadorFSA=0;
        $contadorMSA=0;

        $contadorFPI=0;
        $contadorMPI=0;
        $contadorFPD=0;
        $contadorMPD=0;
        $contadorFPP=0;
        $contadorMPP=0;
        $contadorFPE=0;
        $contadorMPE=0;
        $contadorFPA=0;
        $contadorMPA=0;

        $contadorFAI=0;
        $contadorMAI=0;
        $contadorFAD=0;
        $contadorMAD=0;
        $contadorFAP=0;
        $contadorMAP=0;
        $contadorFAE=0;
        $contadorMAE=0;
        $contadorFAA=0;
        $contadorMAA=0;

        $contadorFRI=0;
        $contadorMRI=0;
        $contadorFRD=0;
        $contadorMRD=0;
        $contadorFRP=0;
        $contadorMRP=0;
        $contadorFRE=0;
        $contadorMRE=0;
        $contadorFRA=0;
        $contadorMRA=0;

        $contadorFAUI=0;
        $contadorMAUI=0;
        $contadorFAUD=0;
        $contadorMAUD=0;
        $contadorFAUP=0;
        $contadorMAUP=0;
        $contadorFAUE=0;
        $contadorMAUE=0;
        $contadorFAUA=0;
        $contadorMAUA=0;

        foreach($atletas as $atl){
            if($atl->alumno->genero=="Femenino"){
                if($atl->federado=="SISTEMÁTICO" && $atl->adaptado != "Si"){
                    switch($atl->categoria_id){
                        case 1: //SUB9
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorFS9I++;
                                    $s9[0]=$contadorFS9I;
                                    break;
                                case 2: //Desarrollo
                                    $contadorFS9D++;
                                    $s9[2]=$contadorFS9D;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorFS9P++;
                                    $s9[4]=$contadorFS9P;
                                    break;
                                case 4: //Especialización
                                    $contadorFS9E++;
                                    $s9[6]=$contadorFS9E;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorFS9A++;
                                    $s9[8]=$contadorFS9A;
                                break;
                            }
                            break;
                        case 2: //SUB11
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorFS11I++;
                                    $s11[0]=$contadorFS11I;
                                    break;
                                case 2: //Desarrollo
                                    $contadorFS11D++;
                                    $s11[2]=$contadorFS11D;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorFS11P++;
                                    $s11[4]=$contadorFS11P;
                                    break;
                                case 4: //Especialización
                                    $contadorFS11E++;
                                    $s11[6]=$contadorFS11E;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorFS11A++;
                                    $s11[8]=$contadorFS11A;
                                break;
                            }
                            break;
                        case 3: //SUB13
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorFS13I++;
                                    $s13[0]=$contadorFS13I;
                                    break;
                                case 2: //Desarrollo
                                    $contadorFS13D++;
                                    $s13[2]=$contadorFS13D;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorFS13P++;
                                    $s13[4]=$contadorFS13P;
                                    break;
                                case 4: //Especialización
                                    $contadorFS13E++;
                                    $s13[6]=$contadorFS13E;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorFS13A++;
                                    $s13[8]=$contadorFS13A;
                                break;
                            }
                            break;
                        case 4: //SUB16
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorFS16I++;
                                    $s16[0]=$contadorFS16I;
                                    break;
                                case 2: //Desarrollo
                                    $contadorFS16D++;
                                    $s16[2]=$contadorFS16D;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorFS16P++;
                                    $s16[4]=$contadorFS16P;
                                    break;
                                case 4: //Especialización
                                    $contadorFS16E++;
                                    $s16[6]=$contadorFS16E;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorFS16A++;
                                    $s16[8]=$contadorFS16A;
                                break;
                            }
                            break;
                        case 5: //SUB18
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorFS18I++;
                                    $s18[0]=$contadorFS18I;
                                    break;
                                case 2: //Desarrollo
                                    $contadorFS18D++;
                                    $s18[2]=$contadorFS18D;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorFS18P++;
                                    $s18[4]=$contadorFS18P;
                                    break;
                                case 4: //Especialización
                                    $contadorFS18E++;
                                    $s18[6]=$contadorFS18E;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorFS18A++;
                                    $s18[8]=$contadorFS18A;
                                break;
                            }
                            break;
                        case 6: //SUB21
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorFS21I++;
                                    $s21[0]=$contadorFS21I;
                                    break;
                                case 2: //Desarrollo
                                    $contadorFS21D++;
                                    $s21[2]=$contadorFS21D;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorFS21P++;
                                    $s21[4]=$contadorFS21P;
                                    break;
                                case 4: //Especialización
                                    $contadorFS21E++;
                                    $s21[6]=$contadorFS21E;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorFS21A++;
                                    $s21[8]=$contadorFS21A;
                                break;
                            }
                            break;
                        case 7: //SEGUNDA FUERZA
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorFSFI++;
                                    $sSF[0]=$contadorFSFI;
                                    break;
                                case 2: //Desarrollo
                                    $contadorFSFD++;
                                    $sSF[2]=$contadorFSFD;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorFSFP++;
                                    $sSF[4]=$contadorFSFP;
                                    break;
                                case 4: //Especialización
                                    $contadorFSFE++;
                                    $sSF[6]=$contadorFSFE;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorFSFA++;
                                    $sSF[8]=$contadorFSFA;
                                break;
                            }
                            break;
                        case 8:  //MAYORES
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorFMI++;
                                    $sM[0]=$contadorFMI;
                                    break;
                                case 2: //Desarrollo
                                    $contadorFMD++;
                                    $sM[2]=$contadorFMD;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorFMP++;
                                    $sM[4]=$contadorFMP;
                                    break;
                                case 4: //Especialización
                                    $contadorFME++;
                                    $sM[6]=$contadorFME;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorFMA++;
                                    $sM[8]=$contadorFMA;
                                break;
                            }
                            break;
                    }
                }
                else{
                    switch($atl->otro_programa_id){
                        case 2:
                            if($atl->alumno->edad<12){
                                $fPracticantes12++;
                                $practicantes[0] = $fPracticantes12;
                            }else if($atl->alumno->edad>=13 && $atl->alumno->edad<=17){
                                $fPracticantes13++;
                                $practicantes[2]= $fPracticantes13;
                            }
                            else if($atl->alumno->edad>=18 && $atl->alumno->edad<=21){
                                $fPracticantes18++;
                                $practicantes[4]= $fPracticantes18;
                            }
                            else if($atl->alumno->edad>=22 && $atl->alumno->edad<=35){
                                $fPracticantes22++;
                                $practicantes[6]= $fPracticantes22;
                            }
                            else if($atl->alumno->edad>=36 && $atl->alumno->edad<=50){
                                $fPracticantes36++;
                                $practicantes[8]= $fPracticantes36;
                            }
                            else{
                                $fPracticantes50++;
                                $practicantes[10]= $fPracticantes50;
                            }
                            break;
                        case 3:
                            if($atl->alumno->edad<12){
                                $fDiscapacidad12++;
                                $discapacidad[0] = $fDiscapacidad12;
                            }else if($atl->alumno->edad>=13 && $atl->alumno->edad<=17){
                                $fDiscapacidad13++;
                                $discapacidad[2]= $fDiscapacidad13;
                            }
                            else if($atl->alumno->edad>=18 && $atl->alumno->edad<=21){
                                $fDiscapacidad18++;
                                $discapacidad[4]= $fDiscapacidad18;
                            }
                            else if($atl->alumno->edad>=22 && $atl->alumno->edad<=35){
                                $fDiscapacidad22++;
                                $discapacidad[6]= $fDiscapacidad22;
                            }
                            else if($atl->alumno->edad>=36 && $atl->alumno->edad<=50){
                                $fDiscapacidad36++;
                                $discapacidad[8]= $fDiscapacidad36;
                            }
                            else{
                                $fDiscapacidad50++;
                                $discapacidad[10]= $fDiscapacidad50;
                            }
                            break;
                        case 4:
                            if($atl->alumno->edad<12){
                                $fVeteranos12++;
                                $veteranos[0] = $fVeteranos12;
                            }else if($atl->alumno->edad>=13 && $atl->alumno->edad<=17){
                                $fVeteranos13++;
                                $veteranos[2]= $fVeteranos13;
                            }
                            else if($atl->alumno->edad>=18 && $atl->alumno->edad<=21){
                                $fVeteranos18++;
                                $veteranos[4]= $fVeteranos18;
                            }
                            else if($atl->alumno->edad>=22 && $atl->alumno->edad<=35){
                                $fVeteranos22++;
                                $veteranos[6]= $fVeteranos22;
                            }
                            else if($atl->alumno->edad>=36 && $atl->alumno->edad<=50){
                                $fVeteranos36++;
                                $veteranos[8]= $fVeteranos36;
                            }
                            else{
                                $fVeteranos50++;
                                $veteranos[10]= $fVeteranos50;
                            }
                            break;
                    }
                }

                if($atl->adaptado == "Si"){
                    switch($atl->deporte_adaptado_id){
                        case 2://VISUALES
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorFVI++;
                                    $visuales[0]=$contadorFVI;
                                    break;
                                case 2: //Desarrollo
                                    $contadorFVD++;
                                    $visuales[2]=$contadorFVD;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorFVP++;
                                    $visuales[4]=$contadorFVP;
                                    break;
                                case 4: //Especialización
                                    $contadorFVE++;
                                    $visuales[6]=$contadorFVE;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorFVA++;
                                    $visuales[8]=$contadorFVA;
                                break;
                            }
                            break;
                        case 3://INTELECTUALES
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorFII++;
                                    $intelecto[0]=$contadorFII;
                                    break;
                                case 2: //Desarrollo
                                    $contadorFID++;
                                    $intelecto[2]=$contadorFID;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorFIP++;
                                    $intelecto[4]=$contadorFIP;
                                    break;
                                case 4: //Especialización
                                    $contadorFIE++;
                                    $intelecto[6]=$contadorFIE;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorFIA++;
                                    $intelecto[8]=$contadorFIA;
                                break;
                            }
                            break;
                        case 4://SÍNDROME DE DOWN
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorFSI++;
                                    $sindrome[0]=$contadorFSI;
                                    break;
                                case 2: //Desarrollo
                                    $contadorFSD++;
                                    $sindrome[2]=$contadorFSD;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorFSP++;
                                    $sindrome[4]=$contadorFSP;
                                    break;
                                case 4: //Especialización
                                    $contadorFSE++;
                                    $sindrome[6]=$contadorFSE;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorFSA++;
                                    $sindrome[8]=$contadorFSA;
                                break;
                            }
                            break;
                        case 5://PARÁLISIS CEREBRAL
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorFPI++;
                                    $paralisis[0]=$contadorFPI;
                                    break;
                                case 2: //Desarrollo
                                    $contadorFPD++;
                                    $paralisis[2]=$contadorFPD;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorFPP++;
                                    $paralisis[4]=$contadorFPP;
                                    break;
                                case 4: //Especialización
                                    $contadorFPE++;
                                    $paralisis[6]=$contadorFPE;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorFPA++;
                                    $paralisis[8]=$contadorFPA;
                                break;
                            }
                            break;
                        case 6://AMPUTADOS
                            switch($atl->etapa_deportiva_id){
                                case 1: //Aniciación
                                    $contadorFAI++;
                                    $amputados[0]=$contadorFAI;
                                    break;
                                case 2: //Desarrollo
                                    $contadorFAD++;
                                    $amputados[2]=$contadorFAD;
                                    break;
                                case 3: //Aerfeccionamiento
                                    $contadorFAA++;
                                    $amputados[4]=$contadorFAP;
                                    break;
                                case 4: //Especialización
                                    $contadorFAE++;
                                    $amputados[6]=$contadorFAE;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorFAA++;
                                    $amputados[8]=$contadorFAA;
                                break;
                            }
                            break;
                        case 7://SILLA DE RUEDAS
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorFRI++;
                                    $ruedas[0]=$contadorFRI;
                                    break;
                                case 2: //Desarrollo
                                    $contadorFRD++;
                                    $ruedas[2]=$contadorFRD;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorFRP++;
                                    $ruedas[4]=$contadorFRP;
                                    break;
                                case 4: //Especialización
                                    $contadorFRE++;
                                    $ruedas[6]=$contadorFRE;
                                    break;
                                case 5: //Rlto Rendimiento
                                    $contadorFRA++;
                                    $ruedas[8]=$contadorFRA;
                                break;
                            }
                            break;
                        case 8://AUDITIVOS
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorFAUI++;
                                    $auditivos[0]=$contadorFAUI;
                                    break;
                                case 2: //Desarrollo
                                    $contadorFAUD++;
                                    $auditivos[2]=$contadorFAUD;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorFAUP++;
                                    $auditivos[4]=$contadorFAUP;
                                    break;
                                case 4: //Especialización
                                    $contadorFAUE++;
                                    $auditivos[6]=$contadorFAUE;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorFAUA++;
                                    $auditivos[8]=$contadorFAUA;
                                break;
                            }
                            break;
                    }
                }
            }

            if($atl->alumno->genero=="Masculino"){
                if($atl->federado=="SISTEMÁTICO" && $atl->adaptado != "Si"){
                    switch($atl->categoria_id){
                        case 1: //SUB9
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorMS9I++;
                                    $s9[1]=$contadorMS9I;
                                    break;
                                case 2: //Desarrollo
                                    $contadorMS9D++;
                                    $s9[3]=$contadorMS9D;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorMS9P++;
                                    $s9[5]=$contadorMS9P;
                                    break;
                                case 4: //Especialización
                                    $contadorMS9E++;
                                    $s9[7]=$contadorMS9E;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorMS9A++;
                                    $s9[9]=$contadorMS9A;
                                break;
                            }
                            break;
                        case 2: //SUB11
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorMS11I++;
                                    $s11[1]=$contadorMS11I;
                                    break;
                                case 2: //Desarrollo
                                    $contadorMS11D++;
                                    $s11[3]=$contadorMS11D;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorMS11P++;
                                    $s11[5]=$contadorMS11P;
                                    break;
                                case 4: //Especialización
                                    $contadorMS11E++;
                                    $s11[7]=$contadorMS11E;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorMS11A++;
                                    $s11[9]=$contadorMS11A;
                                break;
                            }
                            break;
                        case 3: //SUB13
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorMS13I++;
                                    $s13[1]=$contadorMS13I;
                                    break;
                                case 2: //Desarrollo
                                    $contadorMS13D++;
                                    $s13[3]=$contadorMS13D;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorMS13P++;
                                    $s13[5]=$contadorMS13P;
                                    break;
                                case 4: //Especialización
                                    $contadorMS13E++;
                                    $s13[7]=$contadorMS13E;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorMS13A++;
                                    $s13[9]=$contadorMS13A;
                                break;
                            }
                            break;
                        case 4: //SUB16
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorMS16I++;
                                    $s16[1]=$contadorMS16I;
                                    break;
                                case 2: //Desarrollo
                                    $contadorMS16D++;
                                    $s16[3]=$contadorMS16D;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorMS16P++;
                                    $s16[5]=$contadorMS16P;
                                    break;
                                case 4: //Especialización
                                    $contadorMS16E++;
                                    $s16[7]=$contadorMS16E;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorMS16A++;
                                    $s16[9]=$contadorMS16A;
                                break;
                            }
                            break;
                        case 5: //SUB18
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorMS18I++;
                                    $s18[1]=$contadorMS18I;
                                    break;
                                case 2: //Desarrollo
                                    $contadorMS18D++;
                                    $s18[3]=$contadorMS18D;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorMS18P++;
                                    $s18[5]=$contadorMS18P;
                                    break;
                                case 4: //Especialización
                                    $contadorMS18E++;
                                    $s18[7]=$contadorMS18E;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorMS18A++;
                                    $s18[9]=$contadorMS18A;
                                break;
                            }
                            break;
                        case 6: //SUB21
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorMS21I++;
                                    $s21[1]=$contadorMS21I;
                                    break;
                                case 2: //Desarrollo
                                    $contadorMS21D++;
                                    $s21[3]=$contadorMS21D;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorMS21P++;
                                    $s21[5]=$contadorMS21P;
                                    break;
                                case 4: //Especialización
                                    $contadorMS21E++;
                                    $s21[7]=$contadorMS21E;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorMS21A++;
                                    $s21[9]=$contadorMS21A;
                                break;
                            }
                            break;
                        case 7: //SEGUNDA FUERZA
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorMSFI++;
                                    $sSF[1]=$contadorMSFI;
                                    break;
                                case 2: //Desarrollo
                                    $contadorMSFD++;
                                    $sSF[3]=$contadorMSFD;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorMSFP++;
                                    $sSF[5]=$contadorMSFP;
                                    break;
                                case 4: //Especialización
                                    $contadorMSFE++;
                                    $sSF[7]=$contadorMSFE;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorMSFA++;
                                    $sSF[9]=$contadorMSFA;
                                break;
                            }
                            break;
                        case 8:  //MAYORES
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorMMI++;
                                    $sM[1]=$contadorMMI;
                                    break;
                                case 2: //Desarrollo
                                    $contadorMMD++;
                                    $sM[3]=$contadorMMD;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorMMP++;
                                    $sM[5]=$contadorMMP;
                                    break;
                                case 4: //Especialización
                                    $contadorMME++;
                                    $sM[7]=$contadorMME;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorMMA++;
                                    $sM[9]=$contadorMMA;
                                break;
                            }
                            break;
                    }
                }
                else{
                    switch($atl->otro_programa_id){
                        case 2:
                            if($atl->alumno->edad<12){
                                $mPracticantes12++;
                                $practicantes[1] = $mPracticantes12;
                            }else if($atl->alumno->edad>=13 && $atl->alumno->edad<=17){
                                $mPracticantes13++;
                                $practicantes[3]= $mPracticantes13;
                            }
                            else if($atl->alumno->edad>=18 && $atl->alumno->edad<=21){
                                $mPracticantes18++;
                                $practicantes[5]= $mPracticantes18;
                            }
                            else if($atl->alumno->edad>=22 && $atl->alumno->edad<=35){
                                $mPracticantes22++;
                                $practicantes[7]= $mPracticantes22;
                            }
                            else if($atl->alumno->edad>=36 && $atl->alumno->edad<=50){
                                $mPracticantes36++;
                                $practicantes[9]= $mPracticantes36;
                            }
                            else{
                                $mPracticantes50++;
                                $practicantes[11]= $mPracticantes50;
                            }
                            break;
                        case 3:
                            if($atl->alumno->edad<12){
                                $mDiscapacidad12++;
                                $discapacidad[1] = $mDiscapacidad12;
                            }else if($atl->alumno->edad>=13 && $atl->alumno->edad<=17){
                                $mDiscapacidad13++;
                                $discapacidad[3]= $mDiscapacidad13;
                            }
                            else if($atl->alumno->edad>=18 && $atl->alumno->edad<=21){
                                $mDiscapacidad18++;
                                $discapacidad[5]= $mDiscapacidad18;
                            }
                            else if($atl->alumno->edad>=22 && $atl->alumno->edad<=35){
                                $mDiscapacidad22++;
                                $discapacidad[7]= $mDiscapacidad22;
                            }
                            else if($atl->alumno->edad>=36 && $atl->alumno->edad<=50){
                                $mDiscapacidad36++;
                                $discapacidad[9]= $mDiscapacidad36;
                            }
                            else{
                                $mDiscapacidad50++;
                                $discapacidad[11]= $mDiscapacidad50;
                            }
                            break;
                        case 4:
                            if($atl->alumno->edad<12){
                                $mVeteranos12++;
                                $veteranos[1] = $mVeteranos12;
                            }else if($atl->alumno->edad>=13 && $atl->alumno->edad<=17){
                                $mVeteranos13++;
                                $veteranos[3]= $mVeteranos13;
                            }
                            else if($atl->alumno->edad>=18 && $atl->alumno->edad<=21){
                                $mVeteranos18++;
                                $veteranos[5]= $mVeteranos18;
                            }
                            else if($atl->alumno->edad>=22 && $atl->alumno->edad<=35){
                                $mVeteranos22++;
                                $veteranos[7]= $mVeteranos22;
                            }
                            else if($atl->alumno->edad>=36 && $atl->alumno->edad<=50){
                                $mVeteranos36++;
                                $veteranos[9]= $mVeteranos36;
                            }
                            else{
                                $mVeteranos50++;
                                $veteranos[11]= $mVeteranos50;
                            }
                            break;
                    }
                }

                if($atl->adaptado == "Si"){
                    switch($atl->deporte_adaptado_id){
                        case 2://VISUALES
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorMVI++;
                                    $visuales[1]=$contadorMVI;
                                    break;
                                case 2: //Desarrollo
                                    $contadorMVD++;
                                    $visuales[3]=$contadorMVD;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorMVP++;
                                    $visuales[5]=$contadorMVP;
                                    break;
                                case 4: //Especialización
                                    $contadorMVE++;
                                    $visuales[7]=$contadorMVE;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorMVA++;
                                    $visuales[9]=$contadorMVA;
                                break;
                            }
                            break;
                        case 3://INTELECTUALES
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorMII++;
                                    $intelecto[1]=$contadorMII;
                                    break;
                                case 2: //Desarrollo
                                    $contadorMID++;
                                    $intelecto[3]=$contadorMID;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorMIP++;
                                    $intelecto[5]=$contadorMIP;
                                    break;
                                case 4: //Especialización
                                    $contadorMIE++;
                                    $intelecto[7]=$contadorMIE;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorMIA++;
                                    $intelecto[9]=$contadorMIA;
                                break;
                            }
                            break;
                        case 4://SÍNDROME DE DOWN
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorMSI++;
                                    $sindrome[1]=$contadorMSI;
                                    break;
                                case 2: //Desarrollo
                                    $contadorMSD++;
                                    $sindrome[3]=$contadorMSD;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorMSP++;
                                    $sindrome[5]=$contadorMSP;
                                    break;
                                case 4: //Especialización
                                    $contadorMSE++;
                                    $sindrome[7]=$contadorMSE;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorMSA++;
                                    $sindrome[9]=$contadorMSA;
                                break;
                            }
                            break;
                        case 5://PARÁLISIS CEREBRAL
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorMPI++;
                                    $paralisis[1]=$contadorMPI;
                                    break;
                                case 2: //Desarrollo
                                    $contadorMPD++;
                                    $paralisis[3]=$contadorMPD;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorMPP++;
                                    $paralisis[5]=$contadorMPP;
                                    break;
                                case 4: //Especialización
                                    $contadorMPE++;
                                    $paralisis[7]=$contadorMPE;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorMPA++;
                                    $paralisis[9]=$contadorMPA;
                                break;
                            }
                            break;
                        case 6://AMPUTADOS
                            switch($atl->etapa_deportiva_id){
                                case 1: //Aniciación
                                    $contadorMAI++;
                                    $amputados[1]=$contadorMAI;
                                    break;
                                case 2: //Desarrollo
                                    $contadorMAD++;
                                    $amputados[3]=$contadorMAD;
                                    break;
                                case 3: //Aerfeccionamiento
                                    $contadorMAA++;
                                    $amputados[5]=$contadorMAP;
                                    break;
                                case 4: //Especialización
                                    $contadorMAE++;
                                    $amputados[7]=$contadorMAE;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorMAA++;
                                    $amputados[9]=$contadorMAA;
                                break;
                            }
                            break;
                        case 7://SILLA DE RUEDAS
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorMRI++;
                                    $ruedas[1]=$contadorMRI;
                                    break;
                                case 2: //Desarrollo
                                    $contadorMRD++;
                                    $ruedas[3]=$contadorMRD;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorMRP++;
                                    $ruedas[5]=$contadorMRP;
                                    break;
                                case 4: //Especialización
                                    $contadorMRE++;
                                    $ruedas[7]=$contadorMRE;
                                    break;
                                case 5: //Rlto Rendimiento
                                    $contadorMRA++;
                                    $ruedas[9]=$contadorMRA;
                                break;
                            }
                            break;
                        case 8://AUDITIVOS
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorMAUI++;
                                    $auditivos[1]=$contadorMAUI;
                                    break;
                                case 2: //Desarrollo
                                    $contadorMAUD++;
                                    $auditivos[3]=$contadorMAUD;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorMAUP++;
                                    $auditivos[5]=$contadorMAUP;
                                    break;
                                case 4: //Especialización
                                    $contadorMAUE++;
                                    $auditivos[7]=$contadorMAUE;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorMAUA++;
                                    $auditivos[9]=$contadorMAUA;
                                break;
                            }
                            break;
                    }
                }
            }
        }

        //FEDERADOS
        $tS9 = array_sum($s9);
        $f9 = $s9[0]+$s9[2]+$s9[4]+$s9[6]+$s9[8];
        $m9 = $s9[1]+$s9[3]+$s9[5]+$s9[7]+$s9[9];

        $tS11 = array_sum($s11);
        $f11 = $s11[0]+$s11[2]+$s11[4]+$s11[6]+$s11[8];
        $m11 = $s11[1]+$s11[3]+$s11[5]+$s11[7]+$s11[9];

        $tS13 = array_sum($s13);
        $f13 = $s13[0]+$s13[2]+$s13[4]+$s13[6]+$s13[8];
        $m13 = $s13[1]+$s13[3]+$s13[5]+$s13[7]+$s13[9];

        $tS16 = array_sum($s16);
        $f16 = $s16[0]+$s16[2]+$s16[4]+$s16[6]+$s16[8];
        $m16 = $s16[1]+$s16[3]+$s16[5]+$s16[7]+$s16[9];

        $tS18 = array_sum($s18);
        $f18 = $s18[0]+$s18[2]+$s18[4]+$s18[6]+$s18[8];
        $m18 = $s18[1]+$s18[3]+$s18[5]+$s18[7]+$s18[9];

        $tS21 = array_sum($s21);
        $f21 = $s21[0]+$s21[2]+$s21[4]+$s21[6]+$s21[8];
        $m21 = $s21[1]+$s21[3]+$s21[5]+$s21[7]+$s21[9];

        $tSF = array_sum($sSF);
        $fF = $sSF[0]+$sSF[2]+$sSF[4]+$sSF[6]+$sSF[8];
        $mF = $sSF[1]+$sSF[3]+$sSF[5]+$sSF[7]+$sSF[9];

        $tM = array_sum($sM);
        $fM = $sM[0]+$sM[2]+$sM[4]+$sM[6]+$sM[8];
        $mM = $sM[1]+$sM[3]+$sM[5]+$sM[7]+$sM[9];

        $totalFemeninosFederados = $f9+$f11+$f13+$f16+$f18+$f21+$fF+$fM;
        $totalMasculinosFederados = $m9+$m11+$m13+$m16+$m18+$m21+$mF+$mM;
        $totalFederados = $tS9+$tS11+$tS13+$tS16+$tS18+$tS21+$tSF+$tM;

        //OTROS PROGRAMAS DE ATENCIÓN
        $tPracticantes = array_sum($practicantes);
        $fPracticantes = $practicantes[0]+$practicantes[2]+$practicantes[4]+$practicantes[6]+$practicantes[8]+$practicantes[10];
        $mPracticantes = $practicantes[1]+$practicantes[3]+$practicantes[5]+$practicantes[7]+$practicantes[9]+$practicantes[11];

        $tDiscapacidad = array_sum($discapacidad);
        $fDiscapacidad = $discapacidad[0]+$discapacidad[2]+$discapacidad[4]+$discapacidad[6]+$discapacidad[8]+$discapacidad[10];
        $mDiscapacidad = $discapacidad[1]+$discapacidad[3]+$discapacidad[5]+$discapacidad[7]+$discapacidad[9]+$discapacidad[11];

        $tVeteranos = array_sum($veteranos);
        $fVeteranos = $veteranos[0]+$veteranos[2]+$veteranos[4]+$veteranos[6]+$veteranos[8]+$veteranos[10];
        $mVeteranos = $veteranos[1]+$veteranos[3]+$veteranos[5]+$veteranos[7]+$veteranos[9]+$veteranos[11];
        
        $totalMasculinosOtros = $mPracticantes+$mDiscapacidad+$mVeteranos;
        $totalFemeninosOtros = $fPracticantes+$fDiscapacidad+$fVeteranos;
        $totalOtros = $tPracticantes+$tDiscapacidad+$tVeteranos;

        //DEPORTE ADAPTADO
        $tvisuales = array_sum($visuales);
        $fvisuales = $visuales[0]+$visuales[2]+$visuales[4]+$visuales[6]+$visuales[8];
        $mvisuales = $visuales[1]+$visuales[3]+$visuales[5]+$visuales[7]+$visuales[9];

        $tintelecto = array_sum($intelecto);
        $fintelecto = $intelecto[0]+$intelecto[2]+$intelecto[4]+$intelecto[6]+$intelecto[8];
        $mintelecto = $intelecto[1]+$intelecto[3]+$intelecto[5]+$intelecto[7]+$intelecto[9];

        $tsindrome = array_sum($sindrome);
        $fsindrome = $sindrome[0]+$sindrome[2]+$sindrome[4]+$sindrome[6]+$sindrome[8];
        $msindrome = $sindrome[1]+$sindrome[3]+$sindrome[5]+$sindrome[7]+$sindrome[9];

        $tparalisis = array_sum($paralisis);
        $fparalisis = $paralisis[0]+$paralisis[2]+$paralisis[4]+$paralisis[6]+$paralisis[8];
        $mparalisis = $paralisis[1]+$paralisis[3]+$paralisis[5]+$paralisis[7]+$paralisis[9];

        $tamputados = array_sum($amputados);
        $famputados = $amputados[0]+$amputados[2]+$amputados[4]+$amputados[6]+$amputados[8];
        $mamputados = $amputados[1]+$amputados[3]+$amputados[5]+$amputados[7]+$amputados[9];

        $truedas = array_sum($ruedas);
        $fruedas = $ruedas[0]+$ruedas[2]+$ruedas[4]+$ruedas[6]+$ruedas[8];
        $mruedas = $ruedas[1]+$ruedas[3]+$ruedas[5]+$ruedas[7]+$ruedas[9];

        $tauditivos = array_sum($auditivos);
        $fauditivos = $auditivos[0]+$auditivos[2]+$auditivos[4]+$auditivos[6]+$auditivos[8];
        $mauditivos = $auditivos[1]+$auditivos[3]+$auditivos[5]+$auditivos[7]+$auditivos[9];

        $totalAdaptados=$tauditivos+$truedas+$tamputados+$tparalisis+$tsindrome+$tintelecto+$tvisuales;
        $totalMasculinosAdaptados=$mauditivos+$mruedas+$mamputados+$mparalisis+$msindrome+$mintelecto+$mvisuales;
        $totalFemeninosAdaptados=$fauditivos+$fruedas+$famputados+$fparalisis+$fsindrome+$fintelecto+$fvisuales;

        //SUMA DE COLUMNAS
        $FFI=$s9[0]+$s11[0]+$s13[0]+$s16[0]+$s18[0]+$s21[0]+$sSF[0]+$sM[0];
        $FMI=$s9[1]+$s11[1]+$s13[1]+$s16[1]+$s18[1]+$s21[1]+$sSF[1]+$sM[1];

        $FFD=$s9[2]+$s11[2]+$s13[2]+$s16[2]+$s18[2]+$s21[2]+$sSF[2]+$sM[2];
        $FMD=$s9[3]+$s11[3]+$s13[3]+$s16[3]+$s18[3]+$s21[3]+$sSF[3]+$sM[3];

        $FFP=$s9[4]+$s11[4]+$s13[4]+$s16[4]+$s18[4]+$s21[4]+$sSF[4]+$sM[4];
        $FMP=$s9[5]+$s11[5]+$s13[5]+$s16[5]+$s18[5]+$s21[5]+$sSF[5]+$sM[5];

        $FFE=$s9[6]+$s11[6]+$s13[6]+$s16[6]+$s18[6]+$s21[6]+$sSF[6]+$sM[6];
        $FME=$s9[7]+$s11[7]+$s13[7]+$s16[7]+$s18[7]+$s21[7]+$sSF[7]+$sM[7];

        $FFA=$s9[8]+$s11[8]+$s13[8]+$s16[8]+$s18[8]+$s21[8]+$sSF[8]+$sM[8];
        $FMA=$s9[9]+$s11[9]+$s13[9]+$s16[9]+$s18[9]+$s21[9]+$sSF[1]+$sM[9];
        $columnasFederados = array();
        array_push($columnasFederados,$FFI);
        array_push($columnasFederados,$FMI);
        array_push($columnasFederados,$FFD);
        array_push($columnasFederados,$FMD);
        array_push($columnasFederados,$FFP);
        array_push($columnasFederados,$FMP);
        array_push($columnasFederados,$FFE);
        array_push($columnasFederados,$FME);
        array_push($columnasFederados,$FFA);
        array_push($columnasFederados,$FMA);

        $AFI=$visuales[0]+$intelecto[0]+$sindrome[0]+$paralisis[0]+$amputados[0]+$ruedas[0]+$auditivos[0];
        $AMI=$visuales[1]+$intelecto[1]+$sindrome[1]+$paralisis[1]+$amputados[1]+$ruedas[1]+$auditivos[1];

        $AFD=$visuales[2]+$intelecto[2]+$sindrome[2]+$paralisis[2]+$amputados[2]+$ruedas[2]+$auditivos[2];
        $AMD=$visuales[3]+$intelecto[3]+$sindrome[3]+$paralisis[3]+$amputados[3]+$ruedas[3]+$auditivos[3];

        $AFP=$visuales[4]+$intelecto[4]+$sindrome[4]+$paralisis[4]+$amputados[4]+$ruedas[4]+$auditivos[4];
        $AMP=$visuales[5]+$intelecto[5]+$sindrome[5]+$paralisis[5]+$amputados[5]+$ruedas[5]+$auditivos[5];

        $AFE=$visuales[6]+$intelecto[6]+$sindrome[6]+$paralisis[6]+$amputados[6]+$ruedas[6]+$auditivos[6];
        $AME=$visuales[7]+$intelecto[7]+$sindrome[7]+$paralisis[7]+$amputados[7]+$ruedas[7]+$auditivos[7];

        $AFA=$visuales[8]+$intelecto[8]+$sindrome[8]+$paralisis[8]+$amputados[8]+$ruedas[8]+$auditivos[8];
        $AMA=$visuales[9]+$intelecto[9]+$sindrome[9]+$paralisis[9]+$amputados[9]+$ruedas[9]+$auditivos[9];
        $columnasAdaptados = array();
        array_push($columnasAdaptados,$AFI);
        array_push($columnasAdaptados,$AMI);
        array_push($columnasAdaptados,$AFD);
        array_push($columnasAdaptados,$AMD);
        array_push($columnasAdaptados,$AFP);
        array_push($columnasAdaptados,$AMP);
        array_push($columnasAdaptados,$AFE);
        array_push($columnasAdaptados,$AME);
        array_push($columnasAdaptados,$AFA);
        array_push($columnasAdaptados,$AMA);

        $F12=$practicantes[0]+$discapacidad[0]+$veteranos[0];
        $M12=$practicantes[1]+$discapacidad[1]+$veteranos[1];

        $F13=$practicantes[2]+$discapacidad[2]+$veteranos[2];
        $M13=$practicantes[3]+$discapacidad[3]+$veteranos[3];

        $F18=$practicantes[4]+$discapacidad[4]+$veteranos[4];
        $M18=$practicantes[5]+$discapacidad[5]+$veteranos[5];

        $F22=$practicantes[6]+$discapacidad[6]+$veteranos[6];
        $M22=$practicantes[7]+$discapacidad[7]+$veteranos[7];

        $F36=$practicantes[8]+$discapacidad[8]+$veteranos[8];
        $M36=$practicantes[9]+$discapacidad[9]+$veteranos[9];

        $F50 = $practicantes[10]+$discapacidad[10]+$veteranos[10];
        $M50 = $practicantes[11]+$discapacidad[11]+$veteranos[11];
        $columnasOtros = array();
        array_push($columnasOtros,$F12);
        array_push($columnasOtros,$M12);
        array_push($columnasOtros,$F13);
        array_push($columnasOtros,$M13);
        array_push($columnasOtros,$F18);
        array_push($columnasOtros,$M18);
        array_push($columnasOtros,$F22);
        array_push($columnasOtros,$M22);
        array_push($columnasOtros,$F36);
        array_push($columnasOtros,$M36);
        array_push($columnasOtros,$F50);
        array_push($columnasOtros,$M50);
        return view('Reportes.edg31.list',compact("s9","s11","s13","s16","s18","s21","sSF","sM",
        "tS9","f9","m9","tS11","f11","m11","tS13","f13","m13","tS16","f16","m16",
        "tS18","f18","m18","tS21","f21","m21","tSF","fF","mF","tM","fM","mM",
        "practicantes","discapacidad","veteranos","tPracticantes","fPracticantes","mPracticantes",
        "tDiscapacidad","fDiscapacidad","mDiscapacidad","tVeteranos","fVeteranos","mVeteranos",
        "visuales","intelecto","sindrome","paralisis","amputados","ruedas","auditivos",
        "tvisuales","fvisuales","mvisuales","tintelecto","fintelecto","mintelecto",
        "tsindrome","fsindrome","msindrome","tparalisis","fparalisis","mparalisis",
        "tamputados","famputados","mamputados","truedas","fruedas","mruedas",
        "tauditivos","fauditivos","mauditivos","columnasFederados","columnasAdaptados",
        "columnasOtros","totalFemeninosFederados","totalMasculinosFederados",
        "totalFederados","totalMasculinosOtros","totalFemeninosOtros","totalOtros",
        "totalFemeninosAdaptados","totalMasculinosAdaptados","totalAdaptados"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function generarPDF()
    {
        $atletas = Atleta::where('estado','activo')->get();
        $etapa = Etapa_Deportiva::all();
        $entrega = auth()->user()->name;

        //FEDERADOS
        $s9=array();
        $s11=array();
        $s13=array();
        $s16=array();
        $s18=array();
        $s21=array();
        $sSF=array();
        $sM=array();
        for($i=0;$i<count($etapa)*2;$i++){
            array_push($s9,0);
            array_push($s11,0);
            array_push($s13,0);
            array_push($s16,0);
            array_push($s18,0);
            array_push($s21,0);
            array_push($sSF,0);
            array_push($sM,0);
        }

        $contadorFS9I=0;
        $contadorMS9I=0;
        $contadorFS9D=0;
        $contadorMS9D=0;
        $contadorFS9P=0;
        $contadorMS9P=0;
        $contadorFS9E=0;
        $contadorMS9E=0;
        $contadorFS9A=0;
        $contadorMS9A=0;

        $contadorFS11I=0;
        $contadorMS11I=0;
        $contadorFS11D=0;
        $contadorMS11D=0;
        $contadorFS11P=0;
        $contadorMS11P=0;
        $contadorFS11E=0;
        $contadorMS11E=0;
        $contadorFS11A=0;
        $contadorMS11A=0;

        $contadorFS13I=0;
        $contadorMS13I=0;
        $contadorFS13D=0;
        $contadorMS13D=0;
        $contadorFS13P=0;
        $contadorMS13P=0;
        $contadorFS13E=0;
        $contadorMS13E=0;
        $contadorFS13A=0;
        $contadorMS13A=0;

        $contadorFS16I=0;
        $contadorMS16I=0;
        $contadorFS16D=0;
        $contadorMS16D=0;
        $contadorFS16P=0;
        $contadorMS16P=0;
        $contadorFS16E=0;
        $contadorMS16E=0;
        $contadorFS16A=0;
        $contadorMS16A=0;

        $contadorFS18I=0;
        $contadorMS18I=0;
        $contadorFS18D=0;
        $contadorMS18D=0;
        $contadorFS18P=0;
        $contadorMS18P=0;
        $contadorFS18E=0;
        $contadorMS18E=0;
        $contadorFS18A=0;
        $contadorMS18A=0;

        $contadorFS21I=0;
        $contadorMS21I=0;
        $contadorFS21D=0;
        $contadorMS21D=0;
        $contadorFS21P=0;
        $contadorMS21P=0;
        $contadorFS21E=0;
        $contadorMS21E=0;
        $contadorFS21A=0;
        $contadorMS21A=0;

        $contadorFSFI=0;
        $contadorMSFI=0;
        $contadorFSFD=0;
        $contadorMSFD=0;
        $contadorFSFP=0;
        $contadorMSFP=0;
        $contadorFSFE=0;
        $contadorMSFE=0;
        $contadorFSFA=0;
        $contadorMSFA=0;

        $contadorFMI=0;
        $contadorMMI=0;
        $contadorFMD=0;
        $contadorMMD=0;
        $contadorFMP=0;
        $contadorMMP=0;
        $contadorFME=0;
        $contadorMME=0;
        $contadorFMA=0;
        $contadorMMA=0;

        //OTROS PROGRAMAS DE ATENCIÓN
        $practicantes = array();
        $discapacidad = array();
        $veteranos = array();
        for($i=0;$i<12;$i++){
            array_push($practicantes,0);
            array_push($discapacidad,0);
            array_push($veteranos,0);
        }

        $fPracticantes12 = 0;
        $mPracticantes12 = 0;
        $fPracticantes13 = 0;
        $mPracticantes13 = 0;
        $fPracticantes18 = 0;
        $mPracticantes18 = 0;
        $fPracticantes22 = 0;
        $mPracticantes22 = 0;
        $fPracticantes36 = 0;
        $mPracticantes36 = 0;
        $fPracticantes50 = 0;
        $mPracticantes50 = 0;

        $fDiscapacidad12 = 0;
        $mDiscapacidad12 = 0;
        $fDiscapacidad13 = 0;
        $mDiscapacidad13 = 0;
        $fDiscapacidad18 = 0;
        $mDiscapacidad18 = 0;
        $fDiscapacidad22 = 0;
        $mDiscapacidad22 = 0;
        $fDiscapacidad36 = 0;
        $mDiscapacidad36 = 0;
        $fDiscapacidad50 = 0;
        $mDiscapacidad50 = 0;

        $fVeteranos12 = 0;
        $mVeteranos12 = 0;
        $fVeteranos13 = 0;
        $mVeteranos13 = 0;
        $fVeteranos18 = 0;
        $mVeteranos18 = 0;
        $fVeteranos22 = 0;
        $mVeteranos22 = 0;
        $fVeteranos36 = 0;
        $mVeteranos36 = 0;
        $fVeteranos50 = 0;
        $mVeteranos50 = 0;

        //DEPORTE ADAPTADO
        $visuales=array();
        $intelecto=array();
        $sindrome=array();
        $paralisis=array();
        $amputados=array();
        $ruedas=array();
        $auditivos=array();
        for($i=0;$i<count($etapa)*2;$i++){
            array_push($visuales,0);
            array_push($intelecto,0);
            array_push($sindrome,0);
            array_push($paralisis,0);
            array_push($amputados,0);
            array_push($ruedas,0);
            array_push($auditivos,0);
        }

        $contadorFVI=0;
        $contadorMVI=0;
        $contadorFVD=0;
        $contadorMVD=0;
        $contadorFVP=0;
        $contadorMVP=0;
        $contadorFVE=0;
        $contadorMVE=0;
        $contadorFVA=0;
        $contadorMVA=0;

        $contadorFII=0;
        $contadorMII=0;
        $contadorFID=0;
        $contadorMID=0;
        $contadorFIP=0;
        $contadorMIP=0;
        $contadorFIE=0;
        $contadorMIE=0;
        $contadorFIA=0;
        $contadorMIA=0;

        $contadorFSI=0;
        $contadorMSI=0;
        $contadorFSD=0;
        $contadorMSD=0;
        $contadorFSP=0;
        $contadorMSP=0;
        $contadorFSE=0;
        $contadorMSE=0;
        $contadorFSA=0;
        $contadorMSA=0;

        $contadorFPI=0;
        $contadorMPI=0;
        $contadorFPD=0;
        $contadorMPD=0;
        $contadorFPP=0;
        $contadorMPP=0;
        $contadorFPE=0;
        $contadorMPE=0;
        $contadorFPA=0;
        $contadorMPA=0;

        $contadorFAI=0;
        $contadorMAI=0;
        $contadorFAD=0;
        $contadorMAD=0;
        $contadorFAP=0;
        $contadorMAP=0;
        $contadorFAE=0;
        $contadorMAE=0;
        $contadorFAA=0;
        $contadorMAA=0;

        $contadorFRI=0;
        $contadorMRI=0;
        $contadorFRD=0;
        $contadorMRD=0;
        $contadorFRP=0;
        $contadorMRP=0;
        $contadorFRE=0;
        $contadorMRE=0;
        $contadorFRA=0;
        $contadorMRA=0;

        $contadorFAUI=0;
        $contadorMAUI=0;
        $contadorFAUD=0;
        $contadorMAUD=0;
        $contadorFAUP=0;
        $contadorMAUP=0;
        $contadorFAUE=0;
        $contadorMAUE=0;
        $contadorFAUA=0;
        $contadorMAUA=0;

        foreach($atletas as $atl){
            if($atl->alumno->genero=="Femenino"){
                if($atl->federado=="SISTEMÁTICO" && $atl->adaptado != "Si"){
                    switch($atl->categoria_id){
                        case 1: //SUB9
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorFS9I++;
                                    $s9[0]=$contadorFS9I;
                                    break;
                                case 2: //Desarrollo
                                    $contadorFS9D++;
                                    $s9[2]=$contadorFS9D;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorFS9P++;
                                    $s9[4]=$contadorFS9P;
                                    break;
                                case 4: //Especialización
                                    $contadorFS9E++;
                                    $s9[6]=$contadorFS9E;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorFS9A++;
                                    $s9[8]=$contadorFS9A;
                                break;
                            }
                            break;
                        case 2: //SUB11
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorFS11I++;
                                    $s11[0]=$contadorFS11I;
                                    break;
                                case 2: //Desarrollo
                                    $contadorFS11D++;
                                    $s11[2]=$contadorFS11D;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorFS11P++;
                                    $s11[4]=$contadorFS11P;
                                    break;
                                case 4: //Especialización
                                    $contadorFS11E++;
                                    $s11[6]=$contadorFS11E;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorFS11A++;
                                    $s11[8]=$contadorFS11A;
                                break;
                            }
                            break;
                        case 3: //SUB13
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorFS13I++;
                                    $s13[0]=$contadorFS13I;
                                    break;
                                case 2: //Desarrollo
                                    $contadorFS13D++;
                                    $s13[2]=$contadorFS13D;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorFS13P++;
                                    $s13[4]=$contadorFS13P;
                                    break;
                                case 4: //Especialización
                                    $contadorFS13E++;
                                    $s13[6]=$contadorFS13E;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorFS13A++;
                                    $s13[8]=$contadorFS13A;
                                break;
                            }
                            break;
                        case 4: //SUB16
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorFS16I++;
                                    $s16[0]=$contadorFS16I;
                                    break;
                                case 2: //Desarrollo
                                    $contadorFS16D++;
                                    $s16[2]=$contadorFS16D;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorFS16P++;
                                    $s16[4]=$contadorFS16P;
                                    break;
                                case 4: //Especialización
                                    $contadorFS16E++;
                                    $s16[6]=$contadorFS16E;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorFS16A++;
                                    $s16[8]=$contadorFS16A;
                                break;
                            }
                            break;
                        case 5: //SUB18
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorFS18I++;
                                    $s18[0]=$contadorFS18I;
                                    break;
                                case 2: //Desarrollo
                                    $contadorFS18D++;
                                    $s18[2]=$contadorFS18D;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorFS18P++;
                                    $s18[4]=$contadorFS18P;
                                    break;
                                case 4: //Especialización
                                    $contadorFS18E++;
                                    $s18[6]=$contadorFS18E;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorFS18A++;
                                    $s18[8]=$contadorFS18A;
                                break;
                            }
                            break;
                        case 6: //SUB21
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorFS21I++;
                                    $s21[0]=$contadorFS21I;
                                    break;
                                case 2: //Desarrollo
                                    $contadorFS21D++;
                                    $s21[2]=$contadorFS21D;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorFS21P++;
                                    $s21[4]=$contadorFS21P;
                                    break;
                                case 4: //Especialización
                                    $contadorFS21E++;
                                    $s21[6]=$contadorFS21E;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorFS21A++;
                                    $s21[8]=$contadorFS21A;
                                break;
                            }
                            break;
                        case 7: //SEGUNDA FUERZA
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorFSFI++;
                                    $sSF[0]=$contadorFSFI;
                                    break;
                                case 2: //Desarrollo
                                    $contadorFSFD++;
                                    $sSF[2]=$contadorFSFD;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorFSFP++;
                                    $sSF[4]=$contadorFSFP;
                                    break;
                                case 4: //Especialización
                                    $contadorFSFE++;
                                    $sSF[6]=$contadorFSFE;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorFSFA++;
                                    $sSF[8]=$contadorFSFA;
                                break;
                            }
                            break;
                        case 8:  //MAYORES
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorFMI++;
                                    $sM[0]=$contadorFMI;
                                    break;
                                case 2: //Desarrollo
                                    $contadorFMD++;
                                    $sM[2]=$contadorFMD;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorFMP++;
                                    $sM[4]=$contadorFMP;
                                    break;
                                case 4: //Especialización
                                    $contadorFME++;
                                    $sM[6]=$contadorFME;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorFMA++;
                                    $sM[8]=$contadorFMA;
                                break;
                            }
                            break;
                    }
                }
                else{
                    switch($atl->otro_programa_id){
                        case 2:
                            if($atl->alumno->edad<12){
                                $fPracticantes12++;
                                $practicantes[0] = $fPracticantes12;
                            }else if($atl->alumno->edad>=13 && $atl->alumno->edad<=17){
                                $fPracticantes13++;
                                $practicantes[2]= $fPracticantes13;
                            }
                            else if($atl->alumno->edad>=18 && $atl->alumno->edad<=21){
                                $fPracticantes18++;
                                $practicantes[4]= $fPracticantes18;
                            }
                            else if($atl->alumno->edad>=22 && $atl->alumno->edad<=35){
                                $fPracticantes22++;
                                $practicantes[6]= $fPracticantes22;
                            }
                            else if($atl->alumno->edad>=36 && $atl->alumno->edad<=50){
                                $fPracticantes36++;
                                $practicantes[8]= $fPracticantes36;
                            }
                            else{
                                $fPracticantes50++;
                                $practicantes[10]= $fPracticantes50;
                            }
                            break;
                        case 3:
                            if($atl->alumno->edad<12){
                                $fDiscapacidad12++;
                                $discapacidad[0] = $fDiscapacidad12;
                            }else if($atl->alumno->edad>=13 && $atl->alumno->edad<=17){
                                $fDiscapacidad13++;
                                $discapacidad[2]= $fDiscapacidad13;
                            }
                            else if($atl->alumno->edad>=18 && $atl->alumno->edad<=21){
                                $fDiscapacidad18++;
                                $discapacidad[4]= $fDiscapacidad18;
                            }
                            else if($atl->alumno->edad>=22 && $atl->alumno->edad<=35){
                                $fDiscapacidad22++;
                                $discapacidad[6]= $fDiscapacidad22;
                            }
                            else if($atl->alumno->edad>=36 && $atl->alumno->edad<=50){
                                $fDiscapacidad36++;
                                $discapacidad[8]= $fDiscapacidad36;
                            }
                            else{
                                $fDiscapacidad50++;
                                $discapacidad[10]= $fDiscapacidad50;
                            }
                            break;
                        case 4:
                            if($atl->alumno->edad<12){
                                $fVeteranos12++;
                                $veteranos[0] = $fVeteranos12;
                            }else if($atl->alumno->edad>=13 && $atl->alumno->edad<=17){
                                $fVeteranos13++;
                                $veteranos[2]= $fVeteranos13;
                            }
                            else if($atl->alumno->edad>=18 && $atl->alumno->edad<=21){
                                $fVeteranos18++;
                                $veteranos[4]= $fVeteranos18;
                            }
                            else if($atl->alumno->edad>=22 && $atl->alumno->edad<=35){
                                $fVeteranos22++;
                                $veteranos[6]= $fVeteranos22;
                            }
                            else if($atl->alumno->edad>=36 && $atl->alumno->edad<=50){
                                $fVeteranos36++;
                                $veteranos[8]= $fVeteranos36;
                            }
                            else{
                                $fVeteranos50++;
                                $veteranos[10]= $fVeteranos50;
                            }
                            break;
                    }
                }

                if($atl->adaptado == "Si"){
                    switch($atl->deporte_adaptado_id){
                        case 2://VISUALES
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorFVI++;
                                    $visuales[0]=$contadorFVI;
                                    break;
                                case 2: //Desarrollo
                                    $contadorFVD++;
                                    $visuales[2]=$contadorFVD;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorFVP++;
                                    $visuales[4]=$contadorFVP;
                                    break;
                                case 4: //Especialización
                                    $contadorFVE++;
                                    $visuales[6]=$contadorFVE;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorFVA++;
                                    $visuales[8]=$contadorFVA;
                                break;
                            }
                            break;
                        case 3://INTELECTUALES
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorFII++;
                                    $intelecto[0]=$contadorFII;
                                    break;
                                case 2: //Desarrollo
                                    $contadorFID++;
                                    $intelecto[2]=$contadorFID;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorFIP++;
                                    $intelecto[4]=$contadorFIP;
                                    break;
                                case 4: //Especialización
                                    $contadorFIE++;
                                    $intelecto[6]=$contadorFIE;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorFIA++;
                                    $intelecto[8]=$contadorFIA;
                                break;
                            }
                            break;
                        case 4://SÍNDROME DE DOWN
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorFSI++;
                                    $sindrome[0]=$contadorFSI;
                                    break;
                                case 2: //Desarrollo
                                    $contadorFSD++;
                                    $sindrome[2]=$contadorFSD;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorFSP++;
                                    $sindrome[4]=$contadorFSP;
                                    break;
                                case 4: //Especialización
                                    $contadorFSE++;
                                    $sindrome[6]=$contadorFSE;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorFSA++;
                                    $sindrome[8]=$contadorFSA;
                                break;
                            }
                            break;
                        case 5://PARÁLISIS CEREBRAL
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorFPI++;
                                    $paralisis[0]=$contadorFPI;
                                    break;
                                case 2: //Desarrollo
                                    $contadorFPD++;
                                    $paralisis[2]=$contadorFPD;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorFPP++;
                                    $paralisis[4]=$contadorFPP;
                                    break;
                                case 4: //Especialización
                                    $contadorFPE++;
                                    $paralisis[6]=$contadorFPE;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorFPA++;
                                    $paralisis[8]=$contadorFPA;
                                break;
                            }
                            break;
                        case 6://AMPUTADOS
                            switch($atl->etapa_deportiva_id){
                                case 1: //Aniciación
                                    $contadorFAI++;
                                    $amputados[0]=$contadorFAI;
                                    break;
                                case 2: //Desarrollo
                                    $contadorFAD++;
                                    $amputados[2]=$contadorFAD;
                                    break;
                                case 3: //Aerfeccionamiento
                                    $contadorFAA++;
                                    $amputados[4]=$contadorFAP;
                                    break;
                                case 4: //Especialización
                                    $contadorFAE++;
                                    $amputados[6]=$contadorFAE;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorFAA++;
                                    $amputados[8]=$contadorFAA;
                                break;
                            }
                            break;
                        case 7://SILLA DE RUEDAS
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorFRI++;
                                    $ruedas[0]=$contadorFRI;
                                    break;
                                case 2: //Desarrollo
                                    $contadorFRD++;
                                    $ruedas[2]=$contadorFRD;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorFRP++;
                                    $ruedas[4]=$contadorFRP;
                                    break;
                                case 4: //Especialización
                                    $contadorFRE++;
                                    $ruedas[6]=$contadorFRE;
                                    break;
                                case 5: //Rlto Rendimiento
                                    $contadorFRA++;
                                    $ruedas[8]=$contadorFRA;
                                break;
                            }
                            break;
                        case 8://AUDITIVOS
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorFAUI++;
                                    $auditivos[0]=$contadorFAUI;
                                    break;
                                case 2: //Desarrollo
                                    $contadorFAUD++;
                                    $auditivos[2]=$contadorFAUD;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorFAUP++;
                                    $auditivos[4]=$contadorFAUP;
                                    break;
                                case 4: //Especialización
                                    $contadorFAUE++;
                                    $auditivos[6]=$contadorFAUE;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorFAUA++;
                                    $auditivos[8]=$contadorFAUA;
                                break;
                            }
                            break;
                    }
                }
            }

            if($atl->alumno->genero=="Masculino"){
                if($atl->federado=="SISTEMÁTICO" && $atl->adaptado != "Si"){
                    switch($atl->categoria_id){
                        case 1: //SUB9
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorMS9I++;
                                    $s9[1]=$contadorMS9I;
                                    break;
                                case 2: //Desarrollo
                                    $contadorMS9D++;
                                    $s9[3]=$contadorMS9D;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorMS9P++;
                                    $s9[5]=$contadorMS9P;
                                    break;
                                case 4: //Especialización
                                    $contadorMS9E++;
                                    $s9[7]=$contadorMS9E;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorMS9A++;
                                    $s9[9]=$contadorMS9A;
                                break;
                            }
                            break;
                        case 2: //SUB11
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorMS11I++;
                                    $s11[1]=$contadorMS11I;
                                    break;
                                case 2: //Desarrollo
                                    $contadorMS11D++;
                                    $s11[3]=$contadorMS11D;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorMS11P++;
                                    $s11[5]=$contadorMS11P;
                                    break;
                                case 4: //Especialización
                                    $contadorMS11E++;
                                    $s11[7]=$contadorMS11E;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorMS11A++;
                                    $s11[9]=$contadorMS11A;
                                break;
                            }
                            break;
                        case 3: //SUB13
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorMS13I++;
                                    $s13[1]=$contadorMS13I;
                                    break;
                                case 2: //Desarrollo
                                    $contadorMS13D++;
                                    $s13[3]=$contadorMS13D;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorMS13P++;
                                    $s13[5]=$contadorMS13P;
                                    break;
                                case 4: //Especialización
                                    $contadorMS13E++;
                                    $s13[7]=$contadorMS13E;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorMS13A++;
                                    $s13[9]=$contadorMS13A;
                                break;
                            }
                            break;
                        case 4: //SUB16
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorMS16I++;
                                    $s16[1]=$contadorMS16I;
                                    break;
                                case 2: //Desarrollo
                                    $contadorMS16D++;
                                    $s16[3]=$contadorMS16D;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorMS16P++;
                                    $s16[5]=$contadorMS16P;
                                    break;
                                case 4: //Especialización
                                    $contadorMS16E++;
                                    $s16[7]=$contadorMS16E;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorMS16A++;
                                    $s16[9]=$contadorMS16A;
                                break;
                            }
                            break;
                        case 5: //SUB18
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorMS18I++;
                                    $s18[1]=$contadorMS18I;
                                    break;
                                case 2: //Desarrollo
                                    $contadorMS18D++;
                                    $s18[3]=$contadorMS18D;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorMS18P++;
                                    $s18[5]=$contadorMS18P;
                                    break;
                                case 4: //Especialización
                                    $contadorMS18E++;
                                    $s18[7]=$contadorMS18E;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorMS18A++;
                                    $s18[9]=$contadorMS18A;
                                break;
                            }
                            break;
                        case 6: //SUB21
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorMS21I++;
                                    $s21[1]=$contadorMS21I;
                                    break;
                                case 2: //Desarrollo
                                    $contadorMS21D++;
                                    $s21[3]=$contadorMS21D;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorMS21P++;
                                    $s21[5]=$contadorMS21P;
                                    break;
                                case 4: //Especialización
                                    $contadorMS21E++;
                                    $s21[7]=$contadorMS21E;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorMS21A++;
                                    $s21[9]=$contadorMS21A;
                                break;
                            }
                            break;
                        case 7: //SEGUNDA FUERZA
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorMSFI++;
                                    $sSF[1]=$contadorMSFI;
                                    break;
                                case 2: //Desarrollo
                                    $contadorMSFD++;
                                    $sSF[3]=$contadorMSFD;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorMSFP++;
                                    $sSF[5]=$contadorMSFP;
                                    break;
                                case 4: //Especialización
                                    $contadorMSFE++;
                                    $sSF[7]=$contadorMSFE;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorMSFA++;
                                    $sSF[9]=$contadorMSFA;
                                break;
                            }
                            break;
                        case 8:  //MAYORES
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorMMI++;
                                    $sM[1]=$contadorMMI;
                                    break;
                                case 2: //Desarrollo
                                    $contadorMMD++;
                                    $sM[3]=$contadorMMD;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorMMP++;
                                    $sM[5]=$contadorMMP;
                                    break;
                                case 4: //Especialización
                                    $contadorMME++;
                                    $sM[7]=$contadorMME;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorMMA++;
                                    $sM[9]=$contadorMMA;
                                break;
                            }
                            break;
                    }
                }
                else{
                    switch($atl->otro_programa_id){
                        case 2:
                            if($atl->alumno->edad<12){
                                $mPracticantes12++;
                                $practicantes[1] = $mPracticantes12;
                            }else if($atl->alumno->edad>=13 && $atl->alumno->edad<=17){
                                $mPracticantes13++;
                                $practicantes[3]= $mPracticantes13;
                            }
                            else if($atl->alumno->edad>=18 && $atl->alumno->edad<=21){
                                $mPracticantes18++;
                                $practicantes[5]= $mPracticantes18;
                            }
                            else if($atl->alumno->edad>=22 && $atl->alumno->edad<=35){
                                $mPracticantes22++;
                                $practicantes[7]= $mPracticantes22;
                            }
                            else if($atl->alumno->edad>=36 && $atl->alumno->edad<=50){
                                $mPracticantes36++;
                                $practicantes[9]= $mPracticantes36;
                            }
                            else{
                                $mPracticantes50++;
                                $practicantes[11]= $mPracticantes50;
                            }
                            break;
                        case 3:
                            if($atl->alumno->edad<12){
                                $mDiscapacidad12++;
                                $discapacidad[1] = $mDiscapacidad12;
                            }else if($atl->alumno->edad>=13 && $atl->alumno->edad<=17){
                                $mDiscapacidad13++;
                                $discapacidad[3]= $mDiscapacidad13;
                            }
                            else if($atl->alumno->edad>=18 && $atl->alumno->edad<=21){
                                $mDiscapacidad18++;
                                $discapacidad[5]= $mDiscapacidad18;
                            }
                            else if($atl->alumno->edad>=22 && $atl->alumno->edad<=35){
                                $mDiscapacidad22++;
                                $discapacidad[7]= $mDiscapacidad22;
                            }
                            else if($atl->alumno->edad>=36 && $atl->alumno->edad<=50){
                                $mDiscapacidad36++;
                                $discapacidad[9]= $mDiscapacidad36;
                            }
                            else{
                                $mDiscapacidad50++;
                                $discapacidad[11]= $mDiscapacidad50;
                            }
                            break;
                        case 4:
                            if($atl->alumno->edad<12){
                                $mVeteranos12++;
                                $veteranos[1] = $mVeteranos12;
                            }else if($atl->alumno->edad>=13 && $atl->alumno->edad<=17){
                                $mVeteranos13++;
                                $veteranos[3]= $mVeteranos13;
                            }
                            else if($atl->alumno->edad>=18 && $atl->alumno->edad<=21){
                                $mVeteranos18++;
                                $veteranos[5]= $mVeteranos18;
                            }
                            else if($atl->alumno->edad>=22 && $atl->alumno->edad<=35){
                                $mVeteranos22++;
                                $veteranos[7]= $mVeteranos22;
                            }
                            else if($atl->alumno->edad>=36 && $atl->alumno->edad<=50){
                                $mVeteranos36++;
                                $veteranos[9]= $mVeteranos36;
                            }
                            else{
                                $mVeteranos50++;
                                $veteranos[11]= $mVeteranos50;
                            }
                            break;
                    }
                }

                if($atl->adaptado == "Si"){
                    switch($atl->deporte_adaptado_id){
                        case 2://VISUALES
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorMVI++;
                                    $visuales[1]=$contadorMVI;
                                    break;
                                case 2: //Desarrollo
                                    $contadorMVD++;
                                    $visuales[3]=$contadorMVD;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorMVP++;
                                    $visuales[5]=$contadorMVP;
                                    break;
                                case 4: //Especialización
                                    $contadorMVE++;
                                    $visuales[7]=$contadorMVE;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorMVA++;
                                    $visuales[9]=$contadorMVA;
                                break;
                            }
                            break;
                        case 3://INTELECTUALES
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorMII++;
                                    $intelecto[1]=$contadorMII;
                                    break;
                                case 2: //Desarrollo
                                    $contadorMID++;
                                    $intelecto[3]=$contadorMID;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorMIP++;
                                    $intelecto[5]=$contadorMIP;
                                    break;
                                case 4: //Especialización
                                    $contadorMIE++;
                                    $intelecto[7]=$contadorMIE;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorMIA++;
                                    $intelecto[9]=$contadorMIA;
                                break;
                            }
                            break;
                        case 4://SÍNDROME DE DOWN
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorMSI++;
                                    $sindrome[1]=$contadorMSI;
                                    break;
                                case 2: //Desarrollo
                                    $contadorMSD++;
                                    $sindrome[3]=$contadorMSD;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorMSP++;
                                    $sindrome[5]=$contadorMSP;
                                    break;
                                case 4: //Especialización
                                    $contadorMSE++;
                                    $sindrome[7]=$contadorMSE;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorMSA++;
                                    $sindrome[9]=$contadorMSA;
                                break;
                            }
                            break;
                        case 5://PARÁLISIS CEREBRAL
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorMPI++;
                                    $paralisis[1]=$contadorMPI;
                                    break;
                                case 2: //Desarrollo
                                    $contadorMPD++;
                                    $paralisis[3]=$contadorMPD;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorMPP++;
                                    $paralisis[5]=$contadorMPP;
                                    break;
                                case 4: //Especialización
                                    $contadorMPE++;
                                    $paralisis[7]=$contadorMPE;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorMPA++;
                                    $paralisis[9]=$contadorMPA;
                                break;
                            }
                            break;
                        case 6://AMPUTADOS
                            switch($atl->etapa_deportiva_id){
                                case 1: //Aniciación
                                    $contadorMAI++;
                                    $amputados[1]=$contadorMAI;
                                    break;
                                case 2: //Desarrollo
                                    $contadorMAD++;
                                    $amputados[3]=$contadorMAD;
                                    break;
                                case 3: //Aerfeccionamiento
                                    $contadorMAA++;
                                    $amputados[5]=$contadorMAP;
                                    break;
                                case 4: //Especialización
                                    $contadorMAE++;
                                    $amputados[7]=$contadorMAE;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorMAA++;
                                    $amputados[9]=$contadorMAA;
                                break;
                            }
                            break;
                        case 7://SILLA DE RUEDAS
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorMRI++;
                                    $ruedas[1]=$contadorMRI;
                                    break;
                                case 2: //Desarrollo
                                    $contadorMRD++;
                                    $ruedas[3]=$contadorMRD;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorMRP++;
                                    $ruedas[5]=$contadorMRP;
                                    break;
                                case 4: //Especialización
                                    $contadorMRE++;
                                    $ruedas[7]=$contadorMRE;
                                    break;
                                case 5: //Rlto Rendimiento
                                    $contadorMRA++;
                                    $ruedas[9]=$contadorMRA;
                                break;
                            }
                            break;
                        case 8://AUDITIVOS
                            switch($atl->etapa_deportiva_id){
                                case 1: //Iniciación
                                    $contadorMAUI++;
                                    $auditivos[1]=$contadorMAUI;
                                    break;
                                case 2: //Desarrollo
                                    $contadorMAUD++;
                                    $auditivos[3]=$contadorMAUD;
                                    break;
                                case 3: //Perfeccionamiento
                                    $contadorMAUP++;
                                    $auditivos[5]=$contadorMAUP;
                                    break;
                                case 4: //Especialización
                                    $contadorMAUE++;
                                    $auditivos[7]=$contadorMAUE;
                                    break;
                                case 5: //Alto Rendimiento
                                    $contadorMAUA++;
                                    $auditivos[9]=$contadorMAUA;
                                break;
                            }
                            break;
                    }
                }
            }
        }

        //FEDERADOS
        $tS9 = array_sum($s9);
        $f9 = $s9[0]+$s9[2]+$s9[4]+$s9[6]+$s9[8];
        $m9 = $s9[1]+$s9[3]+$s9[5]+$s9[7]+$s9[9];

        $tS11 = array_sum($s11);
        $f11 = $s11[0]+$s11[2]+$s11[4]+$s11[6]+$s11[8];
        $m11 = $s11[1]+$s11[3]+$s11[5]+$s11[7]+$s11[9];

        $tS13 = array_sum($s13);
        $f13 = $s13[0]+$s13[2]+$s13[4]+$s13[6]+$s13[8];
        $m13 = $s13[1]+$s13[3]+$s13[5]+$s13[7]+$s13[9];

        $tS16 = array_sum($s16);
        $f16 = $s16[0]+$s16[2]+$s16[4]+$s16[6]+$s16[8];
        $m16 = $s16[1]+$s16[3]+$s16[5]+$s16[7]+$s16[9];

        $tS18 = array_sum($s18);
        $f18 = $s18[0]+$s18[2]+$s18[4]+$s18[6]+$s18[8];
        $m18 = $s18[1]+$s18[3]+$s18[5]+$s18[7]+$s18[9];

        $tS21 = array_sum($s21);
        $f21 = $s21[0]+$s21[2]+$s21[4]+$s21[6]+$s21[8];
        $m21 = $s21[1]+$s21[3]+$s21[5]+$s21[7]+$s21[9];

        $tSF = array_sum($sSF);
        $fF = $sSF[0]+$sSF[2]+$sSF[4]+$sSF[6]+$sSF[8];
        $mF = $sSF[1]+$sSF[3]+$sSF[5]+$sSF[7]+$sSF[9];

        $tM = array_sum($sM);
        $fM = $sM[0]+$sM[2]+$sM[4]+$sM[6]+$sM[8];
        $mM = $sM[1]+$sM[3]+$sM[5]+$sM[7]+$sM[9];

        $totalFemeninosFederados = $f9+$f11+$f13+$f16+$f18+$f21+$fF+$fM;
        $totalMasculinosFederados = $m9+$m11+$m13+$m16+$m18+$m21+$mF+$mM;
        $totalFederados = $tS9+$tS11+$tS13+$tS16+$tS18+$tS21+$tSF+$tM;

        //OTROS PROGRAMAS DE ATENCIÓN
        $tPracticantes = array_sum($practicantes);
        $fPracticantes = $practicantes[0]+$practicantes[2]+$practicantes[4]+$practicantes[6]+$practicantes[8]+$practicantes[10];
        $mPracticantes = $practicantes[1]+$practicantes[3]+$practicantes[5]+$practicantes[7]+$practicantes[9]+$practicantes[11];

        $tDiscapacidad = array_sum($discapacidad);
        $fDiscapacidad = $discapacidad[0]+$discapacidad[2]+$discapacidad[4]+$discapacidad[6]+$discapacidad[8]+$discapacidad[10];
        $mDiscapacidad = $discapacidad[1]+$discapacidad[3]+$discapacidad[5]+$discapacidad[7]+$discapacidad[9]+$discapacidad[11];

        $tVeteranos = array_sum($veteranos);
        $fVeteranos = $veteranos[0]+$veteranos[2]+$veteranos[4]+$veteranos[6]+$veteranos[8]+$veteranos[10];
        $mVeteranos = $veteranos[1]+$veteranos[3]+$veteranos[5]+$veteranos[7]+$veteranos[9]+$veteranos[11];
        
        $totalMasculinosOtros = $mPracticantes+$mDiscapacidad+$mVeteranos;
        $totalFemeninosOtros = $fPracticantes+$fDiscapacidad+$fVeteranos;
        $totalOtros = $tPracticantes+$tDiscapacidad+$tVeteranos;

        //DEPORTE ADAPTADO
        $tvisuales = array_sum($visuales);
        $fvisuales = $visuales[0]+$visuales[2]+$visuales[4]+$visuales[6]+$visuales[8];
        $mvisuales = $visuales[1]+$visuales[3]+$visuales[5]+$visuales[7]+$visuales[9];

        $tintelecto = array_sum($intelecto);
        $fintelecto = $intelecto[0]+$intelecto[2]+$intelecto[4]+$intelecto[6]+$intelecto[8];
        $mintelecto = $intelecto[1]+$intelecto[3]+$intelecto[5]+$intelecto[7]+$intelecto[9];

        $tsindrome = array_sum($sindrome);
        $fsindrome = $sindrome[0]+$sindrome[2]+$sindrome[4]+$sindrome[6]+$sindrome[8];
        $msindrome = $sindrome[1]+$sindrome[3]+$sindrome[5]+$sindrome[7]+$sindrome[9];

        $tparalisis = array_sum($paralisis);
        $fparalisis = $paralisis[0]+$paralisis[2]+$paralisis[4]+$paralisis[6]+$paralisis[8];
        $mparalisis = $paralisis[1]+$paralisis[3]+$paralisis[5]+$paralisis[7]+$paralisis[9];

        $tamputados = array_sum($amputados);
        $famputados = $amputados[0]+$amputados[2]+$amputados[4]+$amputados[6]+$amputados[8];
        $mamputados = $amputados[1]+$amputados[3]+$amputados[5]+$amputados[7]+$amputados[9];

        $truedas = array_sum($ruedas);
        $fruedas = $ruedas[0]+$ruedas[2]+$ruedas[4]+$ruedas[6]+$ruedas[8];
        $mruedas = $ruedas[1]+$ruedas[3]+$ruedas[5]+$ruedas[7]+$ruedas[9];

        $tauditivos = array_sum($auditivos);
        $fauditivos = $auditivos[0]+$auditivos[2]+$auditivos[4]+$auditivos[6]+$auditivos[8];
        $mauditivos = $auditivos[1]+$auditivos[3]+$auditivos[5]+$auditivos[7]+$auditivos[9];

        $totalAdaptados=$tauditivos+$truedas+$tamputados+$tparalisis+$tsindrome+$tintelecto+$tvisuales;
        $totalMasculinosAdaptados=$mauditivos+$mruedas+$mamputados+$mparalisis+$msindrome+$mintelecto+$mvisuales;
        $totalFemeninosAdaptados=$fauditivos+$fruedas+$famputados+$fparalisis+$fsindrome+$fintelecto+$fvisuales;

        //SUMA DE COLUMNAS
        $FFI=$s9[0]+$s11[0]+$s13[0]+$s16[0]+$s18[0]+$s21[0]+$sSF[0]+$sM[0];
        $FMI=$s9[1]+$s11[1]+$s13[1]+$s16[1]+$s18[1]+$s21[1]+$sSF[1]+$sM[1];

        $FFD=$s9[2]+$s11[2]+$s13[2]+$s16[2]+$s18[2]+$s21[2]+$sSF[2]+$sM[2];
        $FMD=$s9[3]+$s11[3]+$s13[3]+$s16[3]+$s18[3]+$s21[3]+$sSF[3]+$sM[3];

        $FFP=$s9[4]+$s11[4]+$s13[4]+$s16[4]+$s18[4]+$s21[4]+$sSF[4]+$sM[4];
        $FMP=$s9[5]+$s11[5]+$s13[5]+$s16[5]+$s18[5]+$s21[5]+$sSF[5]+$sM[5];

        $FFE=$s9[6]+$s11[6]+$s13[6]+$s16[6]+$s18[6]+$s21[6]+$sSF[6]+$sM[6];
        $FME=$s9[7]+$s11[7]+$s13[7]+$s16[7]+$s18[7]+$s21[7]+$sSF[7]+$sM[7];

        $FFA=$s9[8]+$s11[8]+$s13[8]+$s16[8]+$s18[8]+$s21[8]+$sSF[8]+$sM[8];
        $FMA=$s9[9]+$s11[9]+$s13[9]+$s16[9]+$s18[9]+$s21[9]+$sSF[1]+$sM[9];
        $columnasFederados = array();
        array_push($columnasFederados,$FFI);
        array_push($columnasFederados,$FMI);
        array_push($columnasFederados,$FFD);
        array_push($columnasFederados,$FMD);
        array_push($columnasFederados,$FFP);
        array_push($columnasFederados,$FMP);
        array_push($columnasFederados,$FFE);
        array_push($columnasFederados,$FME);
        array_push($columnasFederados,$FFA);
        array_push($columnasFederados,$FMA);

        $AFI=$visuales[0]+$intelecto[0]+$sindrome[0]+$paralisis[0]+$amputados[0]+$ruedas[0]+$auditivos[0];
        $AMI=$visuales[1]+$intelecto[1]+$sindrome[1]+$paralisis[1]+$amputados[1]+$ruedas[1]+$auditivos[1];

        $AFD=$visuales[2]+$intelecto[2]+$sindrome[2]+$paralisis[2]+$amputados[2]+$ruedas[2]+$auditivos[2];
        $AMD=$visuales[3]+$intelecto[3]+$sindrome[3]+$paralisis[3]+$amputados[3]+$ruedas[3]+$auditivos[3];

        $AFP=$visuales[4]+$intelecto[4]+$sindrome[4]+$paralisis[4]+$amputados[4]+$ruedas[4]+$auditivos[4];
        $AMP=$visuales[5]+$intelecto[5]+$sindrome[5]+$paralisis[5]+$amputados[5]+$ruedas[5]+$auditivos[5];

        $AFE=$visuales[6]+$intelecto[6]+$sindrome[6]+$paralisis[6]+$amputados[6]+$ruedas[6]+$auditivos[6];
        $AME=$visuales[7]+$intelecto[7]+$sindrome[7]+$paralisis[7]+$amputados[7]+$ruedas[7]+$auditivos[7];

        $AFA=$visuales[8]+$intelecto[8]+$sindrome[8]+$paralisis[8]+$amputados[8]+$ruedas[8]+$auditivos[8];
        $AMA=$visuales[9]+$intelecto[9]+$sindrome[9]+$paralisis[9]+$amputados[9]+$ruedas[9]+$auditivos[9];
        $columnasAdaptados = array();
        array_push($columnasAdaptados,$AFI);
        array_push($columnasAdaptados,$AMI);
        array_push($columnasAdaptados,$AFD);
        array_push($columnasAdaptados,$AMD);
        array_push($columnasAdaptados,$AFP);
        array_push($columnasAdaptados,$AMP);
        array_push($columnasAdaptados,$AFE);
        array_push($columnasAdaptados,$AME);
        array_push($columnasAdaptados,$AFA);
        array_push($columnasAdaptados,$AMA);

        $F12=$practicantes[0]+$discapacidad[0]+$veteranos[0];
        $M12=$practicantes[1]+$discapacidad[1]+$veteranos[1];

        $F13=$practicantes[2]+$discapacidad[2]+$veteranos[2];
        $M13=$practicantes[3]+$discapacidad[3]+$veteranos[3];

        $F18=$practicantes[4]+$discapacidad[4]+$veteranos[4];
        $M18=$practicantes[5]+$discapacidad[5]+$veteranos[5];

        $F22=$practicantes[6]+$discapacidad[6]+$veteranos[6];
        $M22=$practicantes[7]+$discapacidad[7]+$veteranos[7];

        $F36=$practicantes[8]+$discapacidad[8]+$veteranos[8];
        $M36=$practicantes[9]+$discapacidad[9]+$veteranos[9];

        $F50 = $practicantes[10]+$discapacidad[10]+$veteranos[10];
        $M50 = $practicantes[11]+$discapacidad[11]+$veteranos[11];
        $columnasOtros = array();
        array_push($columnasOtros,$F12);
        array_push($columnasOtros,$M12);
        array_push($columnasOtros,$F13);
        array_push($columnasOtros,$M13);
        array_push($columnasOtros,$F18);
        array_push($columnasOtros,$M18);
        array_push($columnasOtros,$F22);
        array_push($columnasOtros,$M22);
        array_push($columnasOtros,$F36);
        array_push($columnasOtros,$M36);
        array_push($columnasOtros,$F50);
        array_push($columnasOtros,$M50);
        $fecha = Carbon::now();
        $mes = Carbon::parse($fecha)->format('m');
        $anio = Carbon::parse($fecha)->format('Y');
        $mostrarMes = "";
        switch ($mes){
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
        $federacion = Deporte::find(1);
        $departamento = Departamento::find(13);
        return PDF::loadView('Reportes.edg31.pdf',compact("s9","s11","s13","s16","s18","s21","sSF","sM",
        "tS9","f9","m9","tS11","f11","m11","tS13","f13","m13","tS16","f16","m16",
        "tS18","f18","m18","tS21","f21","m21","tSF","fF","mF","tM","fM","mM",
        "practicantes","discapacidad","veteranos","tPracticantes","fPracticantes","mPracticantes",
        "tDiscapacidad","fDiscapacidad","mDiscapacidad","tVeteranos","fVeteranos","mVeteranos",
        "visuales","intelecto","sindrome","paralisis","amputados","ruedas","auditivos",
        "tvisuales","fvisuales","mvisuales","tintelecto","fintelecto","mintelecto",
        "tsindrome","fsindrome","msindrome","tparalisis","fparalisis","mparalisis",
        "tamputados","famputados","mamputados","truedas","fruedas","mruedas",
        "tauditivos","fauditivos","mauditivos","columnasFederados","columnasAdaptados",
        "columnasOtros","totalFemeninosFederados","totalMasculinosFederados",
        "totalFederados","totalMasculinosOtros","totalFemeninosOtros","totalOtros",
        "totalFemeninosAdaptados","totalMasculinosAdaptados","totalAdaptados","entrega","anio","mostrarMes","federacion","departamento"))->setPaper('8.5x11')->stream();
    }
}