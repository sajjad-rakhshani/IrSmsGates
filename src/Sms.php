<?php
namespace IrSmsGates;
use IrSmsGates\Classes\GateWayInterface;

abstract class Sms
{
    private array $vars;
    abstract public function GateWayClass() : GateWayInterface;

    public function to(string|array $to) : object
    {
        $this->vars['to'] = $to;
        return $this;
    }

    public function text(string|array $text) : object
    {
        $this->vars['text'] = $text;
        return $this;
    }

    public function from(string $from) : object
    {
        $this->vars['from'] = $from;
        return $this;
    }

    public function pattern(string $pattern) : object
    {
        $this->vars['pattern'] = $pattern;
        return $this;
    }

    public function send() : bool
    {
        return $this->GateWayClass()->send($this->vars);
    }
}
