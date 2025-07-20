<?php

namespace Internal\Infrastructure\Factory;

use Internal\Application\Contracts\GUIFactory;

class AbstractGUIFactory
{
    public function buildView(GUIFactory $factory): void
    {
        $button = $factory->createButton();
        $textBox = $factory->createTextBox();

        echo $button->render() . PHP_EOL;
        echo $textBox->render() . PHP_EOL;
    }
}