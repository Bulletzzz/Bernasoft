<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MaquinaController;

Route::get('/cadastro', [UsuarioController::class, 'showCadastroForm'])->name('cadastro.index');
Route::post('/cadastro', [UsuarioController::class, 'store'])->name('cadastro.store');
Route::get('/login', [UsuarioController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [UsuarioController::class, 'authenticate'])->name('login.submit');
Route::post('/logout', [UsuarioController::class, 'logout'])->name('logout');  // Assumindo que tem o método logout no controller

Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');  // Se ainda usar
Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');  // Ajuste se precisar
Route::post('/maquinas', [MaquinaController::class, 'store']);
Route::get('/maquinas/gerenciar', [MaquinaController::class, 'index']);
Route::delete('/maquinas/{id}', [MaquinaController::class, 'destroy']);
Route::get('/maquinas/edit/{id}', [MaquinaController::class, 'edit']);
Route::put('maquinas/update/{id}', [MaquinaController::class, 'update']);

Route::get('/', function () { return view('conv'); });
Route::get('/charts', function () { return view('charts'); });
Route::get('/index', function () { return view('index'); });
Route::get('/inventario', function () { return view('inventario'); });
Route::get('/inventarios/create', function () { return view('inventarios.create'); })->name('inventarios.create');
Route::get('/inicio', function () { return view('inicio'); })->name('inicio');
Route::get('/perfil', function () { return view('perfil'); });