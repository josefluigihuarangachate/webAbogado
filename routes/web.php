<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController; // LOGIN (CLIENTE,ABOGADO)
use App\Http\Controllers\AdminController; // LOGIN, ADMINISTRADOR (ADMINISTRADOR)
use App\Http\Controllers\DashboardController; // DASHBOARD (ADMINISTRADOR)
use App\Http\Controllers\PlanController; // PLAN (ADMINISTRADOR)
use App\Http\Controllers\AbogadoController; // ABOGADO (ADMINISTRADOR)
use App\Http\Controllers\ClienteController; // CLIENTE (ADMINISTRADOR)
use App\Http\Controllers\OtroUsuarioController; // OTRO USUARIO (ADMINISTRADOR)
use App\Http\Controllers\ServicioController; // SERVICIOS (ADMINISTRADOR)
use App\Http\Controllers\TipoUsuarioController; // TIPO USUARIO (ADMINISTRADOR)
use App\Http\Controllers\CategoriaController; // CATEGORIA (ADMINISTRADOR)
use App\Http\Controllers\NotificacionController; // NOTIFICACION (ADMINISTRADOR)
use App\Http\Controllers\SubCategoriaController; // SUBCATEGORIA (ADMINISTRADOR)
use App\Http\Controllers\CategoriaUserController; // CATEGORIA (USER,LAWYER)
use App\Http\Controllers\ProfileController; // PERFIL (USER,LAWYER)

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

// ------------------------------- PARA LA WEB --------------------------------------------
// PAGINA PRINCIPAL
Route::get('/', function () {
    return view('admin/login');
});
// END PAGINA PRINCIPAL
//
//
// ADMINISTRADOR
Route::get('/dashboardAdmin', function () {
    return view('admin/dashboard');
});
Route::get('/listaAdministrador', function () {
    return view('admin/administrador');
});
Route::get('/nuevoAdministrador', function () {
    return view('admin/nuevoadministrador');
});
Route::post('/login_admin', [AdminController::class, 'login']);
Route::get('/cerrarSesion', [AdminController::class, 'logout']);
Route::post('/listadoAdministrador', [AdminController::class, 'index']);
Route::post('/obtenerAdministrador', [AdminController::class, 'show']); // Obtener datos para editar
Route::post('/editarAdministrador', [AdminController::class, 'update']); // Enviar datos para editarlos
Route::post('/eliminarAdministrador', [AdminController::class, 'destroy']);
Route::post('/registrarAdministrador', [AdminController::class, 'create']);
Route::post('/uploadImgAdministrador', [AdminController::class, 'cargarImgUser']);
// END ADMINISTRADOR
//
//
// ABOGADO
Route::get('/listaAbogado', function () {
    return view('admin/abogado');
});
Route::get('/nuevoAbogado', function () {
    return view('admin/nuevoabogado');
});
Route::post('/listadoAbogado', [AbogadoController::class, 'index']);
Route::post('/obtenerAbogado', [AbogadoController::class, 'show']); // Obtener datos para editar
Route::post('/editarAbogado', [AbogadoController::class, 'update']); // Enviar datos para editarlos
Route::post('/eliminarAbogado', [AbogadoController::class, 'destroy']);
Route::post('/registrarAbogado', [AbogadoController::class, 'create']);
Route::post('/uploadImgAbogado', [AbogadoController::class, 'cargarImgUser']);
// END ABOGADO
//
//
// NOTIFICACION
Route::get('/listaNotificacion', function () {
    return view('admin/notificacion');
});
Route::get('/verNotify', function () {
    return view('admin/vernotificacion');
});

Route::get('/verNotificacion/{id}', [NotificacionController::class, 'verNotifyAdmin']);
Route::post('/notifyAll', [NotificacionController::class, 'verNotifyAdminAll']);

