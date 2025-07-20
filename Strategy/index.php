<?php

// Carrega o autoloader do Composer
require_once __DIR__ . '/vendor/autoload.php';

// TODO: refatorar os strategies para usar factory e passar a factory pra dnetro do calculateTaxUseCase
use Internal\Strategy\ICMS;
use Internal\Strategy\IPI;
use Internal\Strategy\ISS;
use Internal\UseCase\CalculateTaxUseCase;

$calculateICMS = new CalculateTaxUseCase(new ICMS());
$calculateISS = new CalculateTaxUseCase(new ISS());
$calculateIPI = new CalculateTaxUseCase(new IPI());

$data = [
    'amount' => 100
];

$icms = $calculateICMS->execute($data);
$iss = $calculateISS->execute($data);
$ipi = $calculateIPI->execute($data);

echo "ICMS: " . $icms . PHP_EOL;
echo "ISS: " . $iss . PHP_EOL;
echo "IPI: " . $ipi . PHP_EOL;
