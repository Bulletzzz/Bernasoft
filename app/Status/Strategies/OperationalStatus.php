<?php

namespace App\Status\Strategies;

use App\Status\MachineStatusStrategy;

class OperationalStatus implements MachineStatusStrategy
{
    public function getStatusMessage(bool $isActive): string
    {
        if ($isActive) {
            return "Em Operação. Gerando lucros.";
        }
        return "Inativa. Pronto para reativação.";
    }
}