<?php

namespace Internal\Application\Notifier;

use Internal\Application\Domain\Event\EventInterface;
use Internal\Application\Domain\Observer\Subject;
use Internal\Application\Domain\Observer\Observer;

class StockNotifier implements Subject
{
    private array $observers = [];

    public function attach(Observer $observer): void
    {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer): void
    {
        $this->observers = array_filter($this->observers, fn($obs) => $obs !== $observer);
    }

    public function notify(EventInterface $event): void
    {
        foreach ($this->observers as $observer) {
            $observer->update($event);
        }
    }
}