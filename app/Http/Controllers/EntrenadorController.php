<?php

namespace App\Http\Controllers;
use App\Models\Nivel_cdag;
use App\Models\Nivel_fadn;
use App\Models\Tipo_Contrato;
use App\Models\Departamento;
use App\Models\Nacionalidad;
use App\Models\Deporte;
use App\Models\Entrenador;
use Illuminate\Http\Request;
use Hashids\Hashids;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class EntrenadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:ver-rol | crear-rol | editar-rol |  eliminar-rol ', ['only'=> ['index']]);
        $this->middleware('permission:crear-rol', ['only'=> ['create','store']]);
        $this->middleware('permission:editar-rol', ['only'=> ['edit','update']]);
        $this->middleware('permission:eliminar-rol', ['only'=> ['destroy']]);
    }

    public function index()
    {

        $entrenadores = Entrenador::paginate();
        return view('entrenador.index', compact('entrenadores'))
            ->with('i', (request()->input('page', 1) - 1) * $entrenadores->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hoy = Carbon::now();
        $niveles_cdag = Nivel_cdag::All();
        $niveles_fadn = Nivel_fadn::All();
        $departamentos = Departamento::All();
        $nacionalidades = Nacionalidad::All();
        $deportes = Deporte::All();
        $tipos_contratos = Tipo_Contrato::All();
        return view('entrenador.create',compact("niveles_cdag","niveles_fadn","departamentos","nacionalidades"
        ,"deportes","tipos_contratos","hoy"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $entrenador = new Entrenador($request->all());
        if($request->hasFile('foto'))
        {
            $file = $request->file('foto');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('storage/uploads/', $filename);
            $entrenador->foto = $filename;
        }
        $entrenador->save();
        return redirect()->action([EntrenadorController::class, 'index']);
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
    public function edit($id,Request $request)
    {
        $idEncriptado = $request->e;
        $hashid = new Hashids();
        $idDesencriptado = $hashid->decode($idEncriptado);
        $id = $idDesencriptado[0];
        $entrenador = Entrenador::find($id);
        $niveles_cdag = Nivel_cdag::All();
        $niveles_fadn = Nivel_fadn::All();
        $departamentos = Departamento::All();
        $nacionalidades = Nacionalidad::All();
        $deportes = Deporte::All();
        $tipos_contratos = Tipo_Contrato::All();
        return view('entrenador.edit',compact('entrenador','niveles_cdag','niveles_fadn','departamentos','tipos_contratos','deportes','nacionalidades'));
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
        $entrenador = Entrenador::find($id);
        $entrenador->fill($request->all());
        if($request->hasFile('foto'))
        {
            $destination = 'storage/uploads/'.$entrenador->foto;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('foto');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('storage/uploads/', $filename);
            $entrenador->foto = $filename;
        }
        $entrenador->save();
        return redirect()->action([EntrenadorController::class,'index']);
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
