<?php

namespace Internal\Application\Domain\Observer;

use Internal\Application\Domain\Event\EventInterface;

interface Observer
{
    public function update(EventInterface $event): void;
}