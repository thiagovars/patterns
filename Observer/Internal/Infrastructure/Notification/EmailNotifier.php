<?php

namespace Internal\Infrastructure\Notification;

use Internal\Application\Domain\Event\EventInterface;
use Internal\Application\Domain\Observer\Observer;


class EmailNotifier implements Observer
{
    public function update(EventInterface $event): void
    {
        // @php-ignore-next-line
        echo "Email notifier sent to customer: {$event->order()->status}\n";
    }
}