<?php

namespace Internal\Infrastructure\Components;

use Internal\Application\Contracts\ButtonInterface;

class WebButton implements ButtonInterface
{
    public function render(): string
    {
        return 'Web Button rendered';
    }
}