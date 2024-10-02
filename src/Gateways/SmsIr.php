<?php

namespace SajjadRakhshani\IrSmsGates\Gateways;

use SajjadRakhshani\IrSmsGates\Classes\GateWayInterface;
use SajjadRakhshani\IrSmsGates\Sms;

class SmsIr extends Sms
{
    public function __construct(protected string $api_key)
    {
    }

    public function GateWayClass() : GateWayInterface
    {
        return new \SajjadRakhshani\IrSmsGates\Classes\SmsIr($this->api_key);
    }
}
