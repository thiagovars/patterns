<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Internal\Infrastructure\Builder\ReportGenerator;
use Internal\Infrastructure\Builder\TextBuilder;
use Internal\Infrastructure\Builder\HtmlBuilder;
use Internal\Infrastructure\Mock\ReportMock;

echo "================================\n";
echo "Pattern Builder - Demonstração\n";
echo "================================\n\n";

// Criando instância do mock
$mockContent = new ReportMock();
$content = $mockContent->getReportdata();

// Gerando relatório em formato texto
echo "=== RELATÓRIO EM TEXTO ===\n";
$textBuilder = new TextBuilder();
$reportGenerator = new ReportGenerator($textBuilder);
$result = $reportGenerator->generateReport($content);
echo $result;

echo "\n=== RELATÓRIO EM HTML ===\n";
$htmlBuilder = new HtmlBuilder();
$reportGenerator = new ReportGenerator($htmlBuilder);
$result = $reportGenerator->generateReport($content);
echo $result;