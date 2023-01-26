<?php

use Illuminate\Support\Facades\Route;

/*Importamos los controladores obligatorios para trabajar*/
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DiagnosticoController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\TratamientoController;

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
    return view('welcome');
});


/**
 * Login.
 * ------------------------------------------------------------------------
 * Rutas para acceder a la clase 'LoginController'
 * cada ruta tiene su correspondiente método HTTP.
 * Al final se le asigna un nombre único para poder
 * accerder a la ruta mucho más fácil.
 */
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login.index');
    Route::post('/login', 'auth')->name('login.auth');
    Route::get('/logout', 'logout')->name('logout');
});



/**
 * Home.
 * ------------------------------------------------------------------------
 * Rutas para acceder a la clase 'HomeController'
 * cada ruta tiene su correspondiente método HTTP.
 * Al final se le asigna un nombre único para poder
 * accerder a la ruta mucho más fácil.
 */
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home')->middleware('auth.admin');
});



/**
 * Medico.
 * ------------------------------------------------------------------------
 * Rutas para acceder a la clase 'MedicoController'
 * cada ruta tiene su correspondiente método HTTP.
 * Al final se le asigna un nombre único para poder
 * accerder a la ruta mucho más fácil.
 */
Route::controller(MedicoController::class)->group(function () {
    Route::get('/medico', 'index')->name('medico.index')->middleware('auth.admin');
    Route::get('/medico/create', 'create')->name('medico.create')->middleware('auth.admin');
    Route::post('/medico', 'store')->name('medico.store')->middleware('auth.admin');
    Route::get('/medico/{item}', 'show')->name('medico.show')->middleware('auth.admin');
    Route::get('/medico/{item}/edit', 'edit')->name('medico.edit')->middleware('auth.admin');
    Route::put('/medico/{item}', 'update')->name('medico.update')->middleware('auth.admin');
    Route::delete('/medico/{item}', 'destroy')->name('medico.destroy')->middleware('auth.admin');
});



/**
 * Especialidad.
 * ------------------------------------------------------------------------
 * Rutas para acceder a la clase 'EspecialidadController'
 * cada ruta tiene su correspondiente método HTTP.
 * Al final se le asigna un nombre único para poder
 * accerder a la ruta mucho más fácil.
 */
Route::controller(EspecialidadController::class)->group(function () {
    Route::get('/especialidad', 'index')->name('especialidad.index')->middleware('auth.admin');
    Route::get('/especialidad/create', 'create')->name('especialidad.create')->middleware('auth.admin');
    Route::post('/especialidad', 'store')->name('especialidad.store')->middleware('auth.admin');
    Route::get('/especialidad/{item}', 'show')->name('especialidad.show')->middleware('auth.admin');
    Route::get('/especialidad/{item}/edit', 'edit')->name('especialidad.edit')->middleware('auth.admin');
    Route::put('/especialidad/{item}', 'update')->name('especialidad.update')->middleware('auth.admin');
    Route::delete('/especialidad/{item}', 'destroy')->name('especialidad.destroy')->middleware('auth.admin');
});



/**
 * Paciente.
 * ------------------------------------------------------------------------
 * Rutas para acceder a la clase 'PacienteController'
 * cada ruta tiene su correspondiente método HTTP.
 * Al final se le asigna un nombre único para poder
 * accerder a la ruta mucho más fácil.
 */
Route::controller(PacienteController::class)->group(function () {
    Route::get('/paciente', 'index')->name('paciente.index')->middleware('auth.admin');
    Route::get('/paciente/create', 'create')->name('paciente.create')->middleware('auth.admin');
    Route::post('/paciente', 'store')->name('paciente.store')->middleware('auth.admin');
    Route::get('/paciente/{item}', 'show')->name('paciente.show')->middleware('auth.admin');
    Route::get('/paciente/{item}/edit', 'edit')->name('paciente.edit')->middleware('auth.admin');
    Route::put('/paciente/{item}', 'update')->name('paciente.update')->middleware('auth.admin');
    Route::delete('/paciente/{item}', 'destroy')->name('paciente.destroy')->middleware('auth.admin');
});



/**
 * Diagnostico.
 * ------------------------------------------------------------------------
 * Rutas para acceder a la clase 'DiagnosticoController'
 * cada ruta tiene su correspondiente método HTTP.
 * Al final se le asigna un nombre único para poder
 * accerder a la ruta mucho más fácil.
 */
Route::controller(DiagnosticoController::class)->group(function () {
    Route::get('/diagnostico', 'index')->name('diagnostico.index')->middleware('auth.admin');
    Route::get('/diagnostico/create', 'create')->name('diagnostico.create')->middleware('auth.admin');
    Route::post('/diagnostico', 'store')->name('diagnostico.store')->middleware('auth.admin');
    Route::get('/diagnostico/{item}', 'show')->name('diagnostico.show')->middleware('auth.admin');
    Route::get('/diagnostico/{item}/edit', 'edit')->name('diagnostico.edit')->middleware('auth.admin');
    Route::put('/diagnostico/{item}', 'update')->name('diagnostico.update')->middleware('auth.admin');
    Route::delete('/diagnostico/{item}', 'destroy')->name('diagnostico.destroy')->middleware('auth.admin');
});



/**
 * Tratamiento.
 * ------------------------------------------------------------------------
 * Rutas para acceder a la clase 'TratamientoController'
 * cada ruta tiene su correspondiente método HTTP.
 * Al final se le asigna un nombre único para poder
 * accerder a la ruta mucho más fácil.
 */
Route::controller(TratamientoController::class)->group(function () {
    Route::get('/tratamiento', 'index')->name('tratamiento.index')->middleware('auth.admin');
    Route::get('/tratamiento/create', 'create')->name('tratamiento.create')->middleware('auth.admin');
    Route::post('/tratamiento', 'store')->name('tratamiento.store')->middleware('auth.admin');
    Route::get('/tratamiento/{item}', 'show')->name('tratamiento.show')->middleware('auth.admin');
    Route::get('/tratamiento/{item}/edit', 'edit')->name('tratamiento.edit')->middleware('auth.admin');
    Route::put('/tratamiento/{item}', 'update')->name('tratamiento.update')->middleware('auth.admin');
    Route::delete('/tratamiento/{item}', 'destroy')->name('tratamiento.destroy')->middleware('auth.admin');
});