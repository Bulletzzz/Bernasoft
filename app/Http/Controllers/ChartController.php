<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventario;
use App\Models\Maquina;
use App\Models\Modelo;

class ChartController extends Controller
{
    public function index() {
        $modelos = Modelo::withCount('inventarios')->get();
        $modelosNomes = $modelos->pluck('nome');
        $modelosQuantidades = $modelos->pluck('inventarios_count'); 

        $maquinas = Inventario::with('modelo')->orderBy('data_inv')->get();
        $maquinasDatas = $maquinas->pluck('data_inv'); 
        $maquinasQuantidades = $maquinas->pluck('quantidade'); 
    
        return view('charts', compact(
            'modelosNomes', 
            'modelosQuantidades', 
            'maquinasDatas', 
            'maquinasQuantidades'
        ));
    }
    

}
