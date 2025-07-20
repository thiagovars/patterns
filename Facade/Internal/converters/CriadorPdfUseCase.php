<?php

namespace Application\UseCase;

use TCPDF;

class CriadorPdfUseCase
{
    /**
     * Gera um PDF a partir do texto fornecido
     * 
     * @param string $texto O texto que será convertido para PDF
     * @param string $nomeArquivo Nome do arquivo PDF (opcional)
     * @return string Caminho do arquivo PDF gerado
     */
    public function executar(string $texto, string $nomeArquivo = 'documento.pdf'): string
    {
        // Criar nova instância do TCPDF
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        
        // Configurar informações do documento
        $pdf->SetCreator('Sistema de Geração de PDF');
        $pdf->SetAuthor('Sistema');
        $pdf->SetTitle('Documento Gerado');
        $pdf->SetSubject('PDF gerado automaticamente');
        
        // Configurar margens
        $pdf->SetMargins(15, 15, 15);
        $pdf->SetHeaderMargin(5);
        $pdf->SetFooterMargin(10);
        
        // Configurar quebra de página automática
        $pdf->SetAutoPageBreak(TRUE, 25);
        
        // Configurar fonte
        $pdf->SetFont('helvetica', '', 12);
        
        // Adicionar uma página
        $pdf->AddPage();
        
        // Adicionar o texto ao PDF
        $pdf->writeHTML($this->formatarTextoParaHtml($texto), true, false, true, false, '');
        
        // Definir o caminho do arquivo
        $caminhoArquivo = $this->obterCaminhoArquivo($nomeArquivo);
        
        // Salvar o PDF
        $pdf->Output($caminhoArquivo, 'F');
        
        return $caminhoArquivo;
    }
    
    /**
     * Formata o texto para HTML para melhor apresentação no PDF
     * 
     * @param string $texto
     * @return string
     */
    private function formatarTextoParaHtml(string $texto): string
    {
        // Converter quebras de linha em parágrafos HTML
        $linhas = explode("\n", $texto);
        $html = '';
        
        foreach ($linhas as $linha) {
            $linha = trim($linha);
            if (!empty($linha)) {
                $html .= '<p>' . htmlspecialchars($linha) . '</p>';
            }
        }
        
        return $html;
    }
    
    /**
     * Obtém o caminho completo do arquivo PDF
     * 
     * @param string $nomeArquivo
     * @return string
     */
    private function obterCaminhoArquivo(string $nomeArquivo): string
    {
        $diretorio = __DIR__ . '/../../storage/pdfs/';
        
        // Criar diretório se não existir
        if (!is_dir($diretorio)) {
            mkdir($diretorio, 0755, true);
        }
        
        // Garantir que o nome do arquivo termine com .pdf
        if (!str_ends_with($nomeArquivo, '.pdf')) {
            $nomeArquivo .= '.pdf';
        }
        
        return $diretorio . $nomeArquivo;
    }
} 