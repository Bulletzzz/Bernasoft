<?php

namespace App\Status\Strategies;

use App\Status\MachineStatusStrategy;

class MaintenanceStatus implements MachineStatusStrategy
{
    public function getStatusMessage(bool $isActive): string
    {
        if ($isActive) {
            return "ALERTA: Ativa durante manutenção agendada!";
        }
        return "Em Manutenção Agendada. Não está operacional.";
    }
}