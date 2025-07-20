# Sistema de Conversão de Documentos

## Visão Geral

Este sistema permite converter documentos de diferentes formatos para PDF e DOCX, utilizando uma arquitetura modular e extensível.

## Funcionalidades

### Conversores Disponíveis

- **PDF Converter**: Converte conteúdo HTML para PDF usando TCPDF
- **DOCX Converter**: Converte texto, HTML e Markdown para DOCX usando PhpWord

### Formatos Suportados

#### Entrada
- Texto simples (.txt)
- HTML (.html, .htm)
- Markdown (.md, .markdown)

#### Saída
- PDF (.pdf)
- DOCX (.docx)

## Arquitetura

### Padrões Utilizados

- **Strategy Pattern**: Para diferentes tipos de conversão
- **Factory Pattern**: Para criação de conversores
- **Facade Pattern**: Para simplificar a interface

### Estrutura de Diretórios

```
patterns/
├── application/
│   └── usecase/
├── internal/
│   ├── contracts/
│   ├── converters/
│   └── facade/
├── config/
└── vendor/
```

## Uso

### Exemplo Básico

```php
use Internal\Converters\PdfConverter;
use Internal\Converters\DocxConverter;

$pdfConverter = new PdfConverter();
$docxConverter = new DocxConverter();

$content = "<h1>Título</h1><p>Conteúdo</p>";
$pdf = $pdfConverter->converter($content, 'HTML');
$docx = $docxConverter->converter($content, 'HTML');
```

## Benefícios

- **Flexibilidade**: Suporte a múltiplos formatos
- **Extensibilidade**: Fácil adição de novos conversores
- **Manutenibilidade**: Código bem estruturado e documentado
- **Performance**: Conversão eficiente de documentos 