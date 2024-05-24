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

// Inversores
Route::get('/registrar-inversor', [InversorController::class, 'showInversorForm'])->name('registrar.inversor.vista');
Route::post('/registrar-inversor', [InversorController::class, 'registrarInversor'])->name('registrar.inversor');
Route::get('/menu-inversor', [InversorController::class, 'showInversorMenu'])->name('menu.inversor');

// Inversiones
Route::get('/crear-inversion', [InversorController::class, 'showCrearInversion'])->name('crear.inversion.vista');
Route::post('/crear-inversion', [InversorController::class, 'crearInversion'])->name('crear.inversion');
Route::get('/ver-inversion', [InversorController::class, 'showCrearInversion'])->name('ver.inversion');
Route::post('/eliminar-inversion', [InversionController::class, 'eliminarInversion'])->name('eliminar.inversion');

// Empresas
Route::get('/registrar-empresa', [EmpresaController::class, 'showEmpresaForm'])->name('registrar.empresa.vista');
Route::post('/registrar-empresa', [EmpresaController::class, 'registrarEmpresa'])->name('registrar.empresa');
Route::get('/menu-empresa', [EmpresaController::class, 'showEmpresaMenu'])->name('menu.empresa');

// Proyectos
Route::get('/crear-proyecto', [ProyectoController::class, 'showProyectoForm'])->name('crear.proyecto.vista');
Route::post('/crear-proyecto', [ProyectoController::class, 'proyectoForm'])->name('crear.proyecto');
Route::get('/ver-proyecto', [ProyectoController::class, 'proyectoForm'])->name('ver.proyecto');



