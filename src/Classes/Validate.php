<?php
namespace IrSmsGates\Classes;
use \Exception;
trait Validate
{
    private function validate(array $check, array $vars) : void
    {
        foreach ($check as $var){
            if (!isset($vars[$var])) throw new Exception("$var is require!");
        }
    }
}
