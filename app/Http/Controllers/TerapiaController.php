<?php

namespace App\Http\Controllers;
use App\Models\Psicologia;
use App\Models\Atleta;
use App\Models\Alumno;
use App\Models\Terapia;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use PDF;

class TerapiaController extends Controller
{
    protected $t;
    public function __construct(Terapia $t){
        $this->t = $t;  
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$terapias = Terapia::with('psicologia','atleta')->get();
        return redirect()->action([TerapiaController::class,'create']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $psicologos = Psicologia::all();
        $atletas = Atleta::all();
        $hoy = Carbon::now();
        $hora = Carbon::now()->toTimeString('minute');
        return view('psicologia.terapias.create',compact('psicologos','atletas','hoy','hora'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $terapias = new Terapia($request->all());
        $terapias->save();
        return redirect()->action([TerapiaController::class,'index']);
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
        $terapia = $this->t->obtenerTerapiaById($id);
        $atleta = Atleta::where('id',$terapia->atleta_id)->get();
        foreach ($atleta as $item){
            $alumno = Alumno::where('id',$item->alumno_id)->get();
        }
        return view('psicologia.terapias.edit',['terapia' => $terapia,'alumno' => $alumno]);
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
        $terapia = Terapia::find($id);
        $terapia ->fill($request->all());
        $terapia->save();
        return redirect()->action([TerapiaController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $terapia = Terapia::find($id);
        $terapia->delete();
        return redirect()->action([TerapiaController::class,'index']);
    }

    public function getPaciente(Request $request)
    {
        $paciente = DB::table('terapia')
        ->where('atleta_id', $request->atleta_id)->get();
        
        if (count($paciente)>0){
            return response()->json($paciente);
        }
    }

    public function getHistorial(Request $request)
    {
        $historial = DB::table('terapia')
        ->where('atleta_id', $request->atleta)->get();
        $atleta = DB::table('atleta')
        ->where('id', $request->atleta)->get('alumno_id');
        $alumno = "";
        foreach ($atleta as $item){
            $alumno = $item->alumno_id;
        }
        $nombre = DB::table('alumno')
        ->where('id',$alumno)->get();
        $completo = "";
        foreach ($nombre as $item){
            $completo = $item->nombre1." ".$item->nombre2." ".$item->nombre3." ".$item->apellido1." ".$item->apellido2;
        }
        if (count($historial)>0){
            return view('psicologia.terapias.show',compact('historial','completo'));
        }
        else{
            return view('psicologia.terapias.sinresultados',compact('completo'));
        }
    }

    public function generarPDF($id)
    {
        $terapia = $this->t->obtenerTerapiaById($id);
        $atleta = Atleta::where('id',$terapia->atleta_id)->get();
        foreach ($atleta as $item){
            $alumno = Alumno::where('id',$item->alumno_id)->get();
        }
        return PDF::loadView('psicologia.terapias.pdf',['terapia' => $terapia,'alumno' => $alumno])->setPaper('8.5x11')->stream();
    }
}
