<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return view('conv'); 
})->name('inicio');

Route::get('/cadastro', function () {
    return view('cadastro');
})->name('cadastro');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/charts', function () {
    return view('charts');
})->name('charts');

Route::get('/maquinas', function () {
    return view('maquinas.index');
})->name('maquinas.index');

Route::get('/maquinas/create', function () {
    return view('maquinas.create');
})->name('maquinas.create');

Route::get('/modelos', function () {
    return view('modelos.index');
})->name('modelos.index');

Route::get('/modelos/create', function () {
    return view('modelos.create');
})->name('modelos.create');

Route::get('/inventarios', function () {
    return view('inventarios.index');
})->name('inventarios.index');

Route::get('/inventarios/create', function () {
    return view('inventarios.create');
})->name('inventarios.create');

Route::get('/perfil', function () {
    return view('perfil.index');
})->name('perfil');

Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
Route::post('/login', [UsuarioController::class, 'authenticate'])->name('login.submit');
Route::post('/logout', [UsuarioController::class, 'logout'])->name('logout');
