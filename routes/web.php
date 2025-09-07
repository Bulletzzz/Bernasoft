<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\MaquinaController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ChartController;

// Página inicial (dashboard ou lista de modelos)
Route::get('/', [ModeloController::class, 'index'])->name('inicio');

// ---------------------- USUÁRIOS ----------------------
// Formulário de cadastro
Route::get('/cadastro', [UsuarioController::class, 'create'])->name('usuarios.create');
// Salvar usuário
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');

// Formulário de login
Route::get('/login', [UsuarioController::class, 'login'])->name('login');
// Autenticação
Route::post('/login', [UsuarioController::class, 'authenticate'])->name('usuarios.login');
// Logout
Route::post('/logout', [UsuarioController::class, 'logout'])->name('logout');

// ---------------------- PERFIL ----------------------
Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil');
// Atualizar perfil
Route::put('/perfil', [PerfilController::class, 'update'])->name('perfil.update');

// ---------------------- MODELOS ----------------------
Route::resource('modelos', ModeloController::class);

// ---------------------- MÁQUINAS ----------------------
Route::resource('maquinas', MaquinaController::class);

// ---------------------- INVENTÁRIO ----------------------
Route::resource('inventario', InventarioController::class);

// ---------------------- GRÁFICOS ----------------------
Route::get('/charts', [ChartController::class, 'index'])->name('charts');

