<?php

namespace Internal\Infrastructure\Factory;

use Internal\Application\Contracts\ButtonInterface;
use Internal\Application\Contracts\TextBoxInterface;
use Internal\Application\Contracts\GUIFactory;
use Internal\Infrastructure\Components\WebButton;
use Internal\Infrastructure\Components\WebTextBox;

class WebGUIFactory implements GUIFactory
{
    private $button;
    private $textBox;

    public function createButton(): ButtonInterface
    {
        $this->button = new WebButton();
        return $this->button;
    }

    public function createTextBox(): TextBoxInterface
    {
        $this->textBox = new WebTextBox();
        return $this->textBox;
    }
}