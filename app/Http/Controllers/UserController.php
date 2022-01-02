<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Odontologo;
use App\Models\Recepcionista;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Activitylog\Models\Activity;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Ver lista de usuarios')->only(['index']);
        $this->middleware('permission:Crear usuario')->only(['create', 'store']);
        $this->middleware('permission:Editar usuario')->only(['edit', 'update']);
        $this->middleware('permission:Eliminar usuario')->only(['destroy']);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('User.index2', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = DB::table('roles')->get();
        $odontologos = DB::table('tabla_odontologo')->whereNull('user_id')->get();
        $recepcionistas = DB::table('table_recepcionista')->whereNull('user_id')->get();
        return view('User.create', ['roles'=>$roles, 'odontologos'=>$odontologos, 'recepcionistas'=>$recepcionistas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
             'name'=> 'required|unique:users',
             'password' => 'required',
             'roles' => 'required'
        ]);

        $usuario = new User;
        $usuario->name = $request->name;
        $usuario->password = bcrypt(($request->password));
        $usuario->save();

        $usuario->roles()->sync($request->roles);

        if($request->odontologos > 0){
            $odontologo = Odontologo::findOrFail($request->odontologos);
            $odontologo->user_id = $usuario->id;
            $odontologo->save();
        }

        if($request->recepcionistas > 0){
            $recepcionista = Recepcionista::find($request->recepcionistas);
            $recepcionista->user_id = $usuario->id;
            $recepcionista->save();
        }

        // activity()->log('created');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('User.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = DB::table('roles')->get();
        $odontologos = DB::table('tabla_odontologo')->whereNull('user_id')->get();
        $recepcionistas = DB::table('table_recepcionista')->whereNull('user_id')->get();

        $rol = DB::table('model_has_roles')->where('model_id', $id)->first();
        $rol_name = DB::table('roles')->where('id', $rol->role_id)->first();

        $o = DB::table('tabla_odontologo')->where('user_id', $id)->count();
        $r = DB::table('table_recepcionista')->where('user_id', $id)->count();

        $personaO = DB::table('tabla_odontologo')->where('user_id', $id)->first();
        $personaR = DB::table('table_recepcionista')->where('user_id', $id)->first();

        return view('User.edit', ['roles'=>$roles, 'odontologos'=>$odontologos, 'recepcionistas'=>$recepcionistas, 'user'=>$user, 'personaO' => $personaO, 'personaR' => $personaR, 'o'=>$o, 'r'=>$r, 'rol'=>$rol, 'rol_name'=>$rol_name]);

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
            'name'=> "unique:users,name,$id",
            // 'password' => 'required',
            'roles' => 'required'
       ]);

        $usuario = User::findOrFail($id);
        if($usuario->name <> $request->name){
            $usuario->name = $request->name;
        }
        if($request->password <> ''){
            $usuario->password = bcrypt(($request->password));
            // $usuario->password = $request->password;
        }

        $usuario->save();

        $usuario->roles()->sync($request->roles);

        if (DB::table('tabla_odontologo')->where('user_id', $id)->exists()) {
            //$personaO = DB::table('tabla_odontologo')->where('user_id', $id)->first();
            //$personaO->user_id = null;
            $personaO = DB::table('tabla_odontologo')->where('user_id', $id)->update(['user_id'=>null]);
        }

        if (DB::table('table_recepcionista')->where('user_id', $id)->exists()) {
            // $personaR = DB::table('table_recepcionista')->where('user_id', $id)->first();
            // $personaR->user_id = null;
            $personaR = DB::table('table_recepcionista')->where('user_id', $id)->update(['user_id'=>null]);
        }

        $personaR = DB::table('table_recepcionista')->where('user_id', $id)->first();

        if($request->odontologos > 0){
            $odontologo = Odontologo::findOrFail($request->odontologos);
            $odontologo->user_id = $usuario->id;
            $odontologo->save();
        }

        if($request->recepcionistas > 0){
            $recepcionista = Recepcionista::find($request->recepcionistas);
            $recepcionista->user_id = $usuario->id;
            $recepcionista->save();
        }

        // activity()->log('update');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        //activity()->log('deleted');
        return redirect('Users');
    }

    public function changePassword($id){
        $user = User::findOrFail($id);

        return view('User.changePassword',['user'=>$user]);
    }

    public function updatePassword(Request $request){
        $this->validate($request,[
            'contraseña'=> 'required',
            'nueva' => 'required|min:4',
            'confirmacion' => 'required|min:4|same:nueva'
       ]);

       $usuario = Auth::user();

       if(Hash::check($request->contraseña, $usuario->password)){
           $usuario->password = bcrypt($request->nueva);
           $usuario->save();
            // dd($usuario);
            activity()->log('cambio de contraseña');
            //return redirect()->back()->with('sucess','Contraseña actualizada');
            return redirect('home');
       }
       return redirect('home');
    }
}