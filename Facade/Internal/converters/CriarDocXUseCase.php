<?php

namespace Application\UseCase;

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\SimpleType\Jc;

class CriarDocXUseCase
{
    /**
     * Gera um arquivo DOCX a partir do texto fornecido
     * 
     * @param string $texto O texto que será convertido para DOCX
     * @param string $nomeArquivo Nome do arquivo DOCX (opcional)
     * @return string Caminho do arquivo DOCX gerado
     */
    public function executar(string $texto, string $nomeArquivo = 'documento.docx'): string
    {
        // Criar nova instância do PhpWord
        $phpWord = new PhpWord();
        
        // Configurar propriedades do documento
        $properties = $phpWord->getDocInfo();
        $properties->setCreator('Sistema de Geração de DOCX');
        $properties->setLastModifiedBy('Sistema');
        $properties->setTitle('Documento Gerado');
        $properties->setSubject('DOCX gerado automaticamente');
        $properties->setDescription('Documento gerado a partir de texto');
        
        // Adicionar uma seção ao documento
        $section = $phpWord->addSection();
        
        // Adicionar o texto ao documento
        $this->adicionarTextoAoDocumento($section, $texto);
        
        // Definir o caminho do arquivo
        $caminhoArquivo = $this->obterCaminhoArquivo($nomeArquivo);
        
        // Salvar o documento
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($caminhoArquivo);
        
        return $caminhoArquivo;
    }
    
    /**
     * Adiciona o texto formatado ao documento
     * 
     * @param \PhpOffice\PhpWord\Element\Section $section
     * @param string $texto
     */
    private function adicionarTextoAoDocumento($section, string $texto): void
    {
        // Dividir o texto em linhas
        $linhas = explode("\n", $texto);
        
        foreach ($linhas as $linha) {
            $linha = trim($linha);
            
            if (!empty($linha)) {
                // Adicionar parágrafo com o texto
                $section->addText($linha, [
                    'name' => 'Arial',
                    'size' => 12,
                    'color' => '000000'
                ]);
                
                // Adicionar espaço entre parágrafos
                $section->addTextBreak(1);
            }
        }
    }
    
    /**
     * Obtém o caminho completo do arquivo DOCX
     * 
     * @param string $nomeArquivo
     * @return string
     */
    private function obterCaminhoArquivo(string $nomeArquivo): string
    {
        $diretorio = __DIR__ . '/../../storage/docx/';
        
        // Criar diretório se não existir
        if (!is_dir($diretorio)) {
            mkdir($diretorio, 0755, true);
        }
        
        // Garantir que o nome do arquivo termine com .docx
        if (!str_ends_with($nomeArquivo, '.docx')) {
            $nomeArquivo .= '.docx';
        }
        
        return $diretorio . $nomeArquivo;
    }
    
    /**
     * Gera um DOCX com formatação avançada (títulos, negrito, etc.)
     * 
     * @param string $texto
     * @param string $nomeArquivo
     * @return string
     */
    public function executarComFormatacao(string $texto, string $nomeArquivo = 'documento_formatado.docx'): string
    {
        $phpWord = new PhpWord();
        
        // Configurar propriedades
        $properties = $phpWord->getDocInfo();
        $properties->setCreator('Sistema de Geração de DOCX');
        $properties->setTitle('Documento Formatado');
        
        $section = $phpWord->addSection();
        
        // Adicionar título
        $section->addText('Documento Gerado', [
            'name' => 'Arial',
            'size' => 16,
            'bold' => true,
            'color' => '000000'
        ], [
            'alignment' => Jc::CENTER
        ]);
        
        $section->addTextBreak(2);
        
        // Adicionar texto formatado
        $this->adicionarTextoFormatado($section, $texto);
        
        $caminhoArquivo = $this->obterCaminhoArquivo($nomeArquivo);
        
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($caminhoArquivo);
        
        return $caminhoArquivo;
    }
    
    /**
     * Adiciona texto com formatação avançada
     * 
     * @param \PhpOffice\PhpWord\Element\Section $section
     * @param string $texto
     */
    private function adicionarTextoFormatado($section, string $texto): void
    {
        $linhas = explode("\n", $texto);
        
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
}
