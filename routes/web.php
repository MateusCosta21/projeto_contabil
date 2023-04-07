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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/registro', function () {
return view('registro');
})->name('registro');

/* INICIO CLIENTES */
Route::get('/clientes', function () {
    return view('clientes.clientes');
    })->name('clientes');

Route::get('/cadastra_cliente', function () {
    return view('clientes.cadastra_cliente');
})->name('cadastra_cliente');

/* FIM CLIENTES */