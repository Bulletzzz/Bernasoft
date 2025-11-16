<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MaquinaController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ReportController;

// Cadastro e login
Route::get('/cadastro', [UsuarioController::class, 'showCadastroForm'])->name('cadastro.index');
Route::post('/cadastro', [UsuarioController::class, 'store'])->name('cadastro.store');
Route::get('/login', [UsuarioController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [UsuarioController::class, 'authenticate'])->name('login.submit');
Route::post('/logout', [UsuarioController::class, 'logout'])->name('logout');

// Usuários
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');

// Máquinas
Route::get('/maquinas/gerenciar', [MaquinaController::class, 'index'])->name('maquinas.index');
Route::post('/maquinas', [MaquinaController::class, 'store']);
Route::get('/maquinas/edit/{id}', [MaquinaController::class, 'edit']);
Route::put('/maquinas/update/{id}', [MaquinaController::class, 'update']);
Route::delete('/maquinas/{id}', [MaquinaController::class, 'destroy']);

// Inventário
Route::get('/inventario', [InventarioController::class, 'index'])->name('inventario.index');
Route::post('/inventario', [InventarioController::class, 'store'])->name('inventario.store');

// Modelos
Route::get('/modelos', [ModeloController::class, 'index'])->name('modelos.index');

// Charts / Relatórios
Route::get('/charts', [ChartController::class, 'index'])->name('charts');

// Perfil
Route::get('/perfil', [PerfilController::class, 'edit'])->name('perfil.edit');
Route::put('/perfil', [PerfilController::class, 'update'])->name('perfil.update');

// Páginas fixas
Route::get('/', function () { return view('conv'); });
Route::get('/index', function () { return view('index'); });
Route::get('/inicio', function () { return view('inicio'); })->name('inicio');

// Relatorios
Route::get('/charts', [ChartController::class, 'index'])->name('charts');
Route::get('/reports/categories/{type}', [ReportController::class, 'downloadCategoryReport'])->name('reports.categories.download');