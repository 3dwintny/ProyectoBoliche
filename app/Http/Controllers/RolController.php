<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RolController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-rol|crear-rol|editar-rol|eliminar-rol',['only'=> ['index']]);
        $this->middleware('permission:crear-rol', ['only'=> ['create','store']]);
        $this->middleware('permission:editar-rol', ['only'=> ['edit','update']]);
        $this->middleware('permission:eliminar-rol', ['only'=> ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $roles = Role::paginate();
            return view('roles.index', compact('roles'));
        }
        catch(\Exception $e){
            report($e);
            $this->addError('error','Se produjo un error al procesar la solicitud');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            $permission = Permission::get();
            return view('roles.crear', compact('permission'));
        }
        catch(\Exception $e){
            report($e);
            $this->addError('error','Se produjo un error al procesar la solicitud');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $this->validate($request,[
                'name'=> 'required' , 'permission' => 'required']);
    
            $role = Role::create(['name' => $request-> input('name')]);
            $role ->syncPermissions($request->input('permission'));
    
            return redirect()->route('roles.index')->with('success','Rol registrado exitosamente');
        }
        catch(\Exception $e){
            report($e);
            $this->addError('error','Se produjo un error al procesar la solicitud');
        }
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
        try{
            $role = Role::find($id);
            $permission = Permission::get();
            $rolePermissions =DB::table('role_has_permissions')->where('role_has_permissions.role_id', $id)
                ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
                ->all();
            return view('roles.editar', compact('role', 'permission', 'rolePermissions'));
        }
        catch(\Exception $e){
            report($e);
            $this->addError('error','Se produjo un error al procesar la solicitud');
        }
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
        try{
            $this->validate($request, ['name'=> 'required' , 'permission' => 'required']);

            $role = Role::find($id);
            $role->name = $request->input('name');
            $role->save();

            $role->syncPermissions($request->input('permission'));
            return redirect()->route('roles.index')->with('success','Rol actualizado exitosamente');
        }
        catch(\Exception $e){
            report($e);
            $this->addError('error','Se produjo un error al actualizar el rol');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            DB::table('roles')->where('id',$id)->delete();
            return redirect()->route('roles.index')->with('success','Rol eliminado exitosamente');
        }
        catch(\Exception $e){
            report($e);
            $this->addError('error','Se produjo un error al eliminar al rol');
        }
    }
}
