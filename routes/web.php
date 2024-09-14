<?php

use App\Mail\ContactanosMailable;

use App\Http\Controllers\ContactanosController;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\MercadoController;
use App\Http\Controllers\CultivoController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\PrecioController;
use App\Http\Controllers\PreferenciaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\AnuncianteController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ProfileController;



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

// Rutas públicas
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('register', [RegisterController::class, 'register'])->name('register');

// Página de bienvenida accesible solo si el usuario está autenticado
Route::middleware(['auth','checkbanned'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');


Route::middleware('auth')->group(function () {
    Route::resource('/cultivos', App\Http\Controllers\CultivoController::class);
    Route::resource('/departamentos', App\Http\Controllers\DepartamentoController::class);
    Route::resource('/consultas', App\Http\Controllers\ConsultaController::class);
    Route::resource('/precios', App\Http\Controllers\PrecioController::class);
    Route::resource('/preferencias', App\Http\Controllers\PreferenciaController::class);
    Route::resource('/usuarios', App\Http\Controllers\UsuarioController::class);
    Route::resource('/noticias', App\Http\Controllers\NoticiaController::class);
    Route::resource('/anunciantes', App\Http\Controllers\AnuncianteController::class);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::patch('/usuarios/{id}/ban', [UsuarioController::class, 'ban'])->name('users.ban');
});

/*Route::get('contactanos', function () {

    Mail::to('velasquez@cultivoApp.com')
        ->send(new contactanosMailable);

    return "Mensaje enviado";

})->name('contactanos'); */
Route::get('/files/{filename}', [FileController::class, 'show'])
    ->middleware('auth.file')
    ->name('files.show');


Route::view('/clima', 'clima.inicio')->name('clima.inicio');

Route::view('/acercaNosotros', 'about.inicio')->name('about.inicio');
    
Route::view('/reportes', 'reportes.inicio')->name('reportes.inicio');

Route::get('/notiapa', [NoticiaController::class, 'inicio'])->name('noticias.inicio');

Route::get('/inicio', [AnuncianteController::class, 'inicio'])->name('anunciantes.inicio');

Route::get('/user-data', [UsuarioController::class, 'getUserData'])->name('user.data');

// Ruta para editar el perfil
Route::get('/personalizar', [ProfileController::class, 'edit'])->name('profile.edit');

// Ruta para actualizar el perfil
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

Route::get('contactanos',[ContactanosController::class, 'index'])
     ->name('contactanos.index');

Route::post('contactanos', [ContactanosController::class, 'store'])
     ->name('contactanos.store');
});

Route::middleware(['checkbanned'])->group(function () {
    Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
    Route::resource('/cultivos', App\Http\Controllers\CultivoController::class);
    Route::resource('/departamentos', App\Http\Controllers\DepartamentoController::class);
    Route::resource('/consultas', App\Http\Controllers\ConsultaController::class);
    Route::resource('/precios', App\Http\Controllers\PrecioController::class);
    Route::resource('/preferencias', App\Http\Controllers\PreferenciaController::class);
    Route::resource('/usuarios', App\Http\Controllers\UsuarioController::class);
    Route::resource('/noticias', App\Http\Controllers\NoticiaController::class);
    Route::resource('/anunciantes', App\Http\Controllers\AnuncianteController::class);
});

Route::middleware(['auth', 'checkadminrole'])->group(function () {
    Route::resource('/cultivos', App\Http\Controllers\CultivoController::class);
    Route::resource('/departamentos', App\Http\Controllers\DepartamentoController::class);
    Route::resource('/consultas', App\Http\Controllers\ConsultaController::class);
    Route::resource('/precios', App\Http\Controllers\PrecioController::class);
    Route::resource('/preferencias', App\Http\Controllers\PreferenciaController::class);
    Route::resource('/usuarios', App\Http\Controllers\UsuarioController::class);
    Route::resource('/noticias', App\Http\Controllers\NoticiaController::class);
    Route::resource('/anunciantes', App\Http\Controllers\AnuncianteController::class);
    Route::patch('/usuarios/{id}/ban', [UsuarioController::class, 'ban'])->name('users.ban');
});


Auth::routes();