<?php

namespace Internal\Infrastructure\Interfaces\Channels;

use Internal\Contracts\Notification;

class SMSNotification implements Notification
{
    public function send(string $message): void
    {
        echo "Enviando SMS: {$message}";
    }
}