<?php

namespace App\Core\Categories\Handlers;

use App\Core\Categories\Commands\UpdateCategoryCommand;
use App\Models\Categoria;
use Illuminate\Auth\Access\AuthorizationException;

class UpdateCategoryHandler
{
    public function __invoke(UpdateCategoryCommand $command): Categoria
    {
        $categoria = Categoria::findOrFail($command->id);
        $categoria->title = $command->title;
        $categoria->status = $command->status;

        if ($categoria->visivel === true && $command->visivel === false) {
            if ($command->viewMode !== 'admin') {
                throw new AuthorizationException('Apenas administradores podem tornar uma categoria invisível.');
            }
        }

        $categoria->visivel = $command->visivel;
        $categoria->save();

        return $categoria;
    }
}