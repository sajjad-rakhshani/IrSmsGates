<?php

namespace IrSmsGates\Classes;

class Log implements GateWayInterface
{
    public function __construct(protected string|null $log_to = null)
    {
        if (is_null($log_to)) $this->log_to = __DIR__ . '../../../../../IrSms.log';
    }

    public function send(array $vars) : bool
    {
        try {
            $this->logToFile(json_encode($vars));
        }catch (\Exception $exception){
            return false;
        }
        return true;
    }

    public function logToFile(string $text) : void
    {
        $file = fopen($this->log_to, 'a');
        fwrite($file, "$text \n");
        fclose($file);
    }
}
