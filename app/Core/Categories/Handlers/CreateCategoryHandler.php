<?php

namespace App\Core\Categories\Handlers;

use App\Core\Categories\Commands\CreateCategoryCommand;
use App\Models\Categoria;
use Illuminate\Support\Facades\Log;

class CreateCategoryHandler
{
    /**
     * * @param CreateCategoryCommand
     * @return Categoria
     */
    public function __invoke(CreateCategoryCommand $command): Categoria
    {
        return Categoria::create([
            'title' => $command->title,
        ]);
    }
}