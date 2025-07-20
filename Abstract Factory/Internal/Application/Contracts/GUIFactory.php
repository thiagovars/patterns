<?php

namespace Internal\Application\Contracts;

interface GUIFactory
{
    public function createButton(): ButtonInterface;
    public function createTextBox(): TextBoxInterface;
}