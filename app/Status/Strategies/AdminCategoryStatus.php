<?php
namespace App\Status\Strategies;
use App\Status\CategoryStatusStrategy;

class AdminCategoryStatus implements CategoryStatusStrategy
{
    public function getStatusMessage(bool $isActive): string
    {
        if ($isActive) {
            return '[STATUS: ATIVA] - Categoria visível';
        }
        return '[STATUS: INATIVA] - Categoria oculta';
    }
}