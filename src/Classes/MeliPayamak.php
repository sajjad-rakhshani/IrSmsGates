<?php
namespace SajjadRakhshani\IrSmsGates\Classes;

use \SoapClient;
use \Exception;
class MeliPayamak implements GateWayInterface
{
    use Validate;
    private ?SoapClient $soap;
    public function __construct(protected string $username, protected string $password)
    {
        ini_set("soap.wsdl_cache_enabled","0");
        try {
            $this->soap = new SoapClient("http://api.payamak-panel.com/post/Send.asmx?wsdl", ["encoding"=>"UTF-8"]);
        }catch (Exception $exception){
            (new Log())->logToFile($exception->getMessage());
            $this->soap = null;
        }
    }

    private function sendRequest(array $vars) : string
    {
        $this->validate(['to', 'from', 'text'], $vars);
        return $this->soap->SendSimpleSMS([
            'username' => $this->username,
            'password' => $this->password,
            'to' => is_array($vars['to']) ? $vars['to'] : [$vars['to']],
            'from' => $vars['from'],
            'text' => $vars['text'],
            'isflash' => false
        ])->SendSimpleSMSResult->string;
    }

    private function sendPatternRequest(array $vars) : string
    {
        $this->validate(['to', 'text', 'pattern'], $vars);
        return $this->soap->SendByBaseNumber([
            'username' => $this->username,
            'password' => $this->password,
            'text' => array_values($vars['text']),
            'to' => $vars['to'],
            'bodyId' => $vars['pattern']
        ])->SendByBaseNumberResult;
    }

    public function send(array $vars) : bool
    {
        if (is_null($this->soap)) return false;
        $request = (!empty($vars['pattern'])) ? 'sendPatternRequest' : 'sendRequest';
        try {
            $send_result = $this->$request($vars);
            if (strlen($send_result) >= 15) return true;
            (new Log())->logToFile($send_result);
        }catch (Exception $exception){
            (new Log())->logToFile($exception->getMessage());
            return false;
        }
        return false;
    }
}
