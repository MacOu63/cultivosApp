<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\MercadoController::class, 'index']);
Auth::routes();

Route::resource('/cultivos', App\Http\Controllers\CultivoController::class)->middleware('auth');
Route::resource('/departamentos', App\Http\Controllers\DepartamentoController::class)->middleware('auth');
Route::resource('/consultas', App\Http\Controllers\ConsultaController::class)->middleware('auth');
Route::resource('/precios', App\Http\Controllers\PrecioController::class)->middleware('auth');
Route::resource('/preferencias', App\Http\Controllers\PreferenciaController::class)->middleware('auth');
Route::resource('/usuarios', App\Http\Controllers\UsuarioController::class)->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');