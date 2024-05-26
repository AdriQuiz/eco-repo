<?php

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
Route::get('/inversor/inversiones/{id}', [InversorController::class, 'showDetalleInversion'])->name('inversion.detalle');

// Inversiones
Route::get('/inversion/crear', [InversionController::class, 'showInversionForm'])->name('crear.inversion.vista');
Route::post('/inversion/crear', [InversionController::class, 'crearInversion'])->name('crear.inversion');
Route::get('/inversion/{id}', [InversionController::class, 'showInversion'])->name('ver.inversiones');
Route::post('/inversion/eliminar', [InversionController::class, 'eliminarInversion'])->name('eliminar.inversion');

// Empresas
Route::get('/empresa/registrar', [EmpresaController::class, 'showEmpresaForm'])->name('registrar.empresa.vista');
Route::post('/empresa/registrar', [EmpresaController::class, 'registrarEmpresa'])->name('registrar.empresa');
Route::get('/empresa/proyectos', [EmpresaController::class, 'showEmpresaMain'])->name('proyectos.empresa');
Route::get('/empresa/proyectos/{id}', [EmpresaController::class, 'showDetalleProyecto'])->name('proyecto.detalle');

// Proyectos
Route::get('/proyectos/crear', [ProyectoController::class, 'showProyectoForm'])->name('crear.proyecto.vista');
Route::post('/proyectos/crear', [ProyectoController::class, 'registrarProyectos'])->name('crear.proyecto');
Route::get('/proyectos/dashboard', [ProyectoController::class, 'dashboardProyectos'])->name('dashboard.proyecto');
Route::get('/proyectos/dashboard/{id}', [ProyectoController::class, 'showInfoProyecto'])->name('proyecto.info');
Route::get('/proyectos/inversiones', [ProyectoController::class, 'inversionesProyecto'])->name('inversiones.proyecto');



