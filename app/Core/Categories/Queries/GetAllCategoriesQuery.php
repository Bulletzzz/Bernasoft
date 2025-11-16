<?php

namespace App\Core\Categories\Queries;

class GetAllCategoriesQuery
{
    public function __construct(
        public readonly string $viewMode
    ) {}
}