<?php


use Illuminate\Support\Facades\Route;
//controlares
use App\Http\Controllers\BotManController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\ShowServicio;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RepuestoController;
use App\Http\Controllers\ShowRepuesto;
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
    $precios = ($request->get('precios')) ? ($request->get('precios')) : 100 ;        

    $repuestos = Repuesto::where('NOM_REP','like',"%$nombre%")->whereBetween('PREC_REP', [0, $precios])->latest()->get();
    $servicios = Servicio::where('NOM_SERV','like',"%$nombre%")->whereBetween('PREC_SERV', [0, $precios])->latest()->get();

    
    return view('welcome',compact('repuestos','servicios','nombre','precios'));
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::match(['get', 'post'], 'botman', [BotManController::class, 'handle']);
Route::get('serv/{id}', ShowServicio::class);
Route::get('rep/{id}', ShowRepuesto::class);


Route::group(['middleware'=>['auth']],function(){
    Route::match(['get', 'post'], 'botman', [BotManController::class, 'handle']);
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('repuestos', RepuestoController::class);
    Route::resource('servicios', ServicioController::class);
});