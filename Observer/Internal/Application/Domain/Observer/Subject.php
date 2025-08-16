<?php

namespace Internal\Application\Domain\Observer;

use Internal\Application\Domain\Event\EventInterface;

interface Subject
{
    public function attach(Observer $observer): void;
    public function detach(Observer $observer): void;
    public function notify(EventInterface $event): void;
}