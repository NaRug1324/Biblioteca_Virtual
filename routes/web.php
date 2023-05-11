<?php
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\LibroController;

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

Route::get('/', function () {
    return view('welcome');
});

//Rutas Usuarios//
Route::resource('/usuarios', UsuarioController::class);
//Rutas Prestamos//

Route::resource('/prestamos', PrestamoController::class);

Route::get('/prestamos/search', [PrestamoController::class, 'search'])->name('prestamos.search');
//Rutas Libros//
Route::resource('/libros', LibroController::class);
Route::get('/libros/search', [LibroController::class, 'search'])->name('libros.search');
