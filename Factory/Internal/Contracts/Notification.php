<?php

namespace Internal\Contracts;

interface Notification
{
    public function send(string $message): void;
}