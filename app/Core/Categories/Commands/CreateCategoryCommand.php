<?php

namespace App\Core\Categories\Commands;

class CreateCategoryCommand
{
    public function __construct(
        public readonly string $title,
    ) {}
}