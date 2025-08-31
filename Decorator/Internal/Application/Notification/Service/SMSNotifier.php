<?php

namespace Internal\Application\Notification\Service;

use Internal\Domain\Notification\Notifier;

class SMSNotifier extends NotifierDecorator
{
    public function notify(string $message): void
    
    {
        parent::notify($message);
        echo "SMS sent: {$message}\n";
    }
}