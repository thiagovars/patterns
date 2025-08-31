<?php

namespace Internal\Application\Notification\Service;

use Internal\Domain\Notification\Notifier;

class EmailNotifier extends NotifierDecorator
{
    public function notify(string $message): void
    {
        parent::notify($message);
        echo "Email sent: {$message}\n";
    }
}