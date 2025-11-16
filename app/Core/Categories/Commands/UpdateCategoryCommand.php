<?php

namespace App\Core\Categories\Commands;

class UpdateCategoryCommand
{
    public function __construct(
        public readonly int $id,
        public readonly string $title,
        public readonly bool $status,
        public readonly bool $visivel,
        public readonly string $viewMode 
    ) {}
}