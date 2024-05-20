<?php

namespace SajjadRakhshani\IrSmsGates\Gateways;

use SajjadRakhshani\IrSmsGates\Classes\GateWayInterface;
use SajjadRakhshani\IrSmsGates\Sms;

class IpPanel extends Sms
{
    public function __construct(protected string $api_key)
    {
    }

    public function GateWayClass() : GateWayInterface
    {
        return new \SajjadRakhshani\IrSmsGates\Classes\IpPanel($this->api_key);
    }
}
