<?php

namespace Internal\Domain\Notification\Entity;

use Internal\Domain\Notification\Notifier;

class BaseNotifier implements Notifier
{
    public function notify(string $message): void
    {
        echo "Message sent: {$message}\n";
    }
}