<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Activitylog\Models\Activity;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Ver lista de roles')->only(['index']);
        $this->middleware('permission:Crear rol')->only(['create', 'store']);
        $this->middleware('permission:Editar rol')->only(['edit', 'update']);
        $this->middleware('permission:Eliminar rol')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('Rol.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permisos = Permission::all();
        return view('Rol.create', compact('permisos'));
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required|unique:roles'
        ]);

        $rol = new Role($request->all());
        // $rol->name = $request->name;
        $rol->save();

        // $rol->permission()->sync($request->permisos[]);
        $rol->syncPermissions($request->permisos);

        activity()->useLog('Rol')->log('Nuevo')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = Role::all()->last()->id;
        $lastActivity->save();

        return redirect()->route('roles.index');
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
        $rol=Role::findOrFail($id);
        $permisos = Permission::all();

        return view('Rol.edit2',compact('rol', 'permisos'));
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
        $this->validate($request,[
            'name'=> "required|unique:roles,name,$id",
            'name'=> "required|unique:roles,guard_name,$id",
        ]);

        $rol = Role::findOrFail($id);
        $rol->name = $request->name;
        $rol->syncPermissions($request->permisos);

        $rol->save();

        activity()->useLog('Rol')->log('Modificación')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $id;
        $lastActivity->save();

        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::destroy($id);

        activity()->useLog('Rol')->log('Eliminación')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $id;
        $lastActivity->save();

        return redirect('roles');
    }
}
