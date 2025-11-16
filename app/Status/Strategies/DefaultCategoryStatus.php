<?php
namespace App\Status\Strategies;
use App\Status\CategoryStatusStrategy;

class DefaultCategoryStatus implements CategoryStatusStrategy
{
    public function getStatusMessage(bool $isActive): string
    {
        return $isActive ? 'Ativa' : 'Inativa';
    }
}