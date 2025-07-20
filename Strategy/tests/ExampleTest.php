<?php

namespace Tests;

use App\Example;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function testExampleClassCanBeInstantiated(): void
    {
        $example = new Example();
        $this->assertInstanceOf(Example::class, $example);
    }

    public function testGetMessageReturnsDefaultMessage(): void
    {
        $example = new Example();
        $this->assertEquals('Olá, mundo!', $example->getMessage());
    }

    public function testSetMessageChangesMessage(): void
    {
        $example = new Example();
        $example->setMessage('Nova mensagem');
        $this->assertEquals('Nova mensagem', $example->getMessage());
    }

    public function testConstructorAcceptsCustomMessage(): void
    {
        $example = new Example('Mensagem personalizada');
        $this->assertEquals('Mensagem personalizada', $example->getMessage());
    }
} 