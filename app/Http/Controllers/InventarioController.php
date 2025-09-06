<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function index() {
        return Inventario::with('modelo')->get();
    }

    public function store(Request $request) {
        $request->validate([
            'quantidade' => 'required|integer',
            'data_inv' => 'required|date',
            'id_modelo' => 'required|integer|exists:modelo,id',
        ]);
        return Inventario::create($request->all());
    }

    public function show($id) {
        return Inventario::with('modelo')->findOrFail($id);
    }

    public function update(Request $request, $id) {
        $inventario = Inventario::findOrFail($id);
        $inventario->update($request->all());
        return $inventario;
    }

    public function destroy($id) {
        Inventario::destroy($id);
        return response()->noContent();
    }
}
