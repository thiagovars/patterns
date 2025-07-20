<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

use Internal\Infrastructure\Builder\ReportGenerator;
use Internal\Infrastructure\Builder\TextBuilder;
use Internal\Infrastructure\Mock\ReportMock;

echo "================================\n";
echo "Pattern Builder - Demonstração\n";
echo "================================\n\n";

// Criando instância do mock
$mockContent = new ReportMock();
$textBuilder = new TextBuilder();
$content = $mockContent->getReportdata();

$reportGenerator = new ReportGenerator($textBuilder);
$reportGenerator->generateReport($content);