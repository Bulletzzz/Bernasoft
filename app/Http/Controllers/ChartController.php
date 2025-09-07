<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventario;
use App\Models\Maquina;
use App\Models\Modelo;

class ChartController extends Controller
{
    public function index() {
        $inventarios = Inventario::with('modelo')->get();
        $maquinas = Maquina::with('modelo')->get();
        $modelos = Modelo::all();

        return response()->json([
            'inventarios' => $inventarios,
            'maquinas' => $maquinas,
            'modelos' => $modelos,
        ]);
    }

}
