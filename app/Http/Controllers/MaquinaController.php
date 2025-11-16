<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maquina;
use App\Models\Categoria;
use Illuminate\Auth\Access\AuthorizationException;

use App\Core\Categories\Queries\GetAllCategoriesQuery;
use App\Core\Categories\Handlers\GetAllCategoriesHandler;

use App\Core\Categories\Commands\CreateCategoryCommand;
use App\Core\Categories\Handlers\CreateCategoryHandler;

use App\Core\Categories\Commands\UpdateCategoryCommand;
use App\Core\Categories\Handlers\UpdateCategoryHandler;

use App\Services\CategoryService;


class MaquinaController extends Controller
{
    protected CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(Request $request, GetAllCategoriesHandler $queryHandler)
    {
        $viewType = $request->query('view_mode', 'default');

        $query = new GetAllCategoriesQuery($viewType);
        $categorias = $queryHandler($query); 

        $categoriasProcessadas = $categorias->map(function ($categoria) use ($viewType) {
            $categoria->dynamic_status = $this->categoryService->getDynamicCategoryStatus($categoria, $viewType);
            $categoria->formatted_name = $categoria->title;
            return $categoria;
        });

        $maquinas = Maquina::all();
        
        return view('maquinas', [
            'maquinas' => $maquinas, 
            'categorias' => $categoriasProcessadas,
            'current_view' => $viewType
        ]);
    }

    public function store(Request $request, CreateCategoryHandler $commandHandler) 
    {
        $request->validate(['title' => 'required|string|max:255']);
        
        $command = new CreateCategoryCommand(title: $request->input('title'));
        $commandHandler($command);
        
        return redirect()->route('maquinas.index');
    }

    public function edit(Request $request, $id){
        $categoria = Categoria::findOrFail($id);
        $viewType = $request->query('view_mode', 'default');
        
        return view('edit' , [
            'categoria' => $categoria,
            'current_view' => $viewType
        ]); 
    }

    public function update(Request $request, UpdateCategoryHandler $commandHandler){
        
        $viewType = $request->input('view_mode', 'default');

        $visivel = $request->has('visivel');
        $status = $request->has('status');

        $command = new UpdateCategoryCommand(
            id: $request->id,
            title: $request->title,
            status: $status,
            visivel: $visivel,
            viewMode: $viewType
        );

        try {
            $commandHandler($command);
        } catch (AuthorizationException $e) {
            return redirect()->back()->withErrors(['visivel' => $e->getMessage()]);
        }

        return redirect()->route('maquinas.index', ['view_mode' => $viewType]);
    }

    public function destroy($id){
        Categoria::findOrFail($id)->delete();
        return redirect()->route('maquinas.index');
    }
}