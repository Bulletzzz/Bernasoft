<?php

namespace App\Services;

use App\Status\MachineStatusContext;
use App\Status\Strategies\OperationalStatus;
use App\Status\Strategies\MaintenanceStatus;
use App\Models\Maquina;
use InvalidArgumentException;

class MachineService
{
    protected MachineStatusContext $context;

    public function __construct(MachineStatusContext $context)
    {
        $this->context = $context;
    }

    public function getDynamicStatus(Maquina $maquina, string $statusType): string
    {
        $strategy = $this->resolveStrategy($statusType);
        $this->context->setStrategy($strategy);
        return $this->context->executeGetStatusMessage($maquina->status);
    }

    private function resolveStrategy(string $type)
    {
        return match (strtolower($type)) {
            'operational' => new OperationalStatus(),
            'maintenance' => new MaintenanceStatus(),
            default => throw new InvalidArgumentException("Tipo de status '{$type}' não suportado."),
        };
    }
}