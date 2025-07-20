<?php

// Incluir configurações do TCPDF
require_once 'config/tcpdf_config.php';

// Incluir o autoloader do Composer (se estiver usando)
require_once 'vendor/autoload.php';

// Incluir o caso de uso
require_once 'application/usecase/CriadorPdfUseCase.php';

use Application\UseCase\CriadorPdfUseCase;
use Internal\Converters\PdfConverter;

// Exemplo de uso do conversor PDF
$converter = new PdfConverter();

// Conteúdo HTML para converter
$htmlContent = '
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Documento de Teste</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h1 { color: #2c3e50; }
        .highlight { background-color: #f39c12; padding: 10px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #3498db; color: white; }
    </style>
</head>
<body>
    <h1>Relatório de Conversão PDF</h1>
    
    <p>Este é um exemplo de conversão de HTML para PDF usando o TCPDF.</p>
    
    <div class="highlight">
        <strong>Destaque:</strong> Esta seção demonstra como o HTML é renderizado no PDF.
    </div>
    
    <h2>Tabela de Exemplo</h2>
    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th>Descrição</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Produto A</td>
                <td>R$ 100,00</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Produto B</td>
                <td>R$ 150,00</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Produto C</td>
                <td>R$ 200,00</td>
            </tr>
        </tbody>
    </table>
    
    <h2>Lista de Benefícios</h2>
    <ul>
        <li>Conversão automática de HTML para PDF</li>
        <li>Suporte a CSS básico</li>
        <li>Tabelas e listas formatadas</li>
        <li>Quebra automática de página</li>
        <li>Codificação UTF-8</li>
    </ul>
    
    <p><em>Documento gerado em: ' . date('d/m/Y H:i:s') . '</em></p>
</body>
</html>
';

try {
    // Converter o conteúdo HTML para PDF
    $pdfContent = $converter->converter($htmlContent, 'HTML');
    
    // Salvar o PDF em um arquivo
    $filename = 'documento_convertido_' . date('Y-m-d_H-i-s') . '.pdf';
    file_put_contents($filename, $pdfContent);
    
    echo "PDF gerado com sucesso: $filename\n";
    echo "Tamanho do arquivo: " . number_format(strlen($pdfContent) / 1024, 2) . " KB\n";
    
} catch (Exception $e) {
    echo "Erro ao gerar PDF: " . $e->getMessage() . "\n";
} 