<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TurnosController;
use App\Http\Controllers\UsuariosController;

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
    return view('turnos.index');
});
Route::resource('/turnos',TurnosController::class);
Route::get('/validacion', [TurnosController::class, 'validacion']);
Route::resource('/usuarios',UsuariosController::class);

