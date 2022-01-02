<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usuario = Auth::user();
        $rol = DB::table('model_has_roles')->where('model_id', $usuario->id)->first();
        $rol_name = DB::table('roles')->where('id', $rol->role_id)->first();

        $o = DB::table('tabla_odontologo')->where('user_id', $rol->role_id)->count();
        $r = DB::table('table_recepcionista')->where('user_id', $rol->role_id)->count();

        $personaO = DB::table('tabla_odontologo')->where('user_id', $usuario->id)->first();
        $personaR = DB::table('table_recepcionista')->where('user_id', $usuario->id)->first();

        return view('home', ['usuario'=>$usuario, 'rol_name'=>$rol_name, 'personaO' => $personaO, 'personaR' => $personaR, 'o'=>$o, 'r'=>$r]);
    }
}
