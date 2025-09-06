<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PontoController;
use App\Http\Controllers\PremioController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\MaquinaController;
use App\Http\Controllers\UsuarioController;

Route::apiResource('pontos', PontoController::class);
Route::apiResource('premios', PremioController::class);
Route::apiResource('categorias', CategoriaController::class);
Route::apiResource('modelos', ModeloController::class);
Route::apiResource('inventarios', InventarioController::class);
Route::apiResource('maquinas', MaquinaController::class);
Route::apiResource('usuarios', UsuarioController::class);
