<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index() {
        return Categoria::with('modelos')->get();
    }

    public function store(Request $request) {
        $request->validate([
            'nome' => 'required|string|max:50',
        ]);
        return Categoria::create($request->all());
    }

    public function show($id) {
        return Categoria::with('modelos')->findOrFail($id);
    }

    public function update(Request $request, $id) {
        $categoria = Categoria::findOrFail($id);
        $categoria->update($request->all());
        return $categoria;
    }

    public function destroy($id) {
        Categoria::destroy($id);
        return response()->noContent();
    }
}
