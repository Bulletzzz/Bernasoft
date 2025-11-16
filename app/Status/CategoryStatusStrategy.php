<?php

namespace App\Status;

interface CategoryStatusStrategy
{
    /**
     * @param bool $isActive
     * @return string
     */
    public function getStatusMessage(bool $isActive): string;
}