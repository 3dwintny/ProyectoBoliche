<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atleta;
use App\Models\Etapa_Deportiva;

class EDG31Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atletas = Atleta::all();
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

        foreach($atletas as $atl){
            if($atl->alumno->genero=="Femenino"){
                if($atl->federado=="SISTEMÁTICO"){
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

                if($atl->adaptado == "SI"){
                    switch($atl->deporte_adaptado_id){
                        case 2:
                            break;
                        case 3:
                            break;
                        case 4:
                            break;
                        case 5:
                            break;
                        case 6:
                            break;
                        case 7:
                            break;
                        case 8:
                            break;
                    }
                }
            }

            if($atl->alumno->genero=="Masculino"){
                if($atl->federado=="SISTEMÁTICO"){
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

                if($atl->adaptado == "SI"){
                    switch($atl->deporte_adaptado_id){
                        case 2:
                            break;
                        case 3:
                            break;
                        case 4:
                            break;
                        case 5:
                            break;
                        case 6:
                            break;
                        case 7:
                            break;
                        case 8:
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
        return view('Reportes.edg31.index',compact("s9","s11","s13","s16","s18","s21","sSF","sM",
        "tS9","f9","m9","tS11","f11","m11","tS13","f13","m13","tS16","f16","m16",
        "tS18","f18","m18","tS21","f21","m21","tSF","fF","mF","tM","fM","mM",
        "practicantes","discapacidad","veteranos","tPracticantes","fPracticantes","mPracticantes",
        "tDiscapacidad","fDiscapacidad","mDiscapacidad","tVeteranos","fVeteranos","mVeteranos"));
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
}
