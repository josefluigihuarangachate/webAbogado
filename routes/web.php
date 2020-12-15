<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController; // LOGIN (CLIENTE,ABOGADO)
use App\Http\Controllers\AdminController; // LOGIN (ADMINISTRADOR)
use App\Http\Controllers\TipoUsuarioController; // TIPO USUARIO (ADMINISTRADOR)
use App\Http\Controllers\CategoriaController; // Categoria (ADMINISTRADOR)

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

// PAGINA PRINCIPAL
Route::get('/', function () {
    return view('admin/login');
});
// END PAGINA PRINCIPAL
//
//
// USUARIO
Route::get('/app', function () {
    return view('user/login');
});
Route::post('/login_user', [LoginController::class, 'index']);
Route::post('/register_user', [LoginController::class, 'create']);
Route::get('/dashboardUser', function () {
    return view('user/dashboard');
});
// END USUARIO
//
//
// ADMINISTRADOR
Route::get('/dashboardAdmin', function () {
    return view('admin/dashboard');
});
Route::post('/login_admin', [AdminController::class, 'index']);
//
//
// TIPO USUARIO
Route::get('/listaTypeUser', function () {
    return view('admin/tipodeusuario');
});
Route::get('/nuevoTypeUser', function () {
    return view('admin/nuevotipousuario');
});
Route::post('/listadoTypeUser', [TipoUsuarioController::class, 'index']);
Route::post('/registrarTypeUser', [TipoUsuarioController::class, 'create']);
Route::post('/obtenerTypeUser', [TipoUsuarioController::class, 'show']); // Obtener datos para editar
Route::post('/editarTypeUser', [TipoUsuarioController::class, 'update']); // Enviar datos para editarlos
Route::post('/eliminarTypeUser', [TipoUsuarioController::class, 'destroy']);
// END TIPO USUARIO
//
//
// CATEGORIA
Route::get('/listaCategory', function () {
    return view('admin/categoria');
});
Route::get('/nuevoCategory', function () {
    return view('admin/nuevacategoria');
});
Route::post('/listadoCategory', [CategoriaController::class, 'index']);
Route::post('/registrarCategory', [CategoriaController::class, 'create']);
Route::post('/obtenerCategory', [CategoriaController::class, 'show']); // Obtener datos para editar
Route::post('/editarCategory', [CategoriaController::class, 'update']); // Enviar datos para editarlos
Route::post('/eliminarCategory', [CategoriaController::class, 'destroy']);
Route::post('/uploadImgCategory', [CategoriaController::class, 'cargarImgCategory']);
// END CATEGORIA
//
//