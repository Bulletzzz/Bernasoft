<?php

namespace App\Core\Categories\Handlers;

use App\Core\Categories\Queries\GetAllCategoriesQuery;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Categoria;

class GetAllCategoriesHandler
{
    /**
     * @param GetAllCategoriesQuery
     * @return Collection<Categoria>
     */
    public function __invoke(GetAllCategoriesQuery $query): Collection
    {
        if ($query->viewMode === 'admin') {
            return Categoria::all();
        }

        return Categoria::where('visivel', true)->get();
    }
}