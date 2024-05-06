<?php
namespace IrSmsGates\Classes;
interface GateWayInterface
{
    public function send(string $to, string $text) : bool;
    public function sendPattern(string $to, string $pattern, array $vars) : bool;
}