Route::get('/leerNotificacion/{id}', [NotificacionController::class, 'verNotifyUser']);
Route::post('/listadoNotificacion', [NotificacionController::class, 'index']);
Route::post('/listadoUserNotificacion', [NotificacionController::class, 'listNotify']);
Route::post('/registrarNotificacion', [NotificacionController::class, 'registerNotify']);
Route::post('/eliminarNotificacion', [NotificacionController::class, 'eliminarNotify']);
// END NOTIFICACION
//
//
// PERFIL
Route::get('/editarProfile', function () {
    return view('admin/profile');
});
Route::post('/editarProfile', [ProfileController::class, 'editProfile']); // Enviar datos para editarlos
Route::post('/fotoProfile', [ProfileController::class, 'fotoProfile']); // Enviar datos para editarlos
// END PERFIL
//
//
// CLIENTE
Route::get('/listaCliente', function () {
    return view('admin/cliente');
});
Route::get('/nuevoCliente', function () {
    return view('admin/nuevocliente');
});
Route::post('/listadoCliente', [ClienteController::class, 'index']);
Route::post('/obtenerCliente', [ClienteController::class, 'show']); // Obtener datos para editar
Route::post('/editarCliente', [ClienteController::class, 'update']); // Enviar datos para editarlos
Route::post('/eliminarCliente', [ClienteController::class, 'destroy']);
Route::post('/registrarCliente', [ClienteController::class, 'create']);
Route::post('/uploadImgCliente', [ClienteController::class, 'cargarImgUser']);
// END CLIENTE
//
//
// OTRO USUARIO
Route::get('/listaOtroUsuario', function () {
    return view('admin/otrousuario');
});
Route::get('/nuevoOtroUsuario', function () {
    return view('admin/nuevootrousuario');
});
Route::post('/listadoOtroUsuario', [OtroUsuarioController::class, 'index']);
Route::post('/obtenerOtroUsuario', [OtroUsuarioController::class, 'show']); // Obtener datos para editar
Route::post('/editarOtroUsuario', [OtroUsuarioController::class, 'update']); // Enviar datos para editarlos
Route::post('/eliminarOtroUsuario', [OtroUsuarioController::class, 'destroy']);
Route::post('/registrarOtroUsuario', [OtroUsuarioController::class, 'create']);
Route::post('/uploadImgOtroUsuario', [OtroUsuarioController::class, 'cargarImgUser']);
Route::post('/tipousuarioOtroUsuario', [OtroUsuarioController::class, 'loadTypeUser']);
// END OTRO USUARIO
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
// SUB CATEGORIA
Route::get('/listaSubCategory', function () {
    return view('admin/subcategoria');
});
Route::get('/nuevoSubCategory', function () {
    return view('admin/nuevasubcategoria');
});
Route::post('/listadoSubCategory', [SubCategoriaController::class, 'index']);
Route::post('/categoriaSubCategory', [SubCategoriaController::class, 'loadCategory']);
Route::post('/registrarSubCategory', [SubCategoriaController::class, 'create']);
Route::post('/obtenerSubCategory', [SubCategoriaController::class, 'show']); // Obtener datos para editar
Route::post('/editarSubCategory', [SubCategoriaController::class, 'update']); // Enviar datos para editarlos
Route::post('/eliminarSubCategory', [SubCategoriaController::class, 'destroy']);
// END SUB CATEGORIA
//
//
//// DASHBOARD
Route::post('/listadoDashboard', [DashboardController::class, 'listadoDashboard']);
// END DASHBOARD
// 
// 
// PLAN
Route::get('/listaPlan', function () {
    return view('admin/plan');
});
Route::post('/listadoPlan', [PlanController::class, 'index']);
Route::post('/registrarPlan', [PlanController::class, 'create']);
Route::post('/obtenerPlan', [PlanController::class, 'show']);
Route::post('/editarPlan', [PlanController::class, 'update']);
Route::post('/eliminarPlan', [PlanController::class, 'destroy']);
// END PLAN
// 
// 
// SERVICIO
Route::get('/listaService', function () {
    return view('admin/servicio');
});
Route::get('/nuevoService', function () {
    return view('admin/nuevoservicio');
});
Route::post('/uploadIconoService', [ServicioController::class, 'cargarIconoService']);
Route::post('/listadoService', [ServicioController::class, 'index']);
Route::post('/abogadoService', [ServicioController::class, 'loadLaywer']);
Route::post('/categoriaService', [ServicioController::class, 'loadCategory']);
Route::post('/uploadImgService', [ServicioController::class, 'cargarDiagrama']);
Route::post('/registrarService', [ServicioController::class, 'create']);
Route::post('/obtenerService', [ServicioController::class, 'show']); // Obtener datos para editar
Route::post('/editarService', [ServicioController::class, 'update']); // Enviar datos para editarlos
Route::post('/eliminarService', [ServicioController::class, 'destroy']);
// END SERVICIO
//
//
//
//
//
//
//
//
//
// ------------------------------- PARA LA APP --------------------------------------------
// USUARIO
Route::get('/app', function () {
    return view('user/login');
});
Route::post('/login_user', [LoginController::class, 'index']);
Route::post('/register_user', [LoginController::class, 'create']);
Route::get('/appcerrarSesion', [LoginController::class, 'logout']);
Route::get('/dashboardUser', function () {
    return view('user/dashboard');
});
// END USUARIO
//
//
// GENERAL
Route::post('/appcategoriaGeneral', [CategoriaUserController::class, 'loadCategoryGeneral']);

Route::get('/applistaGeneral', function () {
    return view('user/servicio');
});
Route::get('/applistaservicoxabogadoGeneral', function () {
    return view('user/servicioabogado');
});
Route::get('/appchatabogadoGeneral', function () {
    return view('user/chat');
});

Route::post('/appidservicioGeneral', [CategoriaUserController::class, 'sessionServiceGeneral']); // SIRVE PARA GUARDAR TEMPORALMENTE EN SESSION EL ID DE LA CATEGORIA
Route::post('/appnameservicioGeneral', [CategoriaUserController::class, 'sessionNameServiceGeneral']); // SIRVE PARA GUARDAR TEMPORALMENTE EN SESSION EL NOMBRE DEL SERVICIO
Route::post('/appnombreabogadoGeneral', [CategoriaUserController::class, 'loadServiceAbogadosGeneral']);
Route::post('/appchatinfoabogadoGeneral', [CategoriaUserController::class, 'loadCatInfoAbogadoGeneral']); // CARGA INFORMACION DEL CHAT DEL ABOGADO
Route::post('/appidabogadoGeneral', [CategoriaUserController::class, 'sessionIdLawyerChatGeneral']);

Route::post('/appservicioGeneral', [CategoriaUserController::class, 'loadServiceGeneral']);
Route::get('/appprofileGeneral', function () {
    return view('user/profile');
});
Route::post('/appprofileactualizarGeneral', [ProfileController::class, 'update']);
// END GENERAL
//
//