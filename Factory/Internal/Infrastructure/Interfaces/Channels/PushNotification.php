<?php

namespace Internal\Infrastructure\Interfaces\Channels;

use Internal\Contracts\Notification;

class PushNotification implements Notification
{
    public function send(string $message): void
    {
        echo "Enviando notificação push: {$message}";
    }
}