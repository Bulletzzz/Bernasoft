<?php

namespace App\Http\Controllers;

use App\Models\Maquina;
use Illuminate\Http\Request;

class MaquinaController extends Controller
{
    public function index() {
        return Maquina::with(['modelo','ponto','premio'])->get();
    }

    public function store(Request $request) {
        $request->validate([
            'nome_esp' => 'required|string|max:50',
            'data_instalacao' => 'required|date',
            'status_maquina' => 'required|string|max:30',
            'id_modelo' => 'required|integer|exists:modelo,id',
            'id_localizacao' => 'required|integer|exists:ponto,id',
            'id_premio' => 'required|integer|exists:premio,id',
        ]);
        return Maquina::create($request->all());
    }

    public function show($id) {
        return Maquina::with(['modelo','ponto','premio'])->findOrFail($id);
    }

    public function update(Request $request, $id) {
        $maquina = Maquina::findOrFail($id);
        $maquina->update($request->all());
        return $maquina;
    }

    public function destroy($id) {
        Maquina::destroy($id);
        return response()->noContent();
    }
}
