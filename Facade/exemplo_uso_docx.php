<?php

// Incluir o autoloader do Composer
require_once 'vendor/autoload.php';

// Incluir o caso de uso
require_once 'application/usecase/CriarDocXUseCase.php';

use Application\UseCase\CriarDocXUseCase;
use Internal\Converters\DocxConverter;

// Exemplo de uso básico
try {
    // Criar instância do caso de uso
    $criarDocX = new CriarDocXUseCase();
    
    // Texto de exemplo
    $texto = "Este é um exemplo de texto que será convertido para DOCX.
    
    O sistema irá formatar automaticamente o texto e criar um documento Word bem estruturado.
    
    Você pode incluir múltiplas linhas e parágrafos.
    
    O DOCX será salvo na pasta storage/docx/ com o nome especificado.";
    
    // Gerar o DOCX básico
    $caminhoArquivo = $criarDocX->executar($texto, 'meu_documento.docx');
    
    echo "DOCX básico gerado com sucesso!\n";
    echo "Caminho do arquivo: " . $caminhoArquivo . "\n\n";
    
    // Exemplo com formatação avançada
    $textoFormatado = "Título do Documento:
    
    Este é um parágrafo normal com texto que será formatado automaticamente.
    
    Subtítulo:
    
    Este é outro parágrafo que demonstra a formatação automática do sistema.
    
    Conclusão:
    
    O documento foi gerado com sucesso e está pronto para uso.";
    
    $caminhoFormatado = $criarDocX->executarComFormatacao($textoFormatado, 'documento_formatado.docx');
    
    echo "DOCX formatado gerado com sucesso!\n";
    echo "Caminho do arquivo: " . $caminhoFormatado . "\n";
    
} catch (Exception $e) {
    echo "Erro ao gerar DOCX: " . $e->getMessage() . "\n";
}

// Exemplo de uso do conversor DOCX
$converter = new DocxConverter();

// Exemplo 1: Conteúdo de texto simples
$textoSimples = "
Relatório de Vendas - Janeiro 2024

Resumo Executivo:
Este relatório apresenta as vendas do mês de janeiro de 2024.

Vendas por Região:
- Região Norte: R$ 45.000,00
- Região Sul: R$ 52.000,00
- Região Leste: R$ 38.000,00
- Região Oeste: R$ 41.000,00

Total de Vendas: R$ 176.000,00

Observações:
As vendas foram satisfatórias em todas as regiões, com destaque para a Região Sul.
";

// Exemplo 2: Conteúdo HTML
$htmlContent = "
<!DOCTYPE html>
<html>
<head>
    <title>Relatório HTML</title>
</head>
<body>
    <h1>Relatório de Conversão HTML</h1>
    <p>Este é um exemplo de conversão de HTML para DOCX.</p>
    <h2>Seção Importante</h2>
    <p>Esta seção demonstra como o HTML é processado.</p>
    <ul>
        <li>Item 1: Suporte a listas</li>
        <li>Item 2: Formatação de texto</li>
        <li>Item 3: Estrutura hierárquica</li>
    </ul>
</body>
</html>
";

// Exemplo 3: Conteúdo Markdown
$markdownContent = "
# Relatório Markdown

## Introdução
Este é um exemplo de conversão de Markdown para DOCX.

### Características
- **Suporte a títulos** de diferentes níveis
- **Texto em negrito** para destaque
- Listas organizadas
- Estrutura hierárquica clara

## Conclusão
O conversor processa corretamente a sintaxe Markdown básica.
";

try {
    echo "=== Testando Conversor DOCX ===\n\n";
    
    // Teste 1: Texto simples
    echo "1. Convertendo texto simples...\n";
    $docxContent1 = $converter->converter($textoSimples, 'TXT');
    $filename1 = 'documento_texto_' . date('Y-m-d_H-i-s') . '.docx';
    file_put_contents($filename1, $docxContent1);
    echo "   ✓ Arquivo salvo: $filename1\n";
    echo "   Tamanho: " . number_format(strlen($docxContent1) / 1024, 2) . " KB\n\n";
    
    // Teste 2: HTML
    echo "2. Convertendo HTML...\n";
    $docxContent2 = $converter->converter($htmlContent, 'HTML');
    $filename2 = 'documento_html_' . date('Y-m-d_H-i-s') . '.docx';
    file_put_contents($filename2, $docxContent2);
    echo "   ✓ Arquivo salvo: $filename2\n";
    echo "   Tamanho: " . number_format(strlen($docxContent2) / 1024, 2) . " KB\n\n";
    
    // Teste 3: Markdown
    echo "3. Convertendo Markdown...\n";
    $docxContent3 = $converter->converter($markdownContent, 'MARKDOWN');
    $filename3 = 'documento_markdown_' . date('Y-m-d_H-i-s') . '.docx';
    file_put_contents($filename3, $docxContent3);
    echo "   ✓ Arquivo salvo: $filename3\n";
    echo "   Tamanho: " . number_format(strlen($docxContent3) / 1024, 2) . " KB\n\n";
    
    echo "=== Conversão concluída com sucesso! ===\n";
    echo "Todos os arquivos DOCX foram gerados no diretório atual.\n";
    
} catch (Exception $e) {
    echo "Erro ao gerar DOCX: " . $e->getMessage() . "\n";
    echo "Stack trace: " . $e->getTraceAsString() . "\n";
} 