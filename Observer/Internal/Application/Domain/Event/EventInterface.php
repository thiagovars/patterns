<?php

namespace Internal\Application\Domain\Event;

interface EventInterface
{
    public function name(): string;
}