<?php

namespace App\Services;

use App\Status\CategoryStatusContext;
use App\Status\Strategies\DefaultCategoryStatus;
use App\Status\Strategies\AdminCategoryStatus;
use App\Models\Categoria;
use InvalidArgumentException;

class CategoryService
{
    protected CategoryStatusContext $statusContext;

    public function __construct(CategoryStatusContext $statusContext)
    {
        $this->statusContext = $statusContext;
    }

    /**
     * @param Categoria $categoria
     * @param string $viewType
     * @return string
     */
    public function getDynamicCategoryStatus(Categoria $categoria, string $viewType = 'default'): string
    {
        $strategy = match (strtolower($viewType)) {
            'default' => new DefaultCategoryStatus(),
            'admin'   => new AdminCategoryStatus(),
            default   => throw new InvalidArgumentException("Tipo de visualização '{$viewType}' inválido."),
        };

        $this->statusContext->setStrategy($strategy);

        return $this->statusContext->executeGetStatusMessage($categoria->status);
    }
}