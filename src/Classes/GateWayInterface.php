<?php
namespace SajjadRakhshani\IrSmsGates\Classes;
interface GateWayInterface
{
    public function send(array $vars) : bool;
}
