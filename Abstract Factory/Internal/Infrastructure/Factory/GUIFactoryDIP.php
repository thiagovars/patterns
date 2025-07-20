<?php

namespace Internal\Infrastructure\Factory;

use Internal\Application\Contracts\GUIFactory;

class GUIFactoryDIP
{
    public function __construct(
        private GUIFactory $factory
    ){}

    public function buildView(): void
    {
        $button = $this->factory->createButton();
        $textBox = $this->factory->createTextBox();

        echo $button->render() . PHP_EOL;
        echo $textBox->render() . PHP_EOL;
    }
}