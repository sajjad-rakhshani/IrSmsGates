<?php

namespace SajjadRakhshani\IrSmsGates\Classes;

use Illuminate\Support\Facades\Http;

class SmsIr implements GateWayInterface
{
    public function __construct(protected string $api_key)
    {
    }

    public function sendRequest()
    {

    }

    public function sendPatternRequest($vars) : bool
    {
        try {
            $request = Http::acceptJson()
                ->withHeader('X-API-KEY', $this->api_key)
                ->post('https://api.sms.ir/v1/send/verify', [
                    'Mobile' => $vars['to'],
                    'TemplateId' => $vars['pattern'],
                    'Parameters' => $vars['text']
                ]);
            if ($request->status() == 200) return true;
        }catch (\Exception){}
        return false;
    }

    public function send(array $vars) : bool
    {
        $request = !empty($vars['pattern']) ? 'sendPatternRequest' : 'sendRequest';
        return $this->$request($vars);
    }
}
