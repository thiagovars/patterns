<?php

namespace Internal\Infrastructure\Components;

use Internal\Application\Contracts\TextBoxInterface;

class DesktopTextBox implements TextBoxInterface
{
    public function render(): string
    {
        return 'Desktop TextBox rendered';
    }
}