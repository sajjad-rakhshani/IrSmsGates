<?php
namespace IrSmsGates;
use IrSmsGates\Classes\GateWayInterface;

abstract class Sms
{
    abstract public function GateWayClass() : GateWayInterface;

    public function send(string $to, string $text) : bool
    {
        return $this->GateWayClass()->send($to, $text);
    }

    public function sendPattern(string $to, string $text, array $vars) : bool
    {
        return $this->GateWayClass()->sendPattern($to, $text, $vars);
    }
}
