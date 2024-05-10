<?php
namespace IrSmsGates\Classes;
interface GateWayInterface
{
    public function send(array $vars) : bool;
}
