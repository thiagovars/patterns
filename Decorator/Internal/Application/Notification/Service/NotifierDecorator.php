<?php

namespace Internal\Application\Notification\Service;

use Internal\Domain\Notification\Notifier;

abstract class NotifierDecorator implements Notifier
{
    protected Notifier $wrInternalee;

    public function __construct(Notifier $notifier)
    {
        $this->wrInternalee = $notifier;
    }

    public function notify(string $message): void
    {
        $this->wrInternalee->notify($message);
    }
}