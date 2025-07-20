<?php

namespace App;

class Example
{
    private string $message;

    public function __construct(string $message = 'Olá, mundo!')
    {
        $this->message = $message;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    public function display(): void
    {
        echo $this->message . PHP_EOL;
    }
} 