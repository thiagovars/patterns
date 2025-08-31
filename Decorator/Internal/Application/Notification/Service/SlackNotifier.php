<?php

namespace Internal\Application\Notification\Service;

use Internal\Domain\Notification\Notifier;

class SlackNotifier extends NotifierDecorator
{
    public function notify(string $message): void
    {
        parent::notify($message);
        echo "Slack sent: {$message}\n";
    }
}