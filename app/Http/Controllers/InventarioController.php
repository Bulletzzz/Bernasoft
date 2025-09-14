<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventario;
use App\Models\Maquina;

class InventarioController extends Controller
{
    public function index()
    {
        $itens = Inventario::with('modelo')->get();
        $maquinas = Maquina::all();
        return view('inventario', compact('itens', 'maquinas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'quantidade' => 'required|integer|min:1',
            'data_inv' => 'required|date',
            'id_modelo' => 'required|exists:modelos,id',
        ]);

        Inventario::create([
            'quantidade' => $request->quantidade,
            'data_inv' => $request->data_inv,
            'id_modelo' => $request->id_modelo,
        ]);

        return redirect()->route('inventario.index')->with('success', 'Inventário registrado com sucesso!');
    }
}
