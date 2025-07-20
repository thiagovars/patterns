# Sistema de Conversão de Documentos

Este projeto implementa um sistema modular para converter documentos de diferentes formatos para PDF e DOCX, utilizando as bibliotecas TCPDF e PhpWord com uma arquitetura baseada em padrões de design.

## Instalação

1. Instale as dependências:
```bash
composer install
```

2. Certifique-se de que os diretórios `storage/pdfs/` e `storage/docx/` existem e têm permissões de escrita.

## Conversores Disponíveis

### PDF Converter
Converte conteúdo HTML para PDF usando TCPDF.

### DOCX Converter
Converte texto, HTML e Markdown para DOCX usando PhpWord.

## Uso

### Conversores Diretos

```php
<?php

require_once 'vendor/autoload.php';
require_once 'config/tcpdf_config.php';

use Internal\Converters\PdfConverter;
use Internal\Converters\DocxConverter;

// Converter para PDF
$pdfConverter = new PdfConverter();
$htmlContent = "<h1>Título</h1><p>Conteúdo HTML</p>";
$pdfContent = $pdfConverter->converter($htmlContent, 'HTML');
file_put_contents('documento.pdf', $pdfContent);

// Converter para DOCX
$docxConverter = new DocxConverter();
$textContent = "Conteúdo de texto simples";
$docxContent = $docxConverter->converter($textContent, 'TXT');
file_put_contents('documento.docx', $docxContent);
```

### Conversão de Arquivos

```php
<?php

require_once 'vendor/autoload.php';

use ConversorArquivoDocx;

$conversor = new ConversorArquivoDocx();

// Converter arquivo de texto
$arquivoGerado = $conversor->converterArquivo('documento.txt', 'TXT', 'saida.docx');

// Converter arquivo Markdown
$arquivoGerado = $conversor->converterArquivo('documento.md', 'MARKDOWN', 'saida.docx');

// Converter arquivo HTML
$arquivoGerado = $conversor->converterArquivo('documento.html', 'HTML', 'saida.docx');
```

### Linha de Comando

```bash
# Converter arquivo de texto
php converter_arquivo_docx.php documento.txt TXT saida.docx

# Converter arquivo Markdown (detecção automática)
php converter_arquivo_docx.php documento.md

# Converter arquivo HTML
php converter_arquivo_docx.php documento.html HTML
```

### Casos de Uso Legados

#### Gerando PDF (Método Antigo)

```php
<?php

require_once 'vendor/autoload.php';
require_once 'config/tcpdf_config.php';

use Application\UseCase\CriadorPdfUseCase;

$criadorPdf = new CriadorPdfUseCase();

$texto = "Seu texto aqui...";
$caminhoArquivo = $criadorPdf->executar($texto, 'meu_documento.pdf');

echo "PDF gerado em: " . $caminhoArquivo;
```

#### Gerando DOCX (Método Antigo)

```php
<?php

require_once 'vendor/autoload.php';

use Application\UseCase\CriarDocXUseCase;

$criarDocX = new CriarDocXUseCase();

$texto = "Seu texto aqui...";
$caminhoArquivo = $criarDocX->executar($texto, 'meu_documento.docx');

echo "DOCX gerado em: " . $caminhoArquivo;
```

## Formatos Suportados

### Entrada
- **TXT**: Texto simples
- **HTML**: Conteúdo HTML (tags básicas)
- **MARKDOWN**: Sintaxe Markdown básica (títulos, negrito, listas)

### Saída
- **PDF**: Documento PDF formatado
- **DOCX**: Documento Word formatado

## Estrutura do Projeto

```
patterns/
├── application/
│   └── usecase/
│       ├── CriadorPdfUseCase.php
│       └── CriarDocXUseCase.php
├── internal/
│   ├── contracts/
│   │   └── converter.php
│   ├── converters/
│   │   ├── PdfConverter.php
│   │   └── DocxConverter.php
│   └── facade/
│       └── FacadeConverter.php
├── config/
│   └── tcpdf_config.php
├── storage/
│   ├── pdfs/          # PDFs gerados são salvos aqui
│   └── docx/          # DOCXs gerados são salvos aqui
├── composer.json
├── exemplo_uso_pdf.php
├── exemplo_uso_docx.php
├── converter_arquivo_docx.php
├── exemplo.txt
├── exemplo.md
└── README.md
```

## Funcionalidades

### PDF Converter
- Conversão de HTML para PDF
- Formatação automática de parágrafos
- Configuração personalizável de margens e fonte
- Suporte a caracteres UTF-8
- Quebra automática de página

### DOCX Converter
- Conversão de múltiplos formatos (TXT, HTML, MARKDOWN)
- Formatação automática de parágrafos
- Detecção e formatação de títulos
- Suporte a listas e negrito (Markdown)
- Configuração de propriedades do documento
- Suporte a caracteres UTF-8

### Utilitários
- Conversão de arquivos existentes
- Detecção automática de formato
- Conversão em lote
- Interface de linha de comando

## Arquitetura

### Padrões Utilizados
- **Strategy Pattern**: Para diferentes tipos de conversão
- **Factory Pattern**: Para criação de conversores
- **Facade Pattern**: Para simplificar a interface

### Interface Converter
Todos os conversores implementam a interface `Converter`:

```php
interface Converter
{
    public function converter(string $content, string $format): string;
}
```

## Exemplos

### Exemplo de Conversão PDF
```bash
php exemplo_uso_pdf.php
```

### Exemplo de Conversão DOCX
```bash
php exemplo_uso_docx.php
```

### Exemplo de Conversão de Arquivo
```bash
php converter_arquivo_docx.php exemplo.txt TXT relatorio.docx
```

## Dependências

- PHP >= 7.4
- TCPDF >= 6.6
- PhpWord >= 1.0 