<?php
namespace IrSmsGates\Gateways;
use IrSmsGates\Classes\GateWayInterface;
use IrSmsGates\Sms;

class MeliPayamak extends Sms
{
    public function __construct(protected string $username, protected string $password)
    {
    }

    public function GateWayClass() : GateWayInterface
    {
        return new \IrSmsGates\Classes\MeliPayamak($this->username, $this->password);
    }
}
