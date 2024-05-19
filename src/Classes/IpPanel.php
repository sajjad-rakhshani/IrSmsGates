<?php

namespace IrSmsGates\Classes;

use \Exception;
use \IPPanel\Client;

class IpPanel implements GateWayInterface
{
    use Validate;
    private ?Client $client;
    public function __construct(protected string $api_key)
    {
        try {
            $this->client = new Client($this->api_key);
        }catch (Exception $exception){
            (new Log())->logToFile($exception->getMessage());
            $this->client = null;
        }
    }

    private function sendRequest(array $vars) : int
    {
        try {
            return $this->client->send($vars['from'], is_array($vars['to']) ? $vars['to'] : [$vars['to']], $vars['text'], 'none');
        }catch (Exception $exception){
            (new Log())->logToFile($exception->getMessage());
        }
        return 0;
    }

    private function sendPatternRequest(array $vars) : int
    {
        try {
            return $this->client->sendPattern($vars['pattern'], $vars['from'], $vars['to'], $vars['text']);
        }catch (Exception $exception){
            (new Log())->logToFile($exception->getMessage());
        }
        return 0;
    }

    public function send(array $vars) : bool
    {
        if (is_null($this->client)) return false;
        $request = (!empty($vars['pattern'])) ? 'sendPatternRequest' : 'sendRequest';
        if ($this->$request($vars)) return true;
        return false;
    }
}
