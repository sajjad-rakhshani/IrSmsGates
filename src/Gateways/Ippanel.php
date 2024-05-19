<?php

namespace IrSmsGates\Gateways;

use IrSmsGates\Classes\GateWayInterface;
use IrSmsGates\Sms;

class Ippanel extends Sms
{
    public function __construct(protected string $api_key)
    {
    }

    public function GateWayClass() : GateWayInterface
    {
        return new \IrSmsGates\Classes\IpPanel($this->api_key);
    }
}
