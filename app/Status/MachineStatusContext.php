<?php

namespace App\Status;

class MachineStatusContext
{
    private MachineStatusStrategy $strategy;

    public function __construct(MachineStatusStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    /**
     * @param MachineStatusStrategy $strategy
     */
    public function setStrategy(MachineStatusStrategy $strategy): void
    {
        $this->strategy = $strategy;
    }

    public function executeGetStatusMessage(bool $isActive): string
    {
        return $this->strategy->getStatusMessage($isActive);
    }
}