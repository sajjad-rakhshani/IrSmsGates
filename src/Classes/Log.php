<?php

namespace IrSmsGates\Classes;

class Log implements GateWayInterface
{
    public function __construct(protected string|null $log_to = null)
    {
        if (is_null($log_to)) $this->log_to = __DIR__ . '../../../../../IrSms.log';
    }

    public function send(string $to, string $text) : bool
    {
        try {
            $this->logToFile("$to : $text");
        }catch (\Exception $exception){
            return false;
        }
        return true;
    }

    public function sendPattern(string $to, string $pattern, array $vars) : bool
    {
        try {
            $this->logToFile("$to : $pattern : " . json_encode($vars));
        }catch (\Exception $exception){
            return false;
        }
        return true;
    }

    private function logToFile(string $text) : void
    {
        $file = fopen($this->log_to, 'a');
        fwrite($file, "$text \n");
        fclose($file);
    }
}
