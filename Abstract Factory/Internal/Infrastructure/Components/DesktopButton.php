<?php

namespace Internal\Infrastructure\Components;

use Internal\Application\Contracts\ButtonInterface;

class DesktopButton implements ButtonInterface
{
    public function render(): string
    {
        return 'Desktop Button rendered';
    }
}