<?php

namespace SajjadRakhshani\IrSmsGates\Gateways;

use SajjadRakhshani\IrSmsGates\Sms;
use SajjadRakhshani\IrSmsGates\Classes\GateWayInterface;

class Log extends Sms
{
    public function __construct(protected string|null $log_to = null)
    {
    }

    public function GateWayClass() : GateWayInterface
    {
        return new \SajjadRakhshani\IrSmsGates\Classes\Log($this->log_to);
    }
}
