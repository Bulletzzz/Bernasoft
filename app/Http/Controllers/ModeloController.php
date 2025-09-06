<?php

namespace App\Http\Controllers;

use App\Models\Modelo;
use Illuminate\Http\Request;

class ModeloController extends Controller
{
    public function index() {
        return Modelo::with(['categoria','inventarios','maquinas'])->get();
    }

    public function store(Request $request) {
        $request->validate([
            'nome' => 'required|string|max:50',
            'fabricante' => 'required|string|max:50',
            'foto_url' => 'required|string|max:100',
            'descricao' => 'nullable|string|max:100',
            'status_modelo' => 'required|string|max:30',
            'id_categoria' => 'nullable|integer|exists:categoria,id',
        ]);
        return Modelo::create($request->all());
    }

    public function show($id) {
        return Modelo::with(['categoria','inventarios','maquinas'])->findOrFail($id);
    }

    public function update(Request $request, $id) {
        $modelo = Modelo::findOrFail($id);
        $modelo->update($request->all());
        return $modelo;
    }

    public function destroy($id) {
        Modelo::destroy($id);
        return response()->noContent();
    }
}
