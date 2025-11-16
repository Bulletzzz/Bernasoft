<?php

namespace App\Status;

interface MachineStatusStrategy
{
    /**
     * @param bool $isActive
     * @return string
     */
    public function getStatusMessage(bool $isActive): string;
}