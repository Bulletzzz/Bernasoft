<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Maquina;
use App\Models\Categoria;

class MaquinaController extends Controller
{
    public function index(){

        $maquinas = Maquina::all();
        $categorias = Categoria::all();

        return view('maquinas',['maquinas' => $maquinas, 'categorias' => $categorias]);
    }

    public function store(Request $request) {

        $categoria = new Categoria;

        $categoria->title = $request->title;

        $categoria->save();

        return redirect('/maquinas/gerenciar');

    }

    public function destroy($id){
        Categoria::findOrFail($id)->delete();

        return redirect('/maquinas/gerenciar');
    }

    public function edit($id){
        $categoria = Categoria::findOrFail($id);
        return view('edit' , ['categoria' => $categoria]); 
    }

    public function update(Request $request){
        Categoria::findOrFail($request->id)->update($request->all());
        return redirect('/maquinas/gerenciar');
    }
}