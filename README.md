# IrSmsGates
send sms with iranian sms gateways
## installation
use the composer to install IrSmsGates.
```bash
composer require sajjad-rakhshani/IrSmsGates
```
## usage
### log to file
```php
//log to IrSms.log in your document root
$log = new IrSmsGates\GateWays\Log();
$log->send(); //bool

//log to your specific log file
$log = new IrSmsGates\Gateways\Log('your_file');
$log->send(); //bool
```
### MeliPayamak
```php
$melipayamak = new IrSmsGates\Gateways\MeliPayamak($username, $passowrd);

//simple send
$melipayamak
    ->from($from) // send from
    ->to($to) // a number or array of numbers
    ->text($text)
    ->send(); //bool

//send with pattern
$melipayamak
    ->to($to) // only one number
    ->text($patter_vars) // an array of your pattern variables. ['var1', 'var2', ...]
    ->pattern($pattern) //your pattern code in melipayamak
    ->send(); //bool
```
all error log to IrSms.log in your document root
