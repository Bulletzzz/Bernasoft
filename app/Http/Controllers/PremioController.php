<?php

namespace App\Http\Controllers;

use App\Models\Premio;
use Illuminate\Http\Request;

class PremioController extends Controller
{
    public function index() {
        return Premio::with('maquinas')->get();
    }

    public function store(Request $request) {
        $request->validate([
            'nome' => 'required|string|max:50',
            'foto_url' => 'required|string|max:100',
            'custo_unitario' => 'required|numeric',
            'status_premio' => 'required|string|max:20',
        ]);
        return Premio::create($request->all());
    }

    public function show($id) {
        return Premio::with('maquinas')->findOrFail($id);
    }

    public function update(Request $request, $id) {
        $premio = Premio::findOrFail($id);
        $premio->update($request->all());
        return $premio;
    }

    public function destroy($id) {
        Premio::destroy($id);
        return response()->noContent();
    }
}
