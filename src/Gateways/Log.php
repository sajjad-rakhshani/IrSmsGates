<?php

namespace IrSmsGates\Gateways;

use IrSmsGates\Sms;
use IrSmsGates\Classes\GateWayInterface;

class Log extends Sms
{
    public function __construct(protected string|null $log_to = null)
    {
    }

    public function GateWayClass() : GateWayInterface
    {
        return new \IrSmsGates\Classes\Log($this->log_to);
    }
}
