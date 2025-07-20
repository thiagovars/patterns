<?php

namespace Internal\Infrastructure\Components;

use Internal\Application\Contracts\TextBoxInterface;

class WebTextBox implements TextBoxInterface
{
    public function render(): string
    {
        return 'Web TextBox rendered';
    }
}