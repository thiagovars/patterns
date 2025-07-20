<?php

namespace Internal\Infrastructure\Factory;

use Internal\Application\Contracts\ButtonInterface;
use Internal\Application\Contracts\GUIFactory;
use Internal\Application\Contracts\TextBoxInterface;
use Internal\Infrastructure\Components\DesktopButton;
use Internal\Infrastructure\Components\DesktopTextBox;

class DesktopGUIFactory implements GUIFactory
{
    public function createButton(): ButtonInterface
    {
        return new DesktopButton();
    }

    public function createTextBox(): TextBoxInterface
    {
        return new DesktopTextBox();
    }
}