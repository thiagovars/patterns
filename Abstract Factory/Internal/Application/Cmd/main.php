<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

use Internal\Infrastructure\Factory\AbstractGUIFactory;
use Internal\Infrastructure\Factory\GUIFactoryDIP;
use Internal\Infrastructure\Factory\DesktopGUIFactory;
use Internal\Infrastructure\Factory\WebGUIFactory;

// isso é uma dependência no ceodigo para AbstractGUIFactory
$factory = new AbstractGUIFactory();

$factory->buildView(new DesktopGUIFactory());
$factory->buildView(new WebGUIFactory());

//----- versão sem dependência ou melhor dizendo, com injeção de dependência
$factoryDIP = new GUIFactoryDIP(new DesktopGUIFactory());
$factoryDIP->buildView();

$factoryDIP = new GUIFactoryDIP(new WebGUIFactory());
$factoryDIP->buildView();