<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


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
Route::group(['middleware' => 'web'], function(){
Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});

Route::get('/registro', function () {return view('registro');})->name('registro')->middleware('auth');

Route::post('/registrar', [App\Http\Controllers\UsuariosController::class, 'add'])->name('registrar');


/* MENU CADASTROS */


/* INICIO CLIENTES*/
Route::get('/clientes', [App\Http\Controllers\ClientesController::class, 'index'])->name('clientes')->middleware('auth');
Route::get('/cadastra_cliente', function () {return view('clientes.cadastra_cliente');})->name('cadastra_cliente')->middleware('auth');
Route::post('/cadastra_cliente/add', [App\Http\Controllers\ClientesController::class, 'add'])->name('add')->middleware('auth');
Route::get('/cadastra_cliente/{id}/edit', [App\Http\Controllers\ClientesController::class, 'edit'])->name('edit')->middleware('auth');;
Route::post('/cadastra_cliente/update/{id}', [App\Http\Controllers\ClientesController::class, 'update'])->name('update')->middleware('auth');;
Route::delete('/cadastra_cliente/delete/{id}', [App\Http\Controllers\ClientesController::class, 'delete'])->name('delete')->middleware('auth');;
/* FIM CLIENTES */

/* INICIO Tipos de objeto*/

Route::get('/tipos_objetos', [App\Http\Controllers\TiposObjetoController::class, 'index'])->name('tipo_objeto')->middleware('auth');
Route::get('/tipos_objetos/novo', [App\Http\Controllers\TiposObjetoController::class, 'new'])->name('new')->middleware('auth');
Route::post('/tipos_objetos/add', [App\Http\Controllers\TiposObjetoController::class, 'add'])->name('adiciona_outro')->middleware('auth');
Route::get('/tipos_objetos/{id}/edit', [App\Http\Controllers\TiposObjetoController::class, 'edit'])->name('edita_tipo')->middleware('auth');;
Route::post('/tipos_objetos/update/{id}', [App\Http\Controllers\TiposObjetoController::class, 'update'])->name('update_tipos')->middleware('auth');;
Route::delete('/tipos_objetos/delete/{id}', [App\Http\Controllers\TiposObjetoController::class, 'delete'])->name('delete_tipos')->middleware('auth');;
/* fim Tipos de objeto*/

///INICIO PRESTADOR
Route::get('/prestadores', [App\Http\Controllers\PrestadoresController::class, 'index'])->name('prestadores')->middleware('auth');
Route::get('/prestadores/novo', [App\Http\Controllers\PrestadoresController::class, 'new'])->name('novo_prestador')->middleware('auth');
Route::post('/prestadores/add', [App\Http\Controllers\PrestadoresController::class, 'add'])->name('adiciona_prestador')->middleware('auth');
Route::get('/prestadores/{id}/edit', [App\Http\Controllers\PrestadoresController::class, 'edit'])->name('edita_prestador')->middleware('auth');;
Route::post('/prestadores/update/{id}', [App\Http\Controllers\PrestadoresController::class, 'update'])->name('update_prestador')->middleware('auth');;
Route::delete('/prestadores/delete/{id}', [App\Http\Controllers\PrestadoresController::class, 'delete'])->name('delete_prestador')->middleware('auth');;
/// FIM PRESTADOR




//INICIO OBJETOS
Route::post('/objeto/add', [App\Http\Controllers\ObjetoController::class, 'add'])->name('adiciona_objeto')->middleware('auth');
Route::post('/objeto/enviaRota', [App\Http\Controllers\ObjetoController::class, 'enviaRota'])->name('enviaRota')->middleware('auth');
Route::post('/objeto/update/{id}', [App\Http\Controllers\ObjetoController::class, 'update'])->name('edita_objeto')->middleware('auth');;
Route::delete('/objeto/delete/{id}', [App\Http\Controllers\ObjetoController::class, 'delete'])->name('deletaRota')->middleware('auth');
Route::post('/objeto/finaliza_processo', [App\Http\Controllers\ObjetoController::class, 'finaliza_processo'])->name('finaliza_processo')->middleware('auth');
Route::post('/objeto/retorna_processo', [App\Http\Controllers\ObjetoController::class, 'retorna_processo'])->name('retorna_processo')->middleware('auth');
Route::get('/objetos/consulta', [App\Http\Controllers\ObjetoController::class, 'index'])->name('consulta_objetos')->middleware('auth');
Route::post('/objetos/buscaCliente', [App\Http\Controllers\ObjetoController::class, 'buscaCliente'])->name('buscaCliente')->middleware('auth');
Route::get('/novo_modal', [App\Http\Controllers\ModalsController::class, 'index'])->name('novo_modal')->middleware('auth');;
//FIM OBJETOS
Route::get('/juridico/assuntos', [App\Http\Controllers\JuridicoController::class, 'index'])->name('assuntos_juridicos')->middleware('auth');
Route::get('/juridico/assuntos/novo', [App\Http\Controllers\JuridicoController::class, 'new'])->name('novo_assunto')->middleware('auth');










/* FIM MENU CADASTROS */
