<?php

namespace Internal\Infrastructure\Interfaces\Channels;

use Internal\Contracts\Notification;

class EmailNotification implements Notification
{
    public function send(string $message): void
    {
        echo "Enviando email: {$message}";
    }
}