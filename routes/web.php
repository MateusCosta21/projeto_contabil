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


Route::get('/registro', [App\Http\Controllers\RegistroController::class, 'index'])->name('registro')->middleware('auth');
Route::get('/registro/novo', [App\Http\Controllers\RegistroController::class, 'new'])->name('new')->middleware('auth');;
Route::post('/registro/add', [App\Http\Controllers\RegistroController::class, 'add'])->name('add')->middleware('auth');;
Route::get('/registro/{id}/edit', [App\Http\Controllers\RegistroController::class, 'edit'])->name('edit')->middleware('auth');;
Route::post('/registro/update/{id}', [App\Http\Controllers\RegistroController::class, 'update'])->name('update')->middleware('auth');;
Route::delete('/registro/delete/{id}', [App\Http\Controllers\RegistroController::class, 'delete'])->name('delete')->middleware('auth');;

