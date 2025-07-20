<?php

namespace Internal\Converters;

use Internal\Contracts\Converter;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;


class DocxConverter implements Converter
{

    const PATH_OUTPUT = __DIR__ . '/../../storage/output/docx/';
    
    public static function convert(string $content, string $format): array
    {
        // Criar nova instância do PhpWord
        $phpWord = new PhpWord();
        
        // Configurar propriedades do documento
        $properties = $phpWord->getDocInfo();
        $properties->setCreator('Sistema de Conversão DOCX');
        $properties->setLastModifiedBy('Sistema');
        $properties->setTitle('Documento Convertido');
        $properties->setSubject('Conversão de ' . $format . ' para DOCX');
        $properties->setDescription('Documento convertido automaticamente');
        
        // Adicionar uma seção ao documento
        $section = $phpWord->addSection();
        
        // Processar o conteúdo baseado no formato
        self::processarConteudo($section, $content, $format);
        
        // Salvar o documento em memória
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        
        // Capturar o conteúdo em uma variável
        ob_start();
        $objWriter->save(self::PATH_OUTPUT . uniqid() . '.docx');
        $docxContent = ob_get_clean();
        
        return [
            'path' => self::PATH_OUTPUT . uniqid() . '.docx',
            'content' => $docxContent,
        ];
    }
    
    /**
     * Processa o conteúdo baseado no formato de entrada
     * 
     * @param \PhpOffice\PhpWord\Element\Section $section
     * @param string $content
     * @param string $format
     */
    private static function processarConteudo($section, string $content, string $format): void
    {
        switch (strtolower($format)) {
            case 'html':
                self::processarHtml($section, $content);
                break;
            case 'txt':
            case 'text':
                self::processarTexto($section, $content);
                break;
            case 'markdown':
                self::processarMarkdown($section, $content);
                break;
            default:
                self::processarTexto($section, $content);
                break;
        }
    }
    
    /**
     * Processa conteúdo HTML
     * 
     * @param \PhpOffice\PhpWord\Element\Section $section
     * @param string $content
     */
    private static function processarHtml($section, string $content): void
    {
        // Remover tags HTML básicas e extrair texto
        $texto = strip_tags($content);
        
        // Dividir em linhas
        $linhas = explode("\n", $texto);
        
        foreach ($linhas as $linha) {
            $linha = trim($linha);
            
            if (!empty($linha)) {
                // Detectar títulos HTML
                if (preg_match('/^<h[1-6]>(.*?)<\/h[1-6]>$/', $linha, $matches)) {
                    $section->addText($matches[1], [
                        'name' => 'Arial',
                        'size' => 16,
                        'bold' => true,
                        'color' => '2E2E2E'
                    ]);
                } else {
                    $section->addText($linha, [
                        'name' => 'Arial',
                        'size' => 11,
                        'color' => '000000'
                    ]);
                }
                
                $section->addTextBreak(1);
            }
        }
    }
    
    /**
     * Processa conteúdo de texto simples
     * 
     * @param \PhpOffice\PhpWord\Element\Section $section
     * @param string $content
     */
    private static function processarTexto($section, string $content): void
    {
        // Dividir o texto em linhas
        $linhas = explode("\n", $content);
        
        foreach ($linhas as $linha) {
            $linha = trim($linha);
            
            if (!empty($linha)) {
                // Detectar se é um título (linha curta ou que termina com :)
                if (strlen($linha) < 50 || str_ends_with($linha, ':')) {
                    $section->addText($linha, [
                        'name' => 'Arial',
                        'size' => 14,
                        'bold' => true,
                        'color' => '2E2E2E'
                    ]);
                } else {
                    $section->addText($linha, [
                        'name' => 'Arial',
                        'size' => 11,
                        'color' => '000000'
                    ]);
                }
                
                $section->addTextBreak(1);
            }
        }
    }
    
    /**
     * Processa conteúdo Markdown básico
     * 
     * @param \PhpOffice\PhpWord\Element\Section $section
     * @param string $content
     */
    private static function processarMarkdown($section, string $content): void
    {
        // Dividir o texto em linhas
        $linhas = explode("\n", $content);
        
        foreach ($linhas as $linha) {
            $linha = trim($linha);
            
            if (!empty($linha)) {
                // Detectar títulos Markdown (# ## ###)
                if (preg_match('/^(#{1,6})\s+(.+)$/', $linha, $matches)) {
                    $nivel = strlen($matches[1]);
                    $texto = $matches[2];
                    
                    $tamanhoFonte = 16 - ($nivel * 2); // H1=14, H2=12, H3=10, etc.
                    
                    $section->addText($texto, [
                        'name' => 'Arial',
                        'size' => $tamanhoFonte,
                        'bold' => true,
                        'color' => '2E2E2E'
                    ]);
                }
                // Detectar negrito (**texto** ou __texto__)
                elseif (preg_match('/\*\*(.+?)\*\*|__(.+?)__/', $linha)) {
                    $texto = preg_replace('/\*\*(.+?)\*\*|__(.+?)__/', '$1$2', $linha);
                    $section->addText($texto, [
                        'name' => 'Arial',
                        'size' => 11,
                        'bold' => true,
                        'color' => '000000'
                    ]);
                }
                // Detectar listas (- item ou * item)
                elseif (preg_match('/^[\-\*]\s+(.+)$/', $linha, $matches)) {
                    $section->addText('• ' . $matches[1], [
                        'name' => 'Arial',
                        'size' => 11,
                        'color' => '000000'
                    ]);
                }
                else {
                    $section->addText($linha, [
                        'name' => 'Arial',
                        'size' => 11,
                        'color' => '000000'
                    ]);
                }
                
                $section->addTextBreak(1);
            }
        }
    }
}