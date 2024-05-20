<?php
namespace SajjadRakhshani\IrSmsGates\Gateways;
use SajjadRakhshani\IrSmsGates\Classes\GateWayInterface;
use SajjadRakhshani\IrSmsGates\Sms;

class MeliPayamak extends Sms
{
    public function __construct(protected string $username, protected string $password)
    {
    }

    public function GateWayClass() : GateWayInterface
    {
        return new \SajjadRakhshani\IrSmsGates\Classes\MeliPayamak($this->username, $this->password);
    }
}
