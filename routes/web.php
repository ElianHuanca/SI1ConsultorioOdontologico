<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Pacientescontroller;
use App\Http\Controllers\RecepcionistasController;
use App\Http\Controllers\OdontologosController;
use App\Http\Controllers\ServiciosControllers;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\BitacoraController;

use App\Http\Controllers\PagosController;
use App\Http\Controllers\PlanesController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\admin\AtencionController;
use App\Http\Controllers\admin\HistorialController;
use App\Http\Controllers\TratamientosController;
use App\Http\Controllers\ReservasController;
use App\Http\Controllers\RecetasController;
use App\Http\Controllers\AgendasController;
use App\Http\Controllers\Reserva_ServicioController;
use App\Http\Controllers\admin\OdontogramaController;
use App\Http\Controllers\FacturasController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\Charcontroller;
use App\Http\Controllers\CarlaController;
//use App\Http\Controllers\GraficasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('Users', UserController::class)->names('users');
Route::resource('bitacora', BitacoraController::class)->names('bitacora');
Route::get('Users/{id}/changePassword',  [UserController::class, 'changePassword']);
Route::post('Users/updatePassword', [UserController::class, 'updatePassword'])->name('updatePassword');
Route::resource('paciente', PacientesController::class);
Route::resource('recepcionista', RecepcionistasController::class);
Route::resource('odontologo', OdontologosController::class);
Route::resource('servicio', ServiciosControllers::class);
Route::resource('producto', ProductosController::class);

Route::resource('pago', PagosController::class);
Route::resource('plan', PlanesController::class);
//Route::get('paciente',[PacientesController::class,'index'])->name('paciente');
/*Route::get('crear',[PacientesController::class,'create']);
Route::post('crear', [PacientesController::class,'store']);
Route::get('editar', [PacientesController::class,'edit']);*/
Route::resource('permisos', PermisoController::class)->names('permisos');
Route::resource('roles', RoleController::class)->names('roles');
Route::resource('atencions', AtencionController::class)->names('admin.atencions');
Route::resource('historials', HistorialController::class)->names('admin.historials');
Route::resource('odontogramas', OdontogramaController::class)->names('admin.odontogramas');
Route::resource('tratamiento', TratamientosController::class);
Route::resource('reserva', ReservasController::class);
Route::resource('receta', RecetasController::class);
Route::resource('agenda', AgendasController::class);
Route::resource('factura', FacturasController::class);
Route::resource('download',DownloadController::class);


Route::get('descargarpdf',[CarlaController::class,'PDFPaciente'])->name('descargarpdf');
Route::get('descargarpdf/{reserva}',[CarlaController::class,'PDFReserva'])->name('des.pdf');;
Route::get('descarga/{paciente}',[CarlaController::class,'PDFHistorial'])->name('descarga');

//Route::get('char', [Charcontroller::class,'index']) ;



