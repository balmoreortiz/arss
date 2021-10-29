<?php

use App\Http\Controllers\RepuestoController;
use Illuminate\Support\Facades\Route;
//controlares
use App\Http\Controllers\RolController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UsuarioController;
use App\Models\Repuesto;
use App\Models\Servicio;
use Illuminate\Http\Request;

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

Route::get('/', function (Request $request) {
    $nombre = $request->get('buscarpor');        

    $repuestos = Repuesto::where('NOM_REP','like',"%$nombre%")->latest()->get();
    $servicios = Servicio::where('NOM_SERV','like',"%$nombre%")->latest()->get();
    
    return view('welcome',compact('repuestos','servicios','nombre'));
});
Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>['auth']],function(){
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('repuestos', RepuestoController::class);
    Route::resource('servicios', ServicioController::class);
});