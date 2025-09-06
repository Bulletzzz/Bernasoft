<?php

namespace App\Http\Controllers;

use App\Models\Ponto;
use Illuminate\Http\Request;

class PontoController extends Controller
{
    public function index() {
        return Ponto::with('maquinas')->get();
    }

    public function store(Request $request) {
        $request->validate([
            'nome' => 'required|string|max:50',
            'endereco' => 'nullable|string|max:100',
            'contato' => 'nullable|string|max:50',
        ]);
        return Ponto::create($request->all());
    }

    public function show($id) {
        return Ponto::with('maquinas')->findOrFail($id);
    }

    public function update(Request $request, $id) {
        $ponto = Ponto::findOrFail($id);
        $ponto->update($request->all());
        return $ponto;
    }

    public function destroy($id) {
        Ponto::destroy($id);
        return response()->noContent();
    }
}
