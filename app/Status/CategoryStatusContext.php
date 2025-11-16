<?php

namespace App\Status;

class CategoryStatusContext
{
    private CategoryStatusStrategy $strategy;

    public function __construct(CategoryStatusStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function setStrategy(CategoryStatusStrategy $strategy): void
    {
        $this->strategy = $strategy;
    }

    public function executeGetStatusMessage(bool $isActive): string
    {
        return $this->strategy->getStatusMessage($isActive);
    }
}