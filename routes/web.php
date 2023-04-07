<?php

use Illuminate\Support\Facades\Route;

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

/* INICIO CLIENTES */
Route::get('/clientes', [App\Http\Controllers\ClientesController::class, 'index'])->name('clientes')->middleware('auth');
Route::get('/cadastra_cliente', function () {return view('clientes.cadastra_cliente');})->name('cadastra_cliente')->middleware('auth');
Route::post('/cadastra_cliente/add', [App\Http\Controllers\ClientesController::class, 'add'])->name('add')->middleware('auth');
Route::get('/cadastra_cliente/{id}/edit', [App\Http\Controllers\ClientesController::class, 'edit'])->name('edit')->middleware('auth');;
Route::post('/cadastra_cliente/update/{id}', [App\Http\Controllers\ClientesController::class, 'update'])->name('update')->middleware('auth');;

/* FIM CLIENTES */