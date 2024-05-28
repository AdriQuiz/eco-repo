<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\InversionController;
use App\Http\Controllers\InversorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProyectoController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [LoginController::class, 'login'])->name('login.submit');
Route::post('/cerrar-sesion', [LoginController::class, 'logout'])->name('logout');

// Inversores
Route::get('/inversor/registrar', [InversorController::class, 'showInversorForm'])->name('registrar.inversor.vista');
Route::post('/inversor/registrar', [InversorController::class, 'registrarInversor'])->name('registrar.inversor');
Route::get('/inversor/inversiones', [InversorController::class, 'showInversorMain'])->name('inversiones.inversor');

// Inversiones
Route::get('/inversion/crear', [InversionController::class, 'showInversionForm'])->name('crear.inversion.vista');
Route::post('/inversion/crear', [InversionController::class, 'crearInversion'])->name('crear.inversion');
Route::get('/inversion/{id}', [InversionController::class, 'showDetalleInversion'])->name('inversion.detalle'); // admin
Route::post('/inversion/eliminar', [InversionController::class, 'eliminarInversion'])->name('eliminar.inversion');

// Empresas
Route::get('/empresa/registrar', [EmpresaController::class, 'showEmpresaForm'])->name('registrar.empresa.vista');
Route::post('/empresa/registrar', [EmpresaController::class, 'registrarEmpresa'])->name('registrar.empresa');
Route::get('/empresa/proyectos', [EmpresaController::class, 'showEmpresaMain'])->name('proyectos.empresa');

// Proyectos
Route::get('/proyectos/crear', [ProyectoController::class, 'showProyectoForm'])->name('crear.proyecto.vista');
Route::post('/proyectos/crear', [ProyectoController::class, 'registrarProyectos'])->name('crear.proyecto');
Route::get('/proyectos/dashboard', [ProyectoController::class, 'dashboardProyectos'])->name('dashboard.proyectos');
Route::get('/proyectos/dashboard/{id}', [ProyectoController::class, 'showInfoProyecto'])->name('proyecto.info'); // admin
Route::get('/proyectos/inversiones', [ProyectoController::class, 'inversionesProyecto'])->name('inversiones.proyecto');
Route::get('/empresa/proyectos/{id}', [ProyectoController::class, 'showMetricasProyecto'])->name('proyecto.metricas');

// Chat IA
Route::get('/chat', [ChatController::class, 'showChat'])->name('chat.vista');
Route::post('/chat', 'App\Http\Controllers\ChatController');



